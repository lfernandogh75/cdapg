@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
<div class="row">
  <div class="col-md-3">
    <label for="modelo" class="form-label">ENCARGADO </label>
  </div>
  <div class="col-md-3">
    <label for="modelo" class="form-label">{{$tarjeta->user->name}}</label>
  </div>
</div>
  <div class="row">
  <div class="col-md-3">
    <label for="modelo" class="form-label">MODELO</label>
  </div> 
  <div class="col-md-3">
    <label for="modelo" class="form-label">{{$tarjeta->modelo}}</label>
  </div>
  <div class="col-md-3">
 <label for="marca" class="form-label">MARCA</label>
  </div>
 <div class="col-md-3">
  <label for="marca" class="form-label">{{$tarjeta->marca->nombre}}</label>
  </div>
    </div>
   
  
  <div class="row">

    <div class="col-md-3">
      <label for="linea" class="form-label">LÍNEA</label>
    </div>
    <div class="col-md-3">
      <label for="linea" class="form-label">{{$tarjeta->linea->nombre}}</label>
    </div>
        
          
          <div class="col-md-3">
            <label for="color" class="form-label">COLOR</label>
  </div>
          <div class="col-md-3">
            <label for="color" class="form-label">{{$tarjeta->color->nombre}}</label>
            
              </div>
</div>
<div class="row">
  <div class="col-md-3">
    <label for="servicio" class="form-label">SERVICIO</label>
  </div>
    <div class="col-md-3">
      <label for="servicio" class="form-label">{{$tarjeta->servicio->nombre}}</label>
 
    </div>
    <div class="col-md-3">
      <label for="transmision" class="form-label">TRANSMISIÓN</label>
    </div>
      <div class="col-md-3">
        <label for="transmision" class="form-label">{{$tarjeta->transmision->nombre}}</label>
      
        </div>
</div>
<div class="row">
  <div class="col-md-3">
    <label for="carroceria" class="form-label">CARROCERÍA</label>
  </div>
    <div class="col-md-3">
      <label for="carroceria" class="form-label">{{$tarjeta->carroceria->nombre}}</label>
          
            </div>
            <div class="col-md-3">
              <label for="combustible" class="form-label">COMBUSTIBLE</label>
          </div>
     
      <div class="col-md-3">
        <label for="combustible" class="form-label">{{$tarjeta->combustible->nombre}}</label>
    
      </div>
</div>
<div class="row"> 
      <div class="col-md-3">
        <label for="cilindraje" class="form-label">CILINDRAJE CC</label>
      </div>
      <div class="col-md-3">
        <label for="cilindraje" class="form-label">{{$tarjeta->cilindrada}}</label>

        
        </div>
        <div class="col-md-3">
          <label for="capacidad" class="form-label">CAPACIDAD KG PSJ</label>
        </div>
        <div class="col-md-3">
          <label for="capacidad" class="form-label">{{$tarjeta->capacidad}}</label>
        
          </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <label for="motor" class="form-label">NÚMERO DE MOTOR</label>
      </div>
      <div class="col-md-3">
        <label for="motor" class="form-label">{{$tarjeta->numero_motor}}</label>
        
      </div>
      <div class="col-md-3">
        <label for="serie" class="form-label">NÚMERO DE SERIE</label>
      </div>
      <div class="col-md-3">
        <label for="serie" class="form-label">{{$tarjeta->numero_serie}}</label>
 
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <label for="chasis" class="form-label">NÚMERO DE CHASIS</label>
      </div>
      <div class="col-md-3">
        <label for="chasis" class="form-label">{{$tarjeta->numero_chasis}}</label>
   
      </div>

     
      <div class="col-md-3">
        <label for="vin" class="form-label">NÚMERO DE VIN</label>
      </div>
      <div class="col-md-3">
        <label for="vin" class="form-label">{{$tarjeta->numero_vin}}</label>
         
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <label for="potencia" class="form-label">POTENCIA HP</label>
      </div>
      <div class="col-md-3">
        <label for="potencia" class="form-label">{{$tarjeta->potencia}}</label>
       
      </div>
      <div class="col-md-3">
        <label for="potencia" class="form-label">LICENCIA DE TRANSITO</label>
      </div>
      <div class="col-md-3">
        <label for="potencia" class="form-label">{{$tarjeta->licencia}}</label>
       
      </div>

    </div>


    <div class="row">
      <div class="col-md-3">
        <label for="propietario" class="form-label">PROPIETARIO</label>
      </div>
      <div class="col-md-3">
        <label for="propietario" class="form-label">{{$tarjeta->propietario}}</label>
     
      </div>
      <div class="col-md-3">
        <label for="identificacion_propietario" class="form-label">IDENTIFICACION PROPIETARIO</label>
      </div>
      <div class="col-md-3">
        <label for="identificacion_propietario" class="form-label">{{$tarjeta->identificacion_propietario}}</label>
 
      </div>

    </div>

    <div class="row">
      <div class="col-md-3">
        <label for="fecha_matricula" class="form-label">FECHA DE MATRICULA</label>
      </div>
      <div class="col-md-3">
     <input type="date" name="fecha_matricula" class="form-control"  value ="{{$tarjeta->fecha_matricula}}" readonly >
      </div>

      <div class="col-md-3">
        <label for="nacionalidad" class="form-label">NACIONALIDAD</label>
      </div>
      <div class="col-md-3">
        <label for="nacionalidad" class="form-label">{{$tarjeta->nacionalidad}}</label>
   
      </div>
    </div>

    <div class="col-md-3">
      <label for="matriculado" class="form-label">CIUDAD MATRICULA</label>
    </div>
    <div class="col-md-3">
      <label for="matriculado" class="form-label">{{$tarjeta->matriculado}}</label>
    </div></div>
 
    
    
      <input type="hidden"    id="lineaid" name="lineaid"  value="{{$tarjeta->linea->id}}">
      <input type="hidden"    id="lineanombre" name="lineanombre"  value="{{$tarjeta->linea->nombre}}">



     <a href="/vehiculos?placa={{$tarjeta->peritaje->vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
   
    </div>
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

 