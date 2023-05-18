@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR ESCANER</h2>

<form action="/sescaners/{{$escaner->id}}" method="POST">
    @csrf    
    @method('PUT')
 
    <div class="mb-3">
        <label for="" class="form-label">CODIGO ERROR</label>
        <input id="codigo" name="codigo" type="text"   class="form-control" tabindex="3" value="{{$escaner->codigo}}" required>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">ELEMENTO</label>
        <input id="elemento" name="elemento" type="text"   class="form-control" tabindex="3" value="{{$escaner->elemento}}"  required>
      </div>
   

 
<div class="mb-3">
  <label for="" class="form-label">OBSERVACIONES</label>
  <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3"  value="{{$escaner->observaciones}}" required>
</div>

   
   
   
   
   
  
  
  <a href="/vehiculos?placa={{$escaner->escanercontrol->peritaje->vehiculo->placa}}&vehiculoindex=escaner" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection