@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
<form>
  
   
  <div class="row">
    <div class="col-md-3">
    <label for="placa" class="form-label">PLACA</label>
    </div>
    <div class="col-md-3"> 
    <input type="text"   class="form-control" id="placa" name="placa" value="{{$vehiculo->placa}}" readonly  placeholder="PLACA" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required >
  </div>
  </div>
  <div class="row">
    <div class="col-md-3">
 <label for="tipo_vehiculo" class="form-label">TIPO DE VEHICULO</label>
    </div>
    <div class="col-md-3">
 <select id ="tipo_vehiculo" name="tipo_vehiculo"  class="form-select">
  <option value="{{$vehiculo->clase_vehiculo}}">{{$vehiculo->clase_vehiculo}}</option>
  
  </select>
    </div></div>
  <div class="row">
    <div class="col-md-3">
 <label for="tipo_peritaje" class="form-label">Tipo de peritaje</label>
    </div>
    <div class="col-md-3">
 <select id ="tipo_peritaje" name="tipo_peritaje"  class="form-select">
  <option value="{{$vehiculo->peritaje->tipo}}">{{$vehiculo->peritaje->tipo}}</option>
    
  </select>
    </div>
  </div>
 
  <div class="row">
    <div class="col-md-3">
    <label for="placa" class="form-label">SOLICITANTE</label>
    </div>
    <div class="col-md-3"> 
    <input type="text"  readonly  class="form-control" id="solicitante" name="solicitante" value="{{$vehiculo->solicitante}}" placeholder="NOMBRE SOLICITANTE" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required >
  </div>
  </div>
  <div class="row">
    <div class="col-md-3">
    <label for="placa" class="form-label">TIPO DE DOCUMENTO</label>
    </div>
    <div class="col-md-3"> 
      <select id ="tipoidentificacion" name="tipoidentificacion"  class="form-select">
        <option value="{{$vehiculo->tipoidentificacion}}">{{$vehiculo->tipoidentificacion}}</option>
      </select>
  </div>
  </div>
  <div class="row">
    <div class="col-md-3">
    <label for="placa" class="form-label">NUMERO DE DOCUMENTO</label>
    </div>
    <div class="col-md-3"> 
      <input type="text"  readonly  class="form-control" id="numeroidentificacion" name="numeroidentificacion" value="{{$vehiculo->numeroidentificacion}}" placeholder="NUMERO" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required >
  </div>
  </div>
  <div class="row">
    <div class="col-md-3">
    <label for="placa" class="form-label">TELEFONO</label>
    </div>
    <div class="col-md-3"> 
      <input type="text"  readonly  class="form-control" id="telefono" name="telefono" value="{{$vehiculo->telefono}}" placeholder="NUMERO DE TELEFONO" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required >
  </div>
  </div>
  <div class="row">
    <div class="col-md-3">
    <label for="placa" class="form-label">CORREO</label>
    </div>
    <div class="col-md-3"> 
      <input type="email"  readonly class="form-control" id="email" name="email" value="{{$vehiculo->email}}" placeholder="" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required >
  </div>
  </div>
  <div class="row">
    <div class="col-md-3">
    <label for="placa" class="form-label">KILOMETRAJE</label>
    </div>
    <div class="col-md-3"> 
      <input id="km" name="km" type="number" readonly value="{{$vehiculo->km}}"  placeholder="valor en kilometros" step="0" min="0" max="10000000"   class="form-control" tabindex="3" required>
  </div>
  </div>
   
   

     
          
     

    
    
      



     <a href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Regresar </a>
  
</form>

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script src="/js/marca_lineas.js">

</script>
<script src="/js/marca_lineas_edit.js">
</script>
@endsection
@endsection

 