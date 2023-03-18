@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
 
@if(isset($vehiculo)) 
 REGISTRO DE SOFTWARE : {{$vehiculo->placa}} <br/>
  @endif
  @if(isset($responsable))  
  PERITO: {{$responsable->name}} <br/>


<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
@if(isset($vehiculo) && Auth::user()->id==$responsable->id && $swcontrol->activo)
  
         <a href="{{ URL::to('/') }}/ssws/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR APLICACION</a>
       
       
         <form action="{{ route('swcontrol.update','sw')}}" method="POST" class="formdesactivar">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
            <textarea class="form-control" name="observacion" id="observacion" rows="3" required value="{{$swcontrol->observacion}}" placeholder="La observación general se diligencia al final de registrar todas las piezas y se almacena al finalizar la inspección del sw ">{{$swcontrol->observacion}}</textarea>
          </div>
          
          <input type="hidden" name="peritajeid" value="{{$vehiculo->peritaje->id}}">

          @method('PUT')
         <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">FINALIZAR REGISTRO DE APLICATIVOS</button>
        
          </form>
     @endif

     @if(isset($swcontrol->activo))
     @if($swcontrol->activo==0)
     <div class="form-group">
       <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
       <textarea class="form-control" name="observacion" id="observacion" rows="3" required value="{{$swcontrol->observacion}}" placeholder="La observación general se diligencia al final de registrar todas las piezas y se almacena al finalizar la inspección del sw " readonly>{{$swcontrol->observacion}}</textarea>
     </div>
      
     @endif
  @endif
 
         

         
  <table id="sws" class="table table-dark table-striped mt-4">
  <thead>
    <tr>
      {{--<th scope="col">ID</th>--}}
      <th scope="col">APLICACION</th>
      <th scope="col">VERSION</th>
      <th scope="col">DISPOSITIVO</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>   
    @if(isset($sws))  
    @foreach ($sws as $sw)
    <tr>
        {{--<td>{{$sw->id}}</td>--}}
        <td>{{$sw->swpart->name}}</td>
        <td>{{$sw->swpart->version}}</td>
        <td>{{$sw->swpart->dispositivo}}</td>
        <td>
          @if(Auth::user()->id==$responsable->id && $swcontrol->activo) 
        <form action="{{ route('ssws.destroy',$sw->id) }}" method="POST">
      {{--    <a href="/ssws/{{$sw->id}}/edit" class="btn btn-info">Editar</a>  --}}       
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
         <a href="{{ URL::to('/') }}/ssws/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >  SER RESPONSABLE DE AGREGAR LAS APLICACIONES </a>
       
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
  $('#sws').DataTable();
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
title: '¿finalizar el registro de software ? ',
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
    'A finalizado el registro de software .',
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

 