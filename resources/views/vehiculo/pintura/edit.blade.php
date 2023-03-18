@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR PIEZAS DE PINTURA</h2>

<form action="/spinturas/{{$pintura->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$pintura->latoneriapart->name}}" disabled>    
  </div>
  <div class="mb-3">
  <select class="form-select" name="estado"  id="estado" aria-label="Default select example"  >  
    <option value="{{$pintura->estado}}">{{$pintura->estado}}</option>
    <option value="1">N/A</option>
    <option value="2">ORIGINAL</option>
    <option value="3">BIEN REPINTADO</option>
    <option value="4">RAYON</option>
    <option value="5">IMPUREZAS</option>
    <option value="6">MAL REPINTADO</option>
    <option value="7">PIEL DE NARANJA</option>
  </select></div>

  <div class="mb-3">
    <label for="" class="form-label">VISTA</label>
    <select class="form-select" name="vista"  id="vista" aria-label="Default select example"  >  
      <option value="{{$pintura->vista}}">{{$pintura->vista}}</option>
      <option value="1">IZQUIERDA</option>
      <option value="2">DERECHA</option>
      <option value="3">POSTERIOR</option>
      <option value="4">FRONTAL</option>
     
    </select>
  </div>

 
<div class="mb-3">
  <label for="" class="form-label">OBSERVACIONES</label>
  <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3"  value="{{$pintura->observaciones}}" required>
</div>

   
   
   
   
   
  
  
  <a href="/vehiculos?placa={{$pintura->pinturacontrol->peritaje->vehiculo->placa}}&vehiculoindex=pintura" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection