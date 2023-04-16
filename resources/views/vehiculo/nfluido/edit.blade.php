@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR PIEZAS DE LUCES</h2>

<form action="/snfluidos/{{$nfluido->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$nfluido->fluidopart->name}}" disabled>    
  </div>

  <select class="form-select" name="estado"  id="estado" aria-label="Default select example"  >  
    <option value="{{$nfluido->estado}}">{{$nfluido->estado}}</option>
    <option value="1">N/A</option>
    <option value="2">OPTIMO</option>
    <option value="3">BAJO</option>
    <option value="4">ALTO</option>
  </select>

 
<div class="mb-3">
  <label for="" class="form-label">OBSERVACIONES</label>
  <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3"  value="{{$nfluido->observaciones}}" required>
</div>

   
   
   
   
   
  
  
  <a href="/vehiculos?placa={{$nfluido->nfluidocontrol->peritaje->vehiculo->placa}}&vehiculoindex=nfluido" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection