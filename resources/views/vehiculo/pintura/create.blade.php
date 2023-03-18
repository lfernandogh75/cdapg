@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>REGISTRAR PIEZAS DE PINTURA</h2>

<form action="/spinturas" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <select name="pieza" class="form-select" id="pieza">
      @foreach($latoneriaparts as $latoneriapart)
      <option value="{{$latoneriapart->id}}">{{$latoneriapart->name}}</option>
      @endforeach
    </select>
  </div>
 
  <div class="mb-3">
    <label for="" class="form-label">ESTADO</label>
    <select class="form-select" name="estado"  id="estado" aria-label="Default select example"  >  
     
      <option value="1">N/A</option>
      <option value="2">ORIGINAL</option>
      <option value="3">BIEN REPINTADO</option>
      <option value="4">RAYON</option>
      <option value="5">IMPUREZAS</option>
      <option value="6">MAL REPINTADO</option>
      <option value="7">PIEL DE NARANJA</option>
      
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">VISTA</label>
    <select class="form-select" name="vista"  id="vista" aria-label="Default select example"  >  
      <option value="1">IZQUIERDA</option>
      <option value="2">DERECHA</option>
      <option value="3">POSTERIOR</option>
      <option value="4">FRONTAL</option>
   
    </select>
  </div>
   
  <div class="mb-3">
    <label for="" class="form-label">OBSERVACIONES</label>
    <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3" value="N/A" required>
  </div>
  
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3" >
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=pintura" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection