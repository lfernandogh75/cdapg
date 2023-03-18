@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR LLANTA</h2>

<form action="/sllantas/{{$llanta->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$llanta->llantapart->name}}" disabled>    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">PARA CAMBIO</label>
    
    <select class="form-select" name="cambio"  id="cambio" aria-label="Default select example">  
      <option value="{{$llanta->cambio}}">{{$llanta->cambio}}</option>
      <option value="1">NO</option>
      <option value="2">SI</option>
      <option value="3">N/A</option>
       
    </select>
  </div>
   
  <div class="mb-3">
    <label for="" class="form-label">LABRADO</label>
    <input id="labrado" name="labrado" type="number" placeholder="1.0" step="0.01" min="0" max="10"   class="form-control" tabindex="3" value="{{$llanta->labrado}}" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">PRESION</label>
    <input id="presion" name="presion" type="number"  placeholder="valor entre 0 y 60" step="0" min="0" max="60"   class="form-control" tabindex="3" value="{{$llanta->presion}}" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">VIDA UTIL</label>
    <input id="vidautil" name="vidautil" type="number"  placeholder="0% a 100%" step="0" min="0" max="100"   class="form-control" tabindex="3" value="{{$llanta->vidautil}}" required>
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">OBSERVACIONES</label>
    <input id="observaciones" name="observaciones" type="text" step="any" class="form-control" value="{{$llanta->observaciones}}" required>
  </div>
  <a href="/vehiculos?placa={{$llanta->llantacontrol->peritaje->vehiculo->placa}}&vehiculoindex=6" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection