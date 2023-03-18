<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('color') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
            <a  href="{{route('color.create')}}" type="button" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">CREAR</a>
<table class="table-fixed w-full">
  <thead>
    <tr class="bg-gray-800 text-white">
    {{--  <th class="border px-4 py-2">Id</th>--}}
      <th class="border px-4 py-2">Nombre</th>
      <th class="border px-4 py-2">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($colors as $color)
    <tr>
      {{--  <td>{{$color->id}}</td>--}}
        <td>{{$color->nombre}}</td>  
        <td class="border px-4 py-2">
          <div class="flex justify-center rounded.lg text-lg" role="group">
          <a href="{{ route('color.edit',$color->id)}}" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Editar</a> 
          <form action="{{ route('color.destroy',$color->id)}}" method="POST" class="formEliminar">
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
{!! $colors->links() !!}
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