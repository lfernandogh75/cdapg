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
 FOTOS DEL VEHICULO : {{$vehiculo->placa}} <br/>
  @endif
  @if(isset($responsable))  
   


<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->

@if(isset($vehiculo)   && $fotocontrol->activo)
  
         <a href="{{ URL::to('/') }}/sfotos/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR FOTO</a>
         <form action="{{ route('fotocontrol.update',"foto")}}" method="POST" class="formdesactivar">
          @csrf
          <input type="hidden" name="peritajeid" value="{{$vehiculo->peritaje->id}}">
          @method('PUT')
         <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">FINALIZAR REGISTRO FOTOGRAFICO</button>
        
          </form>
    
         @endif
  <table id="fotos" class="table table-dark table-striped mt-4">
  <thead>
    <tr>
     {{-- <th scope="col">ID</th>--}}
      <th scope="col">FOTO</th>
      <th scope="col">IMAGEN</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">PERITO</th>
      <th scope="col">OBSERVACION</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>   
    @if(isset($fotos))  
    @foreach ($fotos as $foto)
    <tr>
       {{-- <td>{{$foto->id}}</td>--}}
        <td>{{$foto->fotopart->name}}</td>
        <td>   <img src="/imagen/{{$foto->imagen}}" width="30%"></td>
        <td>{{$foto->categoria}}</td>
        <td>{{$foto->perito}}</td>
        <td>{{$foto->observacion}}</td>
         
         
        <td>
          @if($fotocontrol->activo) 
        <form action="{{ route('sfotos.destroy',$foto->id) }}" method="POST" class="formEliminar">
          <a href="/sfotos/{{$foto->id}}/edit" class="btn btn-info">Editar</a>         
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
         <a href="{{ URL::to('/') }}/sfotos/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR REGISTRO FOTOGRAFICO </a>
       
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
  $('#fotos').DataTable();
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
title: '¿finalizar el registro fotográfico ? ',
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
    'A finalizado el registro fotográfico .',
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

 