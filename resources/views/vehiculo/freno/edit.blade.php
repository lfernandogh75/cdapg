@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR PRUEBA DE FRENOS</h2>

<form action="/sfrenos/{{$freno->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$freno->frenopart->name}}" disabled>    
  </div>

  <div class="mb-3">
    <label for="" class="form-label">EFICACIA TOTAL</label>
    <input id="eficiencia" name="eficiencia" type="number"  placeholder="valor entre 0 y 100 " step="0.01" min="0" max="100"   class="form-control" tabindex="3"  value="{{$freno->eficiencia}}"  required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">MINIMO</label>
    <input id="minimo" name="minimo" type="number"  placeholder="0% a 100%" step="o" min="0" max="100"   class="form-control" tabindex="3" value="{{$freno->minimo}}" required >
  </div>
  <div class="mb-3">
    <label for="" class="form-label">FUERZA</label>
    <input id="fuerza" name="fuerza" type="number"  placeholder="0 a 100000" step="1" min="0" max="100000"   class="form-control" tabindex="3" value="{{$freno->fuerza}}" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">PESO</label>
    <input id="peso" name="peso" type="number"  placeholder="0 a 100000" step="1" min="0" max="100000"   class="form-control" tabindex="3" value="{{$freno->peso}}" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">UNIDAD</label>
    <input id="unidad" name="unidad" type="text"  placeholder=""     class="form-control" tabindex="3" value="{{$freno->unidad}}" required>
  </div>
   
   
   
   
   
  
  
  <a href="/vehiculos?placa={{$freno->frenocontrol->peritaje->vehiculo->placa}}&vehiculoindex=10" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection