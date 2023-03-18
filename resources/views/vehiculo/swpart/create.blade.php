<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('AGREGAR SOFTWARE Y/O APLICATIVO ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                 
            <form action="{{route('swpart.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="shadow sm:overflow-hidden sm:rounded-md">
          <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label   class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="name" id="name"   class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>   
              </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
              <label  class="block text-sm font-medium text-gray-700">VERSION</label>
              <input id="version" name="version" value="N/A" type="text"    class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" tabindex="3" value="N/A" required>
            </div>
            </div>
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
              <label  class="block text-sm font-medium text-gray-700">DISPOSITIVO</label>
              <input id="dispositivo" name="dispositivo"  value="N/A" type="text"     class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" tabindex="3" value="N/A" required>
            </div></div>

            <div class="grid grid-cols-3 gap-6">
              <select id ="tipo_vehiculo" name="tipo_vehiculo"  class="form-select">
                 <option value="Automóvil">Automóvil</option>
                 <option value="Camioneta">Camioneta</option>
                 <option value="Motocicleta">Motocicleta</option>
                 <option value="Cabezote">Cabezote</option>
                 <option value="Pesados">Pesados</option>
               </select>
                 </div>
         
            <div class="grid grid-cols-3 gap-6">
            <a href="{{route('swpart.index') }}" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancelar</a>
          <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
          </div>
        </div>
      </div>
      </form>



            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
