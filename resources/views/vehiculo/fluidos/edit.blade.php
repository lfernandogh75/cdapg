@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR FUGAS DE FLUIDOS</h2>

<form action="/sfluidos/{{$fluido->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$fluido->fluidopart->name}}" disabled>    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">ESTADO</label>
    
    <select class="form-select" name="estado"  id="estado" aria-label="Default select example" required>  
      <option value="{{$fluido->estado}}">{{$fluido->estado}}</option>
      <option value="1">NO</option>
      <option value="2">SI</option>
      <option value="3">N/A</option>
       
    </select>
  </div>
   
  
  <div class="mb-3">
    <label for="" class="form-label">OBSERVACIONES</label>
    <input id="observaciones" name="observaciones" type="text" step="any" class="form-control" value="{{$fluido->observaciones}}" required>
  </div>
  <a href="/vehiculos?placa={{$fluido->fluidocontrol->peritaje->vehiculo->placa}}&vehiculoindex=5" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection