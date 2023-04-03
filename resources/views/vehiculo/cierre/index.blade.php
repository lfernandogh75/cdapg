@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')

<table>
  <tr> 
   @if(isset($cierre->peritaje->vehiculo->peritaje->bajacontrol))
   <th>PARTES BAJAS</th>
   <td>{{$cierre->peritaje->vehiculo->peritaje->bajacontrol->nivelaprobado}}%</td>
   @endif
   @if(isset($cierre->peritaje->vehiculo->peritaje->exteriorcontrol))
   <th>REVISION DE EXTERIORES</th>
   <td>{{$cierre->peritaje->vehiculo->peritaje->exteriorcontrol->nivelaprobado}}%</td>
   @endif
   @if(isset($cierre->peritaje->vehiculo->peritaje->estructuracontrol))
   <th>REVISION ESTRUCTURA</th>
   <td>{{$cierre->peritaje->vehiculo->peritaje->estructuracontrol->nivelaprobado}}%</td>
   @endif
  </tr>
  <tr> 
    @if(isset($cierre->peritaje->vehiculo->peritaje->latoneriacontrol))
    <th>LATONERIA O CARROCERIA</th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->latoneriacontrol->nivelaprobado}}%</td>
    @endif
    @if(isset($cierre->peritaje->vehiculo->peritaje->pinturacontrol))
    <th>PINTURA </th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->pinturacontrol->nivelaprobado}}%</td>
    @endif
    @if(isset($cierre->peritaje->vehiculo->peritaje->vidriocontrol))
    <th>REVISION DE VIDRIOS</th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->vidriocontrol->nivelaprobado}}%</td>
    @endif
   </tr>
   <tr> 
    @if(isset($cierre->peritaje->vehiculo->peritaje->interiorcontrol))
    <th>REVISION INTERIOR</th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->interiorcontrol->nivelaprobado}}%</td>
    @endif
    @if(isset($cierre->peritaje->vehiculo->peritaje->fluidocontrol))
    <th>FUGAS DE FLUIDOS </th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->fluidocontrol->nivelaprobado}}%</td>
    @endif
    @if(isset($cierre->peritaje->vehiculo->peritaje->nfluidocontrol))
    <th>NIVELES DE FLUIDOS</th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->nfluidocontrol->nivelaprobado}}%</td>
    @endif
   </tr>
   <tr> 
    @if(isset($cierre->peritaje->vehiculo->peritaje->chasiscontrol))
    <th>CHASIS</th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->chasiscontrol->nivelaprobado}}%</td>
    @endif
    @if(isset($cierre->peritaje->vehiculo->peritaje->suspensioncontrol))
    <th>ESTADO DE LA SUSPENSION</th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->suspensioncontrol->nivelaprobado}}%</td>
    @endif
    @if(isset($cierre->peritaje->vehiculo->peritaje->motorcontrol))
    <th>PARTES DEL MOTOR</th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->motorcontrol->nivelaprobado}}%</td>
    @endif
   </tr>
   <tr> 
    @if(isset($cierre->peritaje->vehiculo->peritaje->vlucescontrol))
    <th>LUCES</th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->vlucescontrol->nivelaprobado}}%</td>
    @endif
    @if(isset($cierre->peritaje->vehiculo->peritaje->electricocontrol))
    <th>EQUIPOS ELECTRICOS</th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->electricocontrol->nivelaprobado}}%</td>
    @endif
    @if(isset($cierre->peritaje->vehiculo->peritaje->compresioncontrol))
    <th>COMPRESION Y FUGAS DEL MOTOR</th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->compresioncontrol->nivelaprobado}}%</td>
    @endif
   </tr>
   <tr> 
    @if(isset($cierre->peritaje->vehiculo->peritaje->simetria))
    <th>SIMETRIA</th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->simetria->nivelaprobado}}%</td>
    @endif
    @if(isset($cierre->peritaje->vehiculo->peritaje->frenocontrol))
    <th>PRUEBA DE FRENOS</th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->frenocontrol->nivelaprobado}}%</td>
    @endif
    @if(isset($cierre->peritaje->vehiculo->peritaje->llantacontrol))
    <th>LLANTAS</th>
    <td>{{$cierre->peritaje->vehiculo->peritaje->llantacontrol->nivelaprobado}}%</td>
    @endif
    
   </tr>
</table>
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

 