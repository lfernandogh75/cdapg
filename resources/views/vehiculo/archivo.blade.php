@extends('layouts.plantillaperitaje')
@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('contenido')
@if(isset($vehiculo)) 
 ARCHIVOS DEL VEHICULO : {{$vehiculo->placa}} <br/>
  @endif
  @if(isset($responsable))  
   


<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

@if(isset($vehiculo)   && $archivocontrol->activo)
  
         <a href="{{ URL::to('/') }}/sarchivos/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR ARCHIVO</a>
         <form action="{{ route('archivocontrol.update',"archivo")}}" method="POST" class="formdesactivar">
          @csrf
          <input type="hidden" name="peritajeid" value="{{$vehiculo->peritaje->id}}">
          @method('PUT')
         <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">FINALIZAR AGREGAR ARCHIVOS</button>
        
          </form>
    
         @endif
  <table id="archivos" class="table table-dark table-striped mt-4">
  <thead>
    <tr>
     {{-- <th scope="col">ID</th>--}}
      <th scope="col">NOMBRE</th>
      <th scope="col">PERITO</th>
      <th scope="col">OBSERVACION</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>   
    @if(isset($archivos))  
    @foreach ($archivos as $archivo)
    <tr>
       {{-- <td>{{$archivo->id}}</td>--}}
        <td>{{$archivo->nombre}}</td>
        
       
        <td>{{$archivo->perito}}</td>
        <td>{{$archivo->observacion}}</td>
         
         
        <td>
          @if($archivocontrol->activo) 
        <form action="{{ route('sarchivos.destroy',$archivo->id) }}" method="POST" class="formEliminar">
          <a   href="/descarga/{{$archivo->ruta}}" class="btn btn-info">DESCARGAR</a>         
              @csrf
              @method('DELETE')
              @if(Auth::user()->role->nombre_rol=="superadmin")
          <button type="submit" class="btn btn-danger">Delete</button>
       @endif
        </form>  
        @else
        <a   href="/descarga/{{$archivo->ruta}}" class="btn btn-info">DESCARGAR</a> 
         @endif
                   
        </td>        
    </tr>
    @endforeach
    
    @endif
    @else

@if(isset($vehiculo))
        <p>
         <a href="{{ URL::to('/') }}/sarchivos/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR ARCHIVO</a>
       
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
  $('#archivos').DataTable();
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
title: '¿finalizar el registro de archivo ? ',
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
    'A finalizado el registro de archivos .',
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

 