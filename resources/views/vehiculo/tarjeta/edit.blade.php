@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
<form action="{{route('tarjetas.update',$tarjeta->id)}}" method="POST">
  @csrf
  @method('PUT')
  <div class="row">
  <div class="col-md-3">
    <label for="modelo" class="form-label">MODELO</label>
  </div> 
  <div class="col-md-3">
    <input type="number"  class="form-control" id="modelo" name="modelo" value ="{{$tarjeta->modelo}}" placeholder="MODELO" required>
  </div>
  <div class="col-md-3">
 <label for="marca" class="form-label">MARCA</label>
  </div>
 <div class="col-md-3">
  <select name="select-marca" class="form-select" id="select-marca" required>
    <option value="{{$tarjeta->marca->id}}">{{$tarjeta->marca->nombre}}</option>
    @foreach($marcas as $marca)
    <option value="{{$marca->id}}">  {{$marca->nombre}} </option>
    @endforeach
  </select>
    </div>
  </div>
  
  <div class="row">

    <div class="col-md-3">
      <label for="linea" class="form-label">LÍNEA</label>
    </div>
    <div class="col-md-3">
        <select name="select-linea" class="form-select" id="select-linea" required>
      
        </select>
          </div>
          <div class="col-md-3">
            <label for="color" class="form-label">COLOR</label>
  </div>
          <div class="col-md-3">
            <select name="select-color" class="form-select" id="select-color" required>
              <option value="{{$tarjeta->color->id}}">{{$tarjeta->color->nombre}}</option>
              @foreach($colors as $color)
              <option value="{{$color->id}}">{{$color->nombre}}</option>
              @endforeach
            </select>
              </div>
</div>
<div class="row">
  <div class="col-md-3">
    <label for="servicio" class="form-label">SERVICIO</label>
  </div>
    <div class="col-md-3">
  <select name="select-servicio" class="form-select" id="select-servicio" required>
    <option value="{{$tarjeta->servicio->id}}">{{$tarjeta->servicio->nombre}}</option>
    @foreach($servicios as $servicio)
    <option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
    @endforeach
  </select>
    </div>
    <div class="col-md-3">
      <label for="transmision" class="form-label">TRANSMISIÓN</label>
    </div>
      <div class="col-md-3">
      <select name="select-transmision" class="form-select" id="select-transmision" required>
        <option value="{{$tarjeta->transmision->id}}">{{$tarjeta->transmision->nombre}}</option>
        @foreach($transmisiones as $transmision)
        <option value="{{$transmision->id}}">{{$transmision->nombre}}</option>
        @endforeach
      </select>
        </div>
</div>
<div class="row">
  <div class="col-md-3">
    <label for="carroceria" class="form-label">CARROCERÍA</label>
  </div>
    <div class="col-md-3">
          <select name="select-carroceria" class="form-select" id="select-carroceria" required>
            <option value="{{$tarjeta->carroceria->id}}">{{$tarjeta->carroceria->nombre}}</option>
            @foreach($carrocerias as $carroceria)
            <option value="{{$carroceria->id}}">{{$carroceria->nombre}}</option>
            @endforeach
          </select>
            </div>
            <div class="col-md-3">
              <label for="combustible" class="form-label">COMBUSTIBLE</label>
          </div>
     
      <div class="col-md-3">
    <select name="select-combustible" class="form-select" id="select-combustible" required>
      <option value="{{$tarjeta->combustible->id}}">{{$tarjeta->combustible->nombre}}</option>
      @foreach($combustibles as $combustible)
      <option value="{{$combustible->id}}">{{$combustible->nombre}}</option>
      @endforeach
    </select>
      </div>
</div>
<div class="row"> 
      <div class="col-md-3">
        <label for="cilindraje" class="form-label">CILINDRAJE CC</label>
      </div>
      <div class="col-md-3">
        <input type="number"  class="form-control" id="cilindrada" name="cilindrada" placeholder="CILINDRAJE" value ="{{$tarjeta->cilindrada}}" required>
        </div>
        <div class="col-md-3">
          <label for="capacidad" class="form-label">CAPACIDAD KG PSJ</label>
        </div>
        <div class="col-md-3">
          <input type="number"  class="form-control" id="capacidad" name="capacidad" placeholder="CAPACIDAD KG PSJ" value ="{{$tarjeta->capacidad}}" required>
          </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <label for="motor" class="form-label">NÚMERO DE MOTOR</label>
      </div>
      <div class="col-md-3">
        <input type="text"   class="form-control" id="motor" name="motor" placeholder="NÚMERO DE MOTOR" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"  value ="{{$tarjeta->numero_motor}}" required>
      </div>
      <div class="col-md-3">
        <label for="serie" class="form-label">NÚMERO DE SERIE</label>
      </div>
      <div class="col-md-3">
        <input type="text"   class="form-control" id="serie" name="serie" placeholder="NÚMERO DE SERIE" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"  value ="{{$tarjeta->numero_serie}}" required>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <label for="chasis" class="form-label">NÚMERO DE CHASIS</label>
      </div>
      <div class="col-md-3">
        <input type="text"   class="form-control" id="chasis" name="chasis" placeholder="NÚMERO DE CHASIS" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"  value ="{{$tarjeta->numero_chasis}}" required>
      </div>

     
      <div class="col-md-3">
        <label for="vin" class="form-label">NÚMERO DE VIN</label>
      </div>
      <div class="col-md-3">
        <input type="text"   class="form-control" id="vin" name="vin" placeholder="NÚMERO DE VIN" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"  value ="{{$tarjeta->numero_vin}}" required>
      </div>
    </div>
    <div class="row">
  {{--  <div class="col-md-3">
        <label for="kilometraje" class="form-label">KILOMETRAJE</label>
      </div>
      <div class="col-md-3">
        <input type="number"   class="form-control" id="kilometraje" name="kilometraje" placeholder="KILOMETRAJE" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"  value ="{{$tarjeta->kilometraje}}" required>
      </div>--}}
      <div class="col-md-3">
        <label for="potencia" class="form-label">POTENCIA HP</label>
      </div>
      <div class="col-md-3">
        <input type="number"   class="form-control" id="potencia" name="potencia" placeholder="POTENCIA HP" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"  value ="{{$tarjeta->potencia}}" required >
      </div>


      <div class="col-md-3">
        <label for="potencia" class="form-label">LICENCIA DE TRANSITO</label>
      </div>
      <div class="col-md-3">
        <input type="number"   class="form-control" id="licencia" name="licencia" placeholder="LICENCIA DE TRANSITO" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" value ="{{$tarjeta->licencia}}" required>
      </div>

    </div>


    <div class="row">
      <div class="col-md-3">
        <label for="propietario" class="form-label">PROPIETARIO</label>
      </div>
      <div class="col-md-3">
        <input type="text"   class="form-control" id="propietario" name="propietario" placeholder="PROPIETARIO" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"  value ="{{$tarjeta->propietario}}" required>
      </div>
      <div class="col-md-3">
        <label for="identificacion_propietario" class="form-label">IDENTIFICACION PROPIETARIO</label>
      </div>
      <div class="col-md-3">
        <input type="text"   class="form-control" id="identificacion_propietario" name="identificacion_propietario" placeholder="IDENTIFICACION" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"  value ="{{$tarjeta->identificacion_propietario}}" required>
      </div>

    </div>

    <div class="row">
      <div class="col-md-3">
        <label for="fecha_matricula" class="form-label">FECHA DE MATRICULA</label>
      </div>
      <div class="col-md-3">
     <input type="date" name="fecha_matricula" class="form-control"  value ="{{$tarjeta->fecha_matricula}}" required >
      </div>

      <div class="col-md-3">
        <label for="nacionalidad" class="form-label">NACIONALIDAD</label>
      </div>
      <div class="col-md-3">
     <input type="text" name="nacionalidad"  id="nacionalidad" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"  value ="{{$tarjeta->nacionalidad}}" required>
      </div>
    </div>


    <div class="col-md-3">
      <label for="matriculado" class="form-label">CIUDAD MATRICULA</label>
    </div>
    <div class="col-md-3">
      <input type="text" name="matriculado"  id="matriculado" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" value ="{{$tarjeta->matriculado}}" required>
    </div></div>


    
    
    
      <input type="hidden"    id="lineaid" name="lineaid"  value="{{$tarjeta->linea->id}}">
      <input type="hidden"    id="lineanombre" name="lineanombre"  value="{{$tarjeta->linea->nombre}}">



     <a href="/vehiculos?placa={{$tarjeta->peritaje->vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</div>
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

 