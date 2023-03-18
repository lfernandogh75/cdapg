<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
             {{--<x-jet-welcome />--}} 
             
             <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <div class="card">
                    <div class="card-body">
                        <img src="/imagen/plantillas/moto.jpg" class="card-img-top" alt="..." style="height: 100px; width: 120px;">
                        <div class="card-body">
                          <a href="/cvehiculo/" class="btn btn-primary">Nuevo Peritaje</a>
                        </div> 
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                       
                            <img src="/imagen/plantillas/carro.jpeg" class="card-img-top" alt="..." style="height: 100px; width: 120px;">
                            <div class="card-body">
                              <a href="/vehiculos/" class="btn btn-primary">Consultar Peritaje</a>
                            </div>    
                          
                    </div>
                  </div>
                </div>
              </div>



            </div>
        </div>
    </div>
</x-app-layout>
