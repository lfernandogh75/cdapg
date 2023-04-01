@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
<div class="row">
  <div class="col-md-3">
    <label for="modelo" class="form-label">CODIGO FASECOLDA </label>
  </div>
  <div class="col-md-3">
    <label for="modelo" class="form-label">{{$cierre->codigofasecolda}}</label>
  </div>
</div>
  <div class="row">
  <div class="col-md-3">
    <label for="modelo" class="form-label">VALOR FASECOLDA</label>
  </div> 
  <div class="col-md-3">
    <label for="modelo" class="form-label">{{$cierre->valorfasecolda}}</label>
  </div>
  <div class="col-md-3">
 <label for="marca" class="form-label">VALOR ACCESORIOS</label>
  </div>
 <div class="col-md-3">
  <label for="marca" class="form-label">{{$cierre->valoraccesorios}}</label>
  </div>
    </div>
   
  
  <div class="row">

    <div class="col-md-3">
      <label for="linea" class="form-label">VALOR CARVALUE</label>
    </div>
    <div class="col-md-3">
      <label for="linea" class="form-label">{{$cierre->valorcarvalue}}</label>
    </div>
        
          
          <div class="col-md-3">
            <label for="color" class="form-label">SERVICIO SOLICITADO</label>
  </div>
          <div class="col-md-3">
            <label for="color" class="form-label">{{$cierre->serviciosolicitado}}</label>
            
              </div>
</div>
<div class="row">
  <div class="col-md-3">
    <label for="servicio" class="form-label">RESULTADO</label>
  </div>
    <div class="col-md-3">
      <label for="servicio" class="form-label">{{$cierre->resultado}}</label>
 
    </div>
    <div class="col-md-3">
      <label for="transmision" class="form-label">FECHA GNVC</label>
    </div>
      <div class="col-md-3">
        <label for="transmision" class="form-label">{{$cierre->gnvc}}</label>
      
        </div>
</div>
<div class="row">
  <div class="col-md-3">
    <label for="carroceria" class="form-label">TIPO DE PINTURA</label>
  </div>
    <div class="col-md-3">
      <label for="carroceria" class="form-label">{{$cierre->tipopintura}}</label>
          
            </div>
            <div class="col-md-3">
              <label for="combustible" class="form-label">TIPO MOTOR</label>
          </div>
     
      <div class="col-md-3">
        <label for="combustible" class="form-label">{{$cierre->tipomotor}}</label>
    
      </div>
      <div class="col-md-3">
        <label for="combustible" class="form-label">EMPRESA</label>
    </div>
      <div class="col-md-3">
        <label for="combustible" class="form-label">{{$cierre->empresa->razonsocial}}</label>
    
      </div>
</div>
 
<div class="form-group">
  <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
  <textarea  class="form-control" name="observacion" id="observacion" rows="3" readonly >{{$cierre->observacion}}</textarea>
</div>


     <a href="/vehiculos?placa={{$cierre->peritaje->vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
   

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

 