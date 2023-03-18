<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('crear producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                 
            <form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="shadow sm:overflow-hidden sm:rounded-md">
          <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label   class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre"   class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">   
              </div>
            </div>

            <div>
            <label   class="block text-sm font-medium text-gray-700">Descripción</label>
                <input type="text" name="descripcion"   class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"> 
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
              
                 <img id="imagenSelecctionada" style="max-height: 300px;">
            </div>
            

            <div>
              <label class="block text-sm font-medium text-gray-700">Cover photo</label>
              <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <label  class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                      <p class="text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider"> Seleccionar imagen</p>
                      <input id="imagen" name="imagen" type="file" class="hidden">
                    </label>
                     
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <a href="{{route('productos.index') }}" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancelar</a>
          <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
          </div>
        </div>
      </form>



            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function(e){
    $('#imagen').change(function(){
      let reader = new FileReader();
      reader.onload = (e) =>{
        $('#imagenSelecctionada').attr('src',e.target.result);
      }
      reader.readAsDataURL(this.files[0]);
    });
  });
</script>
