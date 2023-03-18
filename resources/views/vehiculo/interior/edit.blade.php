@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR PIEZAS DE INTERIOR</h2>

<form action="/sinteriors/{{$interior->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$interior->interiorpart->name}}" disabled>    
  </div>
  <div class="mb-3">
  <select class="form-select" name="estado"  id="estado" aria-label="Default select example"  >  
    <option value="{{$interior->estado}}">{{$interior->estado}}</option>
    <option value="1">N/A</option>
      <option value="2">BUEN ESTADO</option>
      <option value="3">ORIGINAL</option>
      <option value="4">CAMBIADO</option>
      <option value="5">BUENA REPARACION</option>
      <option value="6">MAL REPARADO</option>
      <option value="7">SUMIDO</option>
      <option value="8">BUENA SUSTITUCION</option>
      <option value="9">REPARACION REGULAR</option>
  </select>
</div>
 
<div class="mb-3">
  <label for="" class="form-label">OBSERVACIONES</label>
  <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3"  value="{{$interior->observaciones}}" required>
</div>

   
   
   
   
   
  
  
  <a href="/vehiculos?placa={{$interior->interiorcontrol->peritaje->vehiculo->placa}}&vehiculoindex=interior" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection