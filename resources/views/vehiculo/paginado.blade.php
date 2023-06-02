@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
 
@if(isset($vehiculo)) 
 PAGINADO : {{$vehiculo->placa}} <br/>
  @endif
  
 
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
@if(!isset($paginadocontrol))
  
        
    
         <form action="/spaginados" method="POST">
          @csrf 
          <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$vehiculo->peritaje_id}} class="form-control" tabindex="3" >
        <button type="submit" class="btn btn-primary" tabindex="4">CREAR PAGINADO</button>
      </form>
    
    
    
    
    
    
    
         @endif

    
         
         @if(isset($paginados))  
         
  <table id="paginados" class="table table-dark table-striped mt-4">
  <thead>
    <tr>
      {{--<th scope="col">ID</th>--}}
      <th scope="col">NOMBRE</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>   
   
    @foreach ($paginados as $paginado)
    <tr>
        
        <td>{{$paginado->nombre}}</td>
        
        <td>
         @if($paginado->nombre=="PIE DE PAGINA 1" || $paginado->nombre=="PIE DE PAGINA 2")
         <form action="/spaginados/{{$paginado->id}}" method="POST">
          @csrf    
          @method('PUT')
           <input type="number" style="width: 100px;" name="valor" class="form-control" value="{{$paginado->valor}}"  required>
         <input type="hidden" name="activo" value="{{$paginado->activo}}">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
       
       @else
         <form action="/spaginados/{{$paginado->id}}" method="POST">
          @csrf    
          @method('PUT')
          @php
          if($paginado->activo){
              $activo="Desactivar";
              $valor=0;}
        else{
           $activo="Activar";  
           $valor=1; }
        @endphp
         <input type="hidden" name="activo" value="{{$valor}}">
        <button type="submit" class="btn btn-primary">{{$activo}}</button>
      </form>

@endif

          
      
                   
        </td>        
    </tr>
    @endforeach
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
  $('#paginados').DataTable();
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
title: '¿finalizar el registro de paginados ? ',
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
    'A finalizado el registro de paginados .',
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
