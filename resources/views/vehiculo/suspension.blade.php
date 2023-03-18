@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
 {{--
<form action="vehiculos" method="GET">
   
  <div class="row">
    
   
    <div class="col-md-3">
    <label for="placa" class="form-label">PLACA</label>
    </div>
    <div class="col-md-3"> 
    <input type="text"   class="form-control"  name="placa" placeholder="PLACA" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
  </div>
  </div>
 
  <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=1" type="button" class="btn btn-primary" tabindex="4">REGRESAR </a>
  <button type="submit" class="btn btn-primary" tabindex="4">buscar</button>
</form>
--}}
 
@if(isset($vehiculo)) 
 SUSPENSION DEL VEHICULO : {{$vehiculo->placa}} <br/>
  @endif
  @if(isset($responsable))  
  PERITO SUSPENCION : {{$responsable->name}} <br/>


<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

@if(isset($vehiculo) && Auth::user()->id==$responsable->id && $suspensioncontrol->activo)
  
<a href="{{ URL::to('/') }}/ssuspensions/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR PIEZA</a>


<form action="{{ route('suspensioncontrol.update','suspension')}}" method="POST" class="formdesactivar">
 @csrf
 <div class="form-group">
   <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
   <textarea class="form-control" name="observacion" id="observacion" rows="3" required value="{{$suspensioncontrol->observacion}}" placeholder="La observación general se diligencia al final de registrar todas las piezas y se almacena al finalizar la inspección del suspension ">{{$suspensioncontrol->observacion}}</textarea>
 </div>
 <div class="form-group">
   <label for="" class="form-label">NIVEL DE APROBACIÓN</label>
   <input id="nivelaprobado" name="nivelaprobado" type="number"  placeholder="0% a 100%" step="0" min="0" max="100"   class="form-control" tabindex="3" required value="{{$suspensioncontrol->nivelaprobado}}">
 </div>
 <input type="hidden" name="peritajeid" value="{{$vehiculo->peritaje->id}}">

 @method('PUT')
<button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">FINALIZAR REGISTRO DE EXTERIORES</button>

 </form>
@endif

@if(isset($suspensioncontrol->activo))
@if($suspensioncontrol->activo==0)
<div class="form-group">
<label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
<textarea class="form-control" name="observacion" id="observacion" rows="3" required value="{{$suspensioncontrol->observacion}}" placeholder="La observación general se diligencia al final de registrar todas las piezas y se almacena al finalizar la inspección del suspension " readonly>{{$suspensioncontrol->observacion}}</textarea>
</div>
<div class="form-group">
<label for="" class="form-label">NIVEL DE APROBACIÓN</label>
<input id="nivelaprobado" name="nivelaprobado" type="number"  placeholder="0% a 100%" step="0" min="0" max="100"   class="form-control" tabindex="3" value="{{$suspensioncontrol->nivelaprobado}}" required readonly>
</div>
@endif
@endif
  <table id="suspensions" class="table table-dark table-striped mt-4">
  <thead>
    <tr>
      {{--<th scope="col">ID</th>--}}
      <th scope="col">PIEZA DE SUSPENSION</th>
      <th scope="col">ESTADO</th>
      <th scope="col">PARA CAMBIO</th>
      <th scope="col">OBSERVACIONES</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>   
    @if(isset($suspensions))  
    @foreach ($suspensions as $suspension)
    <tr>
        {{--<td>{{$suspension->id}}</td>--}}
        <td>{{$suspension->suspensionpart->name}}</td>
        <td>{{$suspension->estado}}</td>
        <td>{{$suspension->cambio}}</td>
        <td>{{$suspension->observaciones}}</td>
        <td>
          @if(Auth::user()->id==$responsable->id  && $suspensioncontrol->activo) 
        <form action="{{ route('ssuspensions.destroy',$suspension->id) }}" method="POST">
          <a href="/ssuspensions/{{$suspension->id}}/edit" class="btn btn-info">Editar</a>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
         </form>  
          
         @endif
                   
        </td>        
    </tr>
    @endforeach
    @endif
    @else

@if(isset($vehiculo))
        <p>
         <a href="{{ URL::to('/') }}/ssuspensions/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR  Y SER RESPONSABLE DEL PERITAJE DE LA SUSPENSION </a>
       
     @endif


    @endif
  </tbody>
</table>
<a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=1" type="button" class="btn btn-primary" tabindex="4">REGRESAR </a>
<!-- xxxxxxxxxxxxxxxxxxxxx -->


@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function () {
  $('#suspensions').DataTable();
});
</script>
<script src="/js/marca_lineas.js">
</script>

<script>
  (function(){
'use strict'
var forms=document.querySelectorAll('.formdesactivar')
Array.prototype.slice.call(forms)
.forEach(function(form){
form.addEventListener('submit',function(event){
event.preventDefault()
event.stopPropagation()
Swal.fire({
title: '¿finalizar el registro de la suspensión ? ',
  icon: 'info',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Yes, Finalizar!'
}).then((result) => {
if (result.isConfirmed) {
this.submit();
  Swal.fire(
    'Finalizado!',
    'A finalizado el registro  de la suspensión .',
    'success'
  )
}
})
},false)
})
})()
</script>
@endsection
@endsection

 