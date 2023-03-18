@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>COMPRESION DE MOTOR Y % FUGA</h2>

<form action="/scompresions/{{$compresion->id}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <input id="pieza" name="pieza" type="text" class="form-control" value="{{$compresion->compresionpart->name}}" disabled>    
  </div>
   
   
   
  <div class="mb-3">
    <label for="" class="form-label">COMPRENSION EN PSI</label>
    <input id="compresion" name="compresion" type="number"  placeholder="valor entre 0 y 400" step="1" min="0" max="400"   class="form-control" tabindex="3" value="{{$compresion->compresion}}" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">PORCENTAJE DE FUGA</label>
    <input id="fuga" name="fuga" type="fuga"  placeholder="0% a 100%" step="1" min="0" max="100"   class="form-control" tabindex="3" value="{{$compresion->fuga}}" required>
  </div>
  
  
  <a href="/vehiculos?placa={{$compresion->compresioncontrol->peritaje->vehiculo->placa}}&vehiculoindex=8" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection