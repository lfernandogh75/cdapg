@extends('layouts.plantillaperitaje')

@section('contenido')
<h2> COMPRESION DE MOTOR Y % FUGA</h2>

<form action="/scompresions" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <select name="pieza" class="form-select" id="pieza" required>
      @foreach($compresionparts as $compresionpart)
      <option value="{{$compresionpart->id}}">{{$compresionpart->name}}</option>
      @endforeach
    </select>
  </div>
 
   
  <div class="mb-3">
    <label for="" class="form-label">COMPRESION EN PSI</label>
    <input id="compresion" name="compresion" type="number"  placeholder="valor entre 0 y 400 PSI" step="1" min="0" max="400"   class="form-control" tabindex="3" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">FUGA</label>
    <input id="fuga" name="fuga" type="number"  placeholder="0% a 100%" step="1" min="0" max="100"   class="form-control" tabindex="3" required>
  </div>
   
   
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3" required>
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=6" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection