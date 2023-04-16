@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>REGISTRAR PIEZAS DE CHASIS</h2>

<form action="/schasiss" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <select name="pieza" class="form-select" id="pieza" required>
      @foreach($chasisparts as $chasispart)
      <option value="{{$chasispart->id}}">{{$chasispart->name}}</option>
      @endforeach
    </select>
  </div>
 
  <div class="mb-3">
    <label for="" class="form-label">ESTADO</label>
    <select class="form-select" name="estado"  id="estado" aria-label="Default select example"  required>  
     
      <option value="1">N/A</option>
      <option value="2">BUENA</option>
      <option value="3">MALO</option>
      <option value="4">REGULAR</option>
      <option value="5">ORIGINAL</option>
      <option value="6">CAMBIADO</option>
      <option value="7">BUENA REPARACION</option>
      <option value="8">MAL REPARADO</option>
      <option value="9">SUMIDO</option>
      <option value="10">BUENA SUSTITUCION</option>
      <option value="11">REPARACION REGULAR</option>
    </select>
  </div>
   
  <div class="mb-3">
    <label for="" class="form-label">OBSERVACIONES</label>
    <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3" value="N/A" required>
  </div>
  
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3" >
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=chasis" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection