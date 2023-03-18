@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>EDITAR PIEZAS DE LA LATONERIA O CARROCERIA</h2>

<form action="/slatonerias/{{$latoneria->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$latoneria->latoneriapart->name}}" disabled>    
  </div>
  <div class="mb-3">
  <select class="form-select" name="estado"  id="estado" aria-label="Default select example"  >  
    <option value="{{$latoneria->estado}}">{{$latoneria->estado}}</option>
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
    <label for="" class="form-label">VISTA</label>
    <select class="form-select" name="vista"  id="vista" aria-label="Default select example"  >  
      <option value="{{$latoneria->vista}}">{{$latoneria->vista}}</option>
      <option value="1">IZQUIERDA</option>
      <option value="2">DERECHA</option>
      <option value="3">POSTERIOR</option>
      <option value="4">FRONTAL</option>
       
    </select>
  </div>

 
<div class="mb-3">
  <label for="" class="form-label">OBSERVACIONES</label>
  <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3"  value="{{$latoneria->observaciones}}" required>
</div>

   
   
   
   
   
  
  
  <a href="/vehiculos?placa={{$latoneria->latoneriacontrol->peritaje->vehiculo->placa}}&vehiculoindex=latoneria" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection