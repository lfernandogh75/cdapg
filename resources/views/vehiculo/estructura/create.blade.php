@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>REGISTRAR PIEZAS DE LA ESTRUCTURA</h2>

<form action="/sestructuras" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <select name="pieza" class="form-select" id="pieza" required>
      @foreach($estructuraparts as $estructurapart)
      <option value="{{$estructurapart->id}}">{{$estructurapart->name}}</option>
      @endforeach
    </select>
  </div>
 
  <div class="mb-3">
    <label for="" class="form-label">ESTADO</label>
    <select class="form-select" name="estado"  id="estado" aria-label="Default select example"  required>  
     
      <option value="1">N/A</option>
      <option value="2">ORIGINAL</option>
      <option value="3">CAMBIADO</option>
      <option value="4">BUENA REPARACION</option>
      <option value="5">MAL REPARADO</option>
      <option value="6">SUMIDO</option>
      <option value="7">BUENA SUSTITUCION</option>
      <option value="8">REPARACION REGULAR</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="" class="form-label">VISTA</label>
    <select class="form-select" name="vista"  id="vista" aria-label="Default select example" required  >  
     
      <option value="1">IZQUIERDA</option>
      <option value="2">DERECHA</option>
      <option value="3">POSTERIOR</option>
      <option value="4">FRONTAL</option>
      
    </select>
  </div>
   
  <div class="mb-3">
    <label for="" class="form-label">OBSERVACIONES</label>
    <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3" value="N/A" required>
  </div>
  
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3" >
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=estructura" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection