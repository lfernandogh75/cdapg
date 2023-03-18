<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <h3>
               @foreach ($articulos as $articulo)
                {{$articulo->codigo}}
                @endforeach
              </h3> 
            <a  href="{{route('productos.create')}}" type="button" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">CREAR</a>
<table class="table-fixed w-full">
  <thead>
    <tr class="bg-gray-800 text-white">
      <th class="border px-4 py-2">Id</th>
      <th class="border px-4 py-2">Nombre</th>
      <th class="border px-4 py-2">Descripción</th>
      <th class="border px-4 py-2">Imagen</th>
      <th class="border px-4 py-2">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($productos as $producto)
    <tr>
        <td>{{$producto->id}}</td>
        <td>{{$producto->nombre}}</td>
        <td>{{$producto->descripcion}}</td>
        <td>
        <img src="/imagen/{{$producto->imagen}}" width="60%">
        </td>
         
        <td class="border px-4 py-2">
          <div class="flex justify-center rounded.lg text-lg" role="group">
          <a href="{{ route('productos.edit',$producto->id)}}" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Editar</a> 
          <form action="{{ route('productos.destroy',$producto->id)}}" method="POST" class="formEliminar">
          @csrf
         @method('DELETE')
         <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Borrar</button>

          </form>
        
        </div>
        
                  
              

                   
        </td>        
    </tr>
    @endforeach
     
  </tbody>
</table>
<div>
{!! $productos->links() !!}
</div>
                </div>
        </div>
    </div>
</x-app-layout>
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
  title: '¿confirma eliminar registro?',
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