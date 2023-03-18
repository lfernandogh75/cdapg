@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
 
@if(isset($vehiculo)) 
 EQUIPOS : {{$vehiculo->placa}} <br/>
  @endif
  @if(isset($responsable))  
  PERITO REGISTRO DE EQUIPOS : {{$responsable->name}} <br/>


<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
@if(isset($vehiculo) && Auth::user()->id==$responsable->id && $equipocontrol->activo)
  
         <a href="{{ URL::to('/') }}/sequipos/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR EQUIPO</a>
       
       
         <form action="{{ route('equipocontrol.update','equipo')}}" method="POST" class="formdesactivar">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
            <textarea class="form-control" name="observacion" id="observacion" rows="3" required value="{{$equipocontrol->observacion}}" placeholder="La observación general se diligencia al final de registrar todas las piezas y se almacena al finalizar la inspección del equipo ">{{$equipocontrol->observacion}}</textarea>
          </div>
          
          <input type="hidden" name="peritajeid" value="{{$vehiculo->peritaje->id}}">

          @method('PUT')
         <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">FINALIZAR REGISTRO DE EQUIPOS</button>
        
          </form>
     @endif

     @if(isset($equipocontrol->activo))
     @if($equipocontrol->activo==0)
     <div class="form-group">
       <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
       <textarea class="form-control" name="observacion" id="observacion" rows="3" required value="{{$equipocontrol->observacion}}" placeholder="La observación general se diligencia al final de registrar todas las piezas y se almacena al finalizar la inspección del equipo " readonly>{{$equipocontrol->observacion}}</textarea>
     </div>
      
     @endif
  @endif
 
         

         
  <table id="equipos" class="table table-dark table-striped mt-4">
  <thead>
    <tr>
      {{--<th scope="col">ID</th>--}}
      <th scope="col">EQUIPO</th>
      <th scope="col">MARCA</th>
      <th scope="col">SERIAL</th>
      <th scope="col">BANCO</th>
      <th scope="col">PEF</th>
      <th scope="col">LTOE</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>   
    @if(isset($equipos))  
    @foreach ($equipos as $equipo)
    <tr>
        {{--<td>{{$equipo->id}}</td>--}}
        <td>{{$equipo->equipopart->name}}</td>
        <td>{{$equipo->equipopart->marca}}</td>
        <td>{{$equipo->equipopart->serial}}</td>
        <td>{{$equipo->equipopart->banco}}</td>
        <td>{{$equipo->equipopart->pef}}</td>
        <td>{{$equipo->equipopart->ltoe}}</td>
        
        <td>
          @if(Auth::user()->id==$responsable->id && $equipocontrol->activo) 
        <form action="{{ route('sequipos.destroy',$equipo->id) }}" method="POST">
    {{--     <a href="/sequipos/{{$equipo->id}}/edit" class="btn btn-info">Editar</a>--}}          
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
         <a href="{{ URL::to('/') }}/sequipos/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  > SER RESPONSABLE DE AGREGAR EQUIPOS </a>
       
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
  $('#equipos').DataTable();
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
title: '¿finalizar el registro de equipos ? ',
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
    'A finalizado el registro de equipos .',
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

 