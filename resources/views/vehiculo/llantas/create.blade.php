@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>REGISTRAR LLANTA</h2>

<form action="/sllantas" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">LLANTA</label>
    <select name="pieza" class="form-select" id="pieza" required>
      @foreach($llantaparts as $llantapart)
      <option value="{{$llantapart->id}}">{{$llantapart->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">PARA CAMBIO</label>
    <select class="form-select" name="cambio"  id="cambio" aria-label="Default select example">  
     
      <option value="1">NO</option>
      <option value="2">SI</option>
      <option value="3">N/A</option>
      
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">LABRADO</label>
    <input id="labrado" name="labrado" type="number" placeholder="1.0" step="0.01" min="0" max="10"   class="form-control" tabindex="3" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">PRESION</label>
    <input id="presion" name="presion" type="number"  placeholder="valor entre 0 y 60" step="0" min="0" max="60"   class="form-control" tabindex="3" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">VIDA UTIL</label>
    <input id="vidautil" name="vidautil" type="number"  placeholder="0% a 100%" step="0" min="0" max="100"   class="form-control" tabindex="3" required>
  </div>
   
  <div class="mb-3">
    <label for="" class="form-label">OBSERVACIONES</label>
    <input id="observaciones" name="observaciones" type="text"   class="form-control" tabindex="3" value="N/A" required>
  </div>
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3">
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=6" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection