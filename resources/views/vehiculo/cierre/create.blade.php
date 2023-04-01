@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
<form action="/cierres" method="POST">
  @csrf
  
  <div class="row">
    <div class="col-md-3">
      <label for="propietario" class="form-label">CODIGO FASECOLDA</label>
    </div>
    <div class="col-md-3">
      <input type="text"   class="form-control" id="codigofasecolda" name="codigofasecolda" placeholder="CODIGO FASECOLDA" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"   required>
    </div>
    <div class="col-md-3">
      <label for="identificacion_propietario" class="form-label">VALOR FASECOLDA</label>
    </div>
    <div class="col-md-3">
      <input type="text"   class="form-control" id="valorfasecolda" name="valorfasecolda" placeholder="VALOR FASECOLDA" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"   required>
    </div>

  </div>

  <div class="row">
    <div class="col-md-3">
      <label for="identificacion_propietario" class="form-label">VALOR ACCESORIOS</label>
    </div>
    <div class="col-md-3">
      <input type="text"   class="form-control" id="valoraccesorios" name="valoraccesorios" placeholder="VALOR ACCESORIOS" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"   required>
    </div>
    <div class="col-md-3">
      <label for="identificacion_propietario" class="form-label">VALOR CARVALUE</label>
    </div>
    <div class="col-md-3">
      <input type="text"   class="form-control" id="valorcarvalue" name="valorcarvalue" placeholder="VALOR CARVALUE" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"   required>
    </div>

  </div>

  <div class="row">
    <div class="col-md-3">
      <label for="identificacion_propietario" class="form-label">SERVICIO SOLICITADO</label>
    </div>
    <div class="col-md-3">
      <input type="text"   class="form-control" id="serviciosolicitado" name="serviciosolicitado" placeholder="SERVICIO SOLICITADO" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"  required>
    </div>
    <div class="col-md-3">
      <label for="identificacion_propietario" class="form-label">RESULTADO</label>
    </div>
    <div class="col-md-3">
      <input type="text"   class="form-control" id="resultado" name="resultado" placeholder="RESULTADO" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"   required>
    </div>

  </div>
  <div class="row">
    <div class="col-md-3">
      <label for="identificacion_propietario" class="form-label">FECHA GNVC</label>
    </div>
    <div class="col-md-3">
      <input type="text"   class="form-control" id="gnvc" name="gnvc" placeholder="FECHA CERTIFICADO GNVC" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"   required>
    </div>
    <div class="col-md-3">
      <label for="identificacion_propietario" class="form-label">TIPO DE PINTURA</label>
    </div>
    <div class="col-md-3">
      <input type="text"   class="form-control" id="tipopintura" name="tipopintura" placeholder="TIPO DE PINTURA" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"   required>
    </div>

  </div>
  <div class="row">
    <div class="col-md-3">
      <label for="identificacion_propietario" class="form-label">TIPO MOTOR</label>
    </div>
    <div class="col-md-3">
      <input type="text"   class="form-control" id="tipomotor" name="tipomotor" placeholder="TIPO MOTOR" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"   required>
    </div>
    <div class="col-md-3">
      <label for="identificacion_propietario" class="form-label">TIPO DE CAJA</label>
    </div>
    <div class="col-md-3">
      <input type="text"   class="form-control" id="tipocaja" name="tipocaja" placeholder="TIPO DE CAJA" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"   required>
    </div>
    

  </div>


  <div class="row">
    <div class="col-md-3">
      <label for="identificacion_propietario" class="form-label">POLARIZADO</label>
    </div>
    <div class="col-md-3">
      <input type="text"   class="form-control" id="polarizado" name="polarizado" placeholder="POLARIZADO" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"   required>
    </div>
    <div class="col-md-3">
      <label for="identificacion_propietario" class="form-label">BLINDADO</label>
    </div>
    <div class="col-md-3">
      <input type="text"   class="form-control" id="blindado" name="blindado" placeholder="BLINDADO" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"   required>
    </div>
    

  </div>
  <div class="col-md-3"> 
    <input type="hidden"   class="form-control" id="peritaje_id" name="peritaje_id"  value="{{$vehiculo->peritaje->id}}">
</div>

<div class="mb-3">
  <label for="" class="form-label">EMPRESA</label>
  <select name="empresa_id" class="form-select" id="empresa_id" required>
    @foreach($empresas as $empresa)
    <option value="{{$empresa->id}}">{{$empresa->razonsocial}}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
  <textarea class="form-control" name="observacion" id="observacion" rows="3" required value="N/A" placeholder="La observación general se diligencia al final"></textarea>
</div>
  
  <div class="row">
  <div class="col-md-3"> 
     <a href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
  </div>
  <div class="col-md-3">
     <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  </div>
</div>
 
</form>

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script src="/js/marca_lineas.js">

</script>
@endsection
@endsection

 