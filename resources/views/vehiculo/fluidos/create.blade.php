@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>FUGAS DE  FLUIDOS</h2>

<form action="/sfluidos" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <select name="pieza" class="form-select" id="pieza">
      @foreach($fluidoparts as $fluidopart)
      <option value="{{$fluidopart->id}}">{{$fluidopart->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">ESTADO</label>
    <select class="form-select" name="estado"  id="estado" aria-label="Default select example"  >  
     
      <option value="1">NO</option>
      <option value="2">SI</option>
      <option value="3">N/A</option>
      
    </select>
  </div>
   
  <div class="mb-3">
    <label for="" class="form-label">OBSERVACIONES</label>
    <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3" value="N/A" required>
  </div>
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3">
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=5" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection