<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DATOS DE LA EMPRESA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
           
<table class="table-fixed w-full">
  <thead>
    <tr class="bg-gray-800 text-white">
    {{-- <th class="border px-4 py-2">Id</th>--}}
      <th class="border px-4 py-2">Razón social</th>
      <th class="border px-4 py-2">Nit</th>
      <th class="border px-4 py-2">Telefono</th>
      <th class="border px-4 py-2">Dirección</th>
      <th class="border px-4 py-2">pagina web</th>
      <th class="border px-4 py-2">Representante legal</th>
      <th class="border px-4 py-2">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($empresas as $empresa)
    <tr>
     {{--  <td>{{$empresa->id}}</td>--}}
        <td>{{$empresa->razonsocial}}</td>
        <td>{{$empresa->nit}}</td> 
        <td>{{$empresa->telefono}}</td> 
        <td>{{$empresa->direccion}}</td> 
        <td>{{$empresa->pagina}}</td> 
        <td>{{$empresa->representantelegal}}</td>
        <td class="border px-4 py-2">
          <div class="flex justify-center rounded.lg text-lg" role="group">
          <a href="{{ route('empresa.edit',$empresa->id)}}" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Editar</a> 
          
        
        </div>
        
                  
              

                   
        </td>        
    </tr>
    @endforeach
     
  </tbody>
</table>
<div>
 
</div>
                </div>
        </div>
    </div>
</x-app-layout>
