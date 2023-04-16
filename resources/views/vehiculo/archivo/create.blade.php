@extends('layouts.plantillaperitaje')

@section('contenido')
<h2>REGISTRO DE ARCHIVOS</h2>

<form action="/sarchivos" method="POST" enctype="multipart/form-data">
    @csrf
 
 
    <div class="mb-3">
      <label for="" class="form-label">NOMBRE</label>
      <input id="nombre" name="nombre" type="text"  placeholder="  "    class="form-control" tabindex="3" value="{{ old('nombre', 'N/A') }}" required>
    </div>
  <div class="mb-3">
    <label for="" class="form-label">OBSERVACIÓN</label>
    <input id="observacion" name="observacion" type="text"  placeholder="  "    class="form-control" tabindex="3" value="{{ old('observacion', 'N/A') }}" required>
  </div>
 
  
  
 
@error('documento')
    <p  style=" color: red;" class="error-message">{{ $message }}</p>
@enderror

<div class="form-group">
<input type="file" name="documento" placeholder="elige un documento" id="documento"name="documento">
 @error('documento')
 <div class="alert alert-danger mt-1 mb-1">{{$message}}</div>
 @enderror
     
  
</div>
   
   
   
   
   
  <div class="mb-3">
     
    <input id="peritaje_id" name="peritaje_id" type="hidden"  value={{$peritaje->id}} class="form-control" tabindex="3">
  </div>
  <a href="/vehiculos?placa={{$peritaje->vehiculo->placa}}&vehiculoindex=11" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

