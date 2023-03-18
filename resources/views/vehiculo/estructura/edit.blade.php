@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR PIEZAS DE LA ESTRUCTURA</h2>

<form action="/sestructuras/{{$estructura->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$estructura->estructurapart->name}}" disabled>    
  </div>

  <select class="form-select" name="estado"  id="estado" aria-label="Default select example"  >  
    <option value="{{$estructura->estado}}">{{$estructura->estado}}</option>
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
    <label for="" class="form-label">VISTA</label>
    <select class="form-select" name="vista"  id="vista" aria-label="Default select example"  >  
      <option value="{{$estructura->vista}}">{{$estructura->vista}}</option>
      <option value="1">IZQUIERDA</option>
      <option value="2">DERECHA</option>
      <option value="3">POSTERIOR</option>
      <option value="4">FRONTAL</option>
       
    </select>
  </div>

 
<div class="mb-3">
  <label for="" class="form-label">OBSERVACIONES</label>
  <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3"  value="{{$estructura->observaciones}}" required>
</div>

   
   
   
   
   
  
  
  <a href="/vehiculos?placa={{$estructura->estructuracontrol->peritaje->vehiculo->placa}}&vehiculoindex=estructura" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection