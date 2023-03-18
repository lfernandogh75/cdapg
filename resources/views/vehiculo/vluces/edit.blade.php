@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR PIEZAS DE LUCES</h2>

<form action="/svlucess/{{$vluces->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$vluces->luzpart->name}}" disabled>    
  </div>

  <select class="form-select" name="estado"  id="estado" aria-label="Default select example"  >  
    <option value="{{$vluces->estado}}">{{$vluces->estado}}</option>
    <option value="1">N/A</option>
    <option value="2">BUENA</option>
    <option value="3">MALA</option>
    <option value="4">ORIGINAL</option>
    <option value="5">CAMBIADO</option>
  </select>

 
<div class="mb-3">
  <label for="" class="form-label">OBSERVACIONES</label>
  <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3"  value="{{$vluces->observaciones}}" required>
</div>

   
   
   
   
   
  
  
  <a href="/vehiculos?placa={{$vluces->vlucescontrol->peritaje->vehiculo->placa}}&vehiculoindex=vluces" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection