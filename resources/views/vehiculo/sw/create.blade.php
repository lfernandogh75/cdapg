@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>REGISTRAR SOFTWARE</h2>

<form action="/ssws" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">APLICACION</label>
    <select name="pieza" class="form-select" id="pieza" required>
      @foreach($swparts as $swpart)
      <option value="{{$swpart->id}}">{{$swpart->name}} Ver:{{$swpart->version}} Dis:{{$swpart->dispositivo}}</option>
      @endforeach
    </select>
  </div>
 
  
   
 {{--<div class="mb-3">
    <label for="" class="form-label">VERSION</label>
    <input id="version" name="version" value="N/A" type="text"   class="form-control" tabindex="3" value="N/A" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">DISPOSITIVO</label>
    <input id="dispositivo" name="dispositivo"  value="N/A" type="text"   class="form-control" tabindex="3" value="N/A" required>
  </div>--}}
  
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3" >
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=sw" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection