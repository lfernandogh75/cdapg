@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR PIEZAS DE CHASIS</h2>

<form action="/schasiss/{{$chasis->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$chasis->chasispart->name}}" disabled>    
  </div>

  <select class="form-select" name="estado"  id="estado" aria-label="Default select example"  >  
    <option value="{{$chasis->estado}}">{{$chasis->estado}}</option>
    <option value="1">N/A</option>
    <option value="2">ORIGINAL</option>
    <option value="3">CAMBIADO</option>
    <option value="4">BUENA REPARACION</option>
    <option value="5">MAL REPARADO</option>
    <option value="6">SUMIDO</option>
    <option value="7">BUENA SUSTITUCION</option>
    <option value="8">REPARACION REGULAR</option>
  </select>

 
<div class="mb-3">
  <label for="" class="form-label">OBSERVACIONES</label>
  <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3"  value="{{$chasis->observaciones}}" required>
</div>

   
   
   
   
   
  
  
  <a href="/vehiculos?placa={{$chasis->chasiscontrol->peritaje->vehiculo->placa}}&vehiculoindex=chasis" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection