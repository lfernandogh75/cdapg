@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>REGISTRO DEL MOTOR</h2>

<form action="/smotors" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <select name="pieza" class="form-select" id="pieza" required>
      @foreach($motorparts as $motorpart)
      <option value="{{$motorpart->id}}">{{$motorpart->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">ESTADO</label>
    <select class="form-select" name="estado"  id="estado" aria-label="Default select example">  
     
      <option value="1">Bueno</option>
      <option value="2">Malo</option>
      <option value="3">Regular</option>
      <option value="4">N/A</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">TIPO</label>
    <select class="form-select" name="tipo" id="tipo" aria-label="Default select example">  
     
      <option value="1">Original</option>
      <option value="2">Generico</option>
      <option value="3">N/A</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">OBSERVACIONES</label>
    <input id="observaciones" name="observaciones" id="observaciones" type="text"   class="form-control" tabindex="3"onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" value="N/A" required>
  </div>
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3">
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=3" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection