@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR FOTOS</h2>

<form action="/sfotos/{{$foto->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$foto->fotopart->name}}" disabled>    
  </div>

  <div>
    <label   class="block text-sm font-medium text-gray-700">OBSERVACIÓN </label>
        <input type="text" name="observacion"  value="{{$foto->observacion}}"   class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required> 
    </div>

    <div class="grid grid-cols-1 mt-5 mx-7">
      
         <img src="/imagen/{{$foto->imagen}}" id="imagenSelecctionada" style="max-height: 300px;">
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
              <input id="imagen" name="imagen" type="file" class="hidden" required>
            </label>
             
          </div>
          
        </div>
      </div>
    </div>

   
   
   
   
   
   
   
  
  
  <a href="/vehiculos?placa={{$foto->fotocontrol->peritaje->vehiculo->placa}}&vehiculoindex=11" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection

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
