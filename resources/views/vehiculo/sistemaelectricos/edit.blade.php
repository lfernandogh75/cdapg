@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR EQUIPO ELECTRIOCO</h2>

<form action="/selectricos/{{$electrico->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$electrico->pieza($electrico->electricalpart_id)}}" disabled>    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">ESTADO</label>
    
    <select class="form-select" name="estado"  id="estado" aria-label="Default select example">  
      <option value="{{$electrico->estado}}">{{$electrico->estado}}</option>
      <option value="1">Bueno</option>
      <option value="2">Malo</option>
      <option value="3">Regular</option>
      <option value="4">N/A</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">TIPO</label>
 
    <select class="form-select" name="tipo" id="tipo" aria-label="Default select example">  
      <option value="{{$electrico->tipo}}">{{$electrico->tipo}}</option>
      <option value="1">Original</option>
      <option value="2">Generico</option>
      <option value="3">N/A</option>
    </select>
 
  </div>
  <div class="mb-3">
    <label for="" class="form-label">OBSERVACIONES</label>
    <input id="observaciones" name="observaciones" id="observaciones" type="text" step="any" class="form-control" value="{{$electrico->observaciones}}" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
  </div>
  <a href="/vehiculos?placa={{$electrico->electricocontrol->peritaje->vehiculo->placa}}&vehiculoindex=2" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection