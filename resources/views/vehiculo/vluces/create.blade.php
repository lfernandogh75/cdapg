@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>REGISTRAR DE LUCES</h2>

<form action="/svlucess" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">PIEZA</label>
    <select name="pieza" class="form-select" id="pieza" required>
      @foreach($luzparts as $luzpart)
      <option value="{{$luzpart->id}}">{{$luzpart->name}}</option>
      @endforeach
    </select>
  </div>
 
  <div class="mb-3">
    <label for="" class="form-label">ESTADO</label>
    <select class="form-select" name="estado"  id="estado" aria-label="Default select example"  >  
     
      <option value="1">N/A</option>
      <option value="2">BUENA</option>
      <option value="3">MALA</option>
      <option value="4">ORIGINAL</option>
      <option value="5">CAMBIADO</option>

    </select>
  </div>
   
  <div class="mb-3">
    <label for="" class="form-label">OBSERVACIONES</label>
    <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3" value="N/A" required>
  </div>
  
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3" >
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=vluces" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection