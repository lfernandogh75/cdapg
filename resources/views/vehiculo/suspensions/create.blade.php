@extends('layouts.plantillaperitaje')

@section('contenido')
 
@if(!isset($mecanizado))
<h2>REGISTRAR PIEZAS DE SUSPENCION</h2>

<form action="/ssuspensions" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <select name="pieza" class="form-select" id="pieza" required>
      @foreach($suspensionparts as $suspensionpart)
      <option value="{{$suspensionpart->id}}">{{$suspensionpart->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">PARA CAMBIO</label>
    <select class="form-select" name="cambio"  id="cambio" aria-label="Default select example">  
     
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
    <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" value="N/A" required>
  </div>
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3">
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=7" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
    
@else

<h2>REGISTRAR PIEZAS DE SUSPENCION</h2>

<form action="/ssuspensionms" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <select name="pieza" class="form-select" id="pieza" required>
      @foreach($suspensionparts as $suspensionpart)
      <option value="{{$suspensionpart->id}}">{{$suspensionpart->name}}</option>
      @endforeach
    </select>

    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">PORCENTAJE</label>
   
    <input id="porcentaje" name="porcentaje"  type="number"   step="0" min="0" max="100" style="width : 80px; heigth : 10px;font-size: x-small" required >
  </div>

  
  
   
  
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3">
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=sm" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@endif

@endsection