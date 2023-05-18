@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
 
@if(isset($vehiculo)) 
 PINTURA DEL VEHICULO : {{$vehiculo->placa}} <br/>
  @endif
  @if(isset($responsable))  
   


<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
@if(isset($vehiculo) && $pinturacontrol->activo)
  
         <a href="{{ URL::to('/') }}/spinturas/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR PIEZA</a>
       
       
         <form action="{{ route('pinturacontrol.update','pintura')}}" method="POST" class="formdesactivar">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
            <textarea class="form-control" name="observacion" id="observacion" rows="3" required value="{{$pinturacontrol->observacion}}" placeholder="La observación general se diligencia al final de registrar todas las piezas y se almacena al finalizar la inspección del pintura ">{{$pinturacontrol->observacion}}</textarea>
          </div>
          <div class="form-group">
            <label for="" class="form-label">NIVEL DE APROBACIÓN</label>
            <input id="nivelaprobado" name="nivelaprobado" type="number"  placeholder="0% a 100%" step="0" min="0" max="100"   class="form-control" tabindex="3" required value="{{$pinturacontrol->nivelaprobado}}">
          </div>
          <input type="hidden" name="peritajeid" value="{{$vehiculo->peritaje->id}}">

          @method('PUT')
         <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">FINALIZAR REGISTRO DE PINTURA</button>
        
          </form>
     @endif

     @if(isset($pinturacontrol->activo))
     @if($pinturacontrol->activo==0)
     <div class="form-group">
       <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
       <textarea class="form-control" name="observacion" id="observacion" rows="3" required value="{{$pinturacontrol->observacion}}" placeholder="La observación general se diligencia al final de registrar todas las piezas y se almacena al finalizar la inspección del pintura " readonly>{{$pinturacontrol->observacion}}</textarea>
     </div>
     <div class="form-group">
       <label for="" class="form-label">NIVEL DE APROBACIÓN</label>
       <input id="nivelaprobado" name="nivelaprobado" type="number"  placeholder="0% a 100%" step="0" min="0" max="100"   class="form-control" tabindex="3" value="{{$pinturacontrol->nivelaprobado}}" required readonly>
     </div>
     @endif
  @endif
 
         

         
  <table id="pinturas" class="table table-dark table-striped mt-4">
  <thead>
    <tr>
      {{--<th scope="col">ID</th>--}}
      <th scope="col">PIEZA</th>
      <th scope="col">VISTA</th>
      <th scope="col">ESTADO</th>
      <th scope="col">OBSERVACIONES</th>
      <th scope="col">PERITO</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>   
    @if(isset($pinturas))  
    @foreach ($pinturas as $pintura)
    <tr>
        {{--<td>{{$pintura->id}}</td>--}}
        <td>{{$pintura->latoneriapart->name}}</td>
        <td>{{$pintura->vista}}</td>
        <td>{{$pintura->estado}}</td>
        <td>{{$pintura->observaciones}}</td>
        <td>{{$pintura->perito}}</td>
        <td>
          @if($pinturacontrol->activo) 
        <form action="{{ route('spinturas.destroy',$pintura->id) }}" method="POST">
          <a href="/spinturas/{{$pintura->id}}/edit" class="btn btn-info">Editar</a>         
              @csrf
              @method('DELETE')
              @if(Auth::user()->role->nombre_rol=="superadmin")
              <button type="submit" class="btn btn-danger">Delete</button>
        @endif
            </form>  
          
         @endif
                   
        </td>        
    </tr>
    @endforeach
    @endif
    @else

@if(isset($vehiculo))
        <p>
         <a href="{{ URL::to('/') }}/spinturas/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR PIEZA  </a>
       
     @endif


    @endif
  </tbody>
</table>
<a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=1" type="button" class="btn btn-primary" tabindex="4">REGRESAR </a>
<a href="https://docs.google.com/presentation/d/1vuXAzBcE6NMquCbWI5ZtuT_wpF05aLRcMIxiX9B8ujQ/edit?usp=sharing"  type="button" class="btn btn-primary"  target="_blank">EDITOR FOTO</a>
<!-- xxxxxxxxxxxxxxxxxxxxx -->


@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function () {
  $('#pinturas').DataTable();
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
title: '¿finalizar el registro de pinturas ? ',
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
    'A finalizado el registro de pinturas .',
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

 