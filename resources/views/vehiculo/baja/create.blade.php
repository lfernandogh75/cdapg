@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>REGISTRAR PARTE BAJA</h2>

<form action="/sbajas" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <select name="pieza" class="form-select" id="pieza">
      @foreach($bajaparts as $bajapart)
      <option value="{{$bajapart->id}}">{{$bajapart->name}}</option>
      @endforeach
    </select>
  </div>
 
  <div class="mb-3">
    <label for="" class="form-label">ESTADO</label>
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
    <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3" value="N/A" required>
  </div>
  
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3" >
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=baja" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection