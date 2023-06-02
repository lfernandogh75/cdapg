@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>Activar o desactivar </h2>

<form action="/spaginados/{{$paginado->id}}" method="POST">
    @csrf    
    @method('PUT')
 
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input id="nombre" name="nombre" type="text"   class="form-control" tabindex="3" value="{{$paginado->nombre}}" readonly>
      </div>
      

   
   
   
   
   
  
  
  <a href="/vehiculos?placa={{$paginado->paginadocontrol->peritaje->vehiculo->placa}}&vehiculoindex=paginado" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection