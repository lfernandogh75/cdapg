@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR SOFTWARE</h2>

<form action="/ssws/{{$sw->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$sw->swpart->name}}" disabled>    
  </div>

  

 
  <div class="mb-3">
    <label for="" class="form-label">VERSION</label>
    <input id="version" name="version" value="{{$sw->version}}" type="text"   class="form-control" tabindex="3" value="N/A" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">DISPOSITIVO</label>
    <input id="dispositivo" name="dispositivo"  value="{{$sw->dispositivo}}" type="text"   class="form-control" tabindex="3" value="N/A" required>
  </div>

   
   
   
   
   
  
  
  <a href="/vehiculos?placa={{$sw->swcontrol->peritaje->vehiculo->placa}}&vehiculoindex=sw" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection