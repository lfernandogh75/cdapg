@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>ESCANER</h2>

<form action="/sescaners" method="POST">
    @csrf
  
    <div class="mb-3">
        <label for="" class="form-label">CODIGO ERROR</label>
        <input id="codigo" name="codigo" type="text"   class="form-control" tabindex="3"  required>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">ELEMENTO</label>
        <input id="elemento" name="elemento" type="text"   class="form-control" tabindex="3"  required>
      </div>
   
   
  <div class="mb-3">
    <label for="" class="form-label">OBSERVACIONES</label>
    <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3" value="N/A" required>
  </div>
  
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3" >
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=escaner" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection