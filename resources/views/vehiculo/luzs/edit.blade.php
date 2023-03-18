@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR LUCES</h2>

<form action="/sluzs/{{$luz->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$luz->luzpart->name}}" disabled>    
  </div>
   
  <div class="mb-3">
    <label for="" class="form-label">INTENSIDAD</label>
    <input id="intensidad" name="intensidad" type="number" placeholder="" step="0.01" min="0" max="1000"   class="form-control" tabindex="3" value="{{$luz->intensidad}}" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">MINIMO</label>
    <input id="minimo" name="minimo" type="number"  placeholder="" step="0.01" min="0" max="1000"   class="form-control" tabindex="3" value="{{$luz->minimo}}" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">UNIDAD</label>
    <input id="unidad" name="unidad" type="text"  placeholder=""     class="form-control" tabindex="3" value="{{$luz->unidad}}" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">INCLINACION</label>
    <input id="inclinacion" name="inclinacion" type="number"  placeholder="" step="0.01" min="0" max="1000"   class="form-control" tabindex="3" value="{{$luz->inclinacion}}" required>
  </div>
   
  <div class="mb-3">
    <label for="" class="form-label">RANGO</label>
    <input id="rango" name="rango" type="text" placeholder="(0.5 3.5)"  class="form-control" tabindex="3" value="{{$luz->rango}}" required>
  </div>
   
   
  
   
  <a href="/vehiculos?placa={{$luz->luzcontrol->peritaje->vehiculo->placa}}&vehiculoindex=6" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection