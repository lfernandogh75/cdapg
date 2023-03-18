@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR VIDRIOS</h2>

<form action="/svidrios/{{$vidrio->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$vidrio->vidriopart->name}}" disabled>    
  </div>

  <select class="form-select" name="estado"  id="estado" aria-label="Default select example"  >  
    <option value="{{$vidrio->estado}}">{{$vidrio->estado}}</option>
    <option value="1">N/A</option>
      <option value="2">BUEN ESTADO</option>
      <option value="3">ORIGINAL</option>
      <option value="4">CAMBIADO</option>
      <option value="5">BUENA REPARACION</option>
      <option value="6">MAL REPARADO</option>
      <option value="7">PICADO</option>
      <option value="8">BUENA SUSTITUCION</option>
      <option value="9">REPARACION REGULAR</option>
  </select>

 
<div class="mb-3">
  <label for="" class="form-label">OBSERVACIONES</label>
  <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3"  value="{{$vidrio->observaciones}}" required>
</div>

   
   
   
   
   
  
  
  <a href="/vehiculos?placa={{$vidrio->vidriocontrol->peritaje->vehiculo->placa}}&vehiculoindex=vidrio" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection