@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
  
 

  <table id="peritajes" class="table table-dark table-striped mt-4">
  <thead>
    <tr>
  {{--    <th scope="col">ID</th>--}}
      <th scope="col">NUMERO DE INSPECCION:</th>
      <th scope="col">PLACA:</th>
      <th scope="col">FECHA INICIO:</th>
      <th scope="col">FECHA TERMINACION:</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>   
    @if(isset($peritajes))  
    @foreach ($peritajes as $peritaje)
    <tr>
     {{--   <td>{{$peritaje->id}}</td>--}}
        <td>{{$peritaje->id}}</td>
        <td>{{$peritaje->vehiculo->placa}}</td>
        <td>{{$peritaje->created_at}}</td>
        <td>@if(isset($peritaje->cierre))
            {{$peritaje->cierre->updated_at}}
        @else
            No aplica
            @endif
           </td>
        <td>
          
         
              
          @if(Auth::user()->role->nombre_rol == 'superadmin') 
          <form action="{{ route('historico.destroy',$peritaje->id) }}" method="POST" class="formEliminar">
            <a href="{{ route('historico.show',$peritaje->id)}}" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">DETALLE</a>             
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
           </form>  

           


            
           @endif      
       
        </td>        
    </tr>
    @endforeach
    @endif
    




     
  </tbody>
</table>
 
<!-- xxxxxxxxxxxxxxxxxxxxx -->


@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function () {
  $('#peritajes').DataTable();
});
</script>

<script>
    (function(){
'use strict'
var forms=document.querySelectorAll('.formEliminar')
Array.prototype.slice.call(forms)
.forEach(function(form){
form.addEventListener('submit',function(event){
event.preventDefault()
event.stopPropagation()
Swal.fire({
  title: '¿confirma eliminar peritaje?',
    icon: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
this.submit();
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
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
