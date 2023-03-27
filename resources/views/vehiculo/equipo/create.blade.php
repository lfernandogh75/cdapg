@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>REGISTRAR EQUIPO</h2>

<form action="/sequipos" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">EQUIPO</label>
    <select name="pieza" class="form-select" id="pieza" required>
      @foreach($equipoparts as $equipopart)
      <option value="{{$equipopart->id}}">{{$equipopart->name}} M:{{$equipopart->marca}} S:{{$equipopart->serial}} B:{{$equipopart->banco}} P:{{$equipopart->pef}} L:{{$equipopart->ltoe}}</option>
      @endforeach
    </select>
  </div>
 
   
   
  
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3" >
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=equipo" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection