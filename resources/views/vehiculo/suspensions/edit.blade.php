@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR PIEZA DE SUSPENSION</h2>

<form action="/ssuspensions/{{$suspension->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$suspension->suspensionpart->name}}" disabled>    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">PARA CAMBIO</label>
    
    <select class="form-select" name="cambio"  id="cambio" aria-label="Default select example">  
      <option value="{{$suspension->cambio}}">{{$suspension->cambio}}</option>
      <option value="1">NO</option>
      <option value="2">SI</option>
      <option value="3">N/A</option>
       
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">ESTADO</label>
    
  </div>
   
  <div class="mb-3">
    <select class="form-select" name="estado"  id="estado" aria-label="Default select example"  >  
      <option value="{{$suspension->estado}}">{{$suspension->estado}}</option>
      <option value="1">N/A</option>
        <option value="2">BUEN ESTADO</option>
        <option value="3">ORIGINAL</option>
        <option value="4">CAMBIADO</option>
        <option value="5">BUENA REPARACION</option>
        <option value="6">MAL REPARADO</option>
        <option value="7">SUMIDO</option>
        <option value="8">BUENA SUSTITUCION</option>
        <option value="9">REPARACION REGULAR</option>
    </select>
  </div>
  
  
  <div class="mb-3">
    <label for="" class="form-label">OBSERVACIONES</label>
    <input id="observaciones" name="observaciones" type="text" step="any" class="form-control" value="{{$suspension->observaciones}}" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
  </div>
  <a href="/vehiculos?placa={{$suspension->suspensioncontrol->peritaje->vehiculo->placa}}&vehiculoindex=7" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection