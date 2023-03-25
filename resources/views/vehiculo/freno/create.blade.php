@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>PRUEBA DE FRENOS</h2>

<form action="/sfrenos" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <select name="pieza" class="form-select" id="pieza">
      @foreach($frenoparts as $frenopart)
      <option value="{{$frenopart->id}}">{{$frenopart->name}}</option>
      @endforeach
    </select>
  </div>
 
   
  <div class="mb-3">
    <label for="" class="form-label">EFICACIA TOTAL</label>
    <input id="eficiencia" name="eficiencia" type="number"  placeholder="valor entre 0 y 100 " step="0.01" min="0" max="100"   class="form-control" tabindex="3" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">MINIMO</label>
    <input id="minimo" name="minimo" type="number"  placeholder="0% a 100%" step="0" min="0" max="100"   class="form-control" tabindex="3" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">FUERZA</label>
    <input id="fuerza" name="fuerza" type="number"  placeholder="0 a 100000" step="1" min="0" max="100000"   class="form-control" tabindex="3" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">PESO</label>
    <input id="peso" name="peso" type="number"  placeholder="0 a 100000" step="1" min="0" max="100000"   class="form-control" tabindex="3" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">UNIDAD</label>
    <input id="unidad" name="unidad" type="text"  placeholder=""     class="form-control" tabindex="3" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
  </div>
   
   
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3" >
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=10" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection