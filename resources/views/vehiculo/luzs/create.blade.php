@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>REGISTRAR LUCES</h2>

<form action="/sluzs" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">LUCES</label>
    <select name="pieza" class="form-select" id="pieza" required>
      @foreach($luzparts as $luzpart)
      <option value="{{$luzpart->id}}">{{$luzpart->name}}</option>
      @endforeach
    </select>
  </div>
   
  <div class="mb-3">
    <label for="" class="form-label">INTENSIDAD</label>
    <input id="intensidad" name="intensidad" type="number" placeholder="" step="0.01" min="0" max="1000"   class="form-control" tabindex="3" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">MINIMO</label>
    <input id="minimo" name="minimo" type="number"  placeholder="" step="0.01" min="0" max="1000"   class="form-control" tabindex="3" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">UNIDAD</label>
    <input id="unidad" name="unidad" type="text"  placeholder=""     class="form-control" tabindex="3" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">INCLINACION</label>
    <input id="inclinacion" name="inclinacion" type="number"  placeholder="" step="0.01" min="0" max="1000"   class="form-control" tabindex="3" required>
  </div>
   
  <div class="mb-3">
    <label for="" class="form-label">RANGO</label>
    <input id="rango" name="rango" type="text" placeholder="(0.5 3.5)"  class="form-control" tabindex="3" required>
  </div>
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3">
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=9" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection