@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR PIEZA SISTEMA motor</h2>

<form action="/smotors/{{$motor->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$motor->motorpark->name}}" disabled>    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">ESTADO</label>
    
    <select class="form-select" name="estado"  id="estado" aria-label="Default select example">  
      <option value="{{$motor->estado}}">{{$motor->estado}}</option>
      <option value="1">Bueno</option>
      <option value="2">Malo</option>
      <option value="3">Regular</option>
      <option value="4">N/A</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">TIPO</label>
 
    <select class="form-select" name="tipo" id="tipo" aria-label="Default select example">  
      <option value="{{$motor->tipo}}">{{$motor->tipo}}</option>
      <option value="1">Original</option>
      <option value="2">Generico</option>
      <option value="3">N/A</option>
    </select>
 
  </div>
  <div class="mb-3">
    <label for="" class="form-label">OBSERVACIONES</label>
    <input id="observaciones" name="observaciones" id="observaciones" type="text" step="any" class="form-control" value="{{$motor->observaciones}}" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
  </div>
  <a href="/vehiculos?placa={{$motor->motorcontrol->peritaje->vehiculo->placa}}&vehiculoindex=3" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection