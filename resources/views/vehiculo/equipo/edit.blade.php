@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR EQUIPO</h2>

<form action="/sequipos/{{$equipo->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$equipo->equipopart->name}}" disabled>    
  </div>

   
  <div class="mb-3">
    <label for="" class="form-label">MARCA</label>
    <input id="marca" name="marca" type="text" value="{{$equipo->marca}}"  class="form-control" tabindex="3" value="N/A" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">SERIAL</label>
    <input id="serial" name="serial" type="text" value="{{$equipo->serial}}"  class="form-control" tabindex="3" value="N/A" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">BANCO</label>
    <input id="banco" name="banco" type="text" value="{{$equipo->banco}}"  class="form-control" tabindex="3" value="N/A" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">PEF</label>
    <input id="pef" name="pef" type="text" value="{{$equipo->pef}}"  class="form-control" tabindex="3" value="N/A" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">LTOE</label>
    <input id="ltoe" name="ltoe" type="text" value="{{$equipo->ltoe}}" class="form-control" tabindex="3" value="N/A" required>
  </div>
 
 

   
   
   
   
   
  
  
  <a href="/vehiculos?placa={{$equipo->equipocontrol->peritaje->vehiculo->placa}}&vehiculoindex=equipo" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection