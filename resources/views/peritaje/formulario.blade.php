@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
@endsection



@section('contenido')
<div class="row g-3">
  <div class="col-md-4">
    <div class="card" style="width: 18rem;">
      <img src="/imagen/plantillas/moto.jpg" class="card-img-top" alt="..." style="height: 100px; width: 120px;">
      <div class="card-body">
        <a href="" class="btn btn-primary">Peritaje Motocicleta</a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card" style="width: 18rem;">
      <img src="/imagen/plantillas/carro.jpeg" class="card-img-top" alt="..." style="height: 100px; width: 120px;">
      <div class="card-body">
       
        <a href="#" class="btn btn-primary">Peritaje Vehículo</a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card" style="width: 18rem;">
      <img src="/imagen/plantillas/cabezote.jpg" class="card-img-top" alt="..." style="height: 100px; width: 120px;">
      <div class="card-body">
        
        <a href="#" class="btn btn-primary">Peritaje Cabezote</a>
      </div>
    </div>
  </div>
</div>
     
     
   
<form>
    <select class="form-select" aria-label="Default select example">
      <option value="1">Básico</option>
      <option value="2">Completo</option>
    </select>
    <div class="row g-3">
      <div class="col-auto">
        <label for="placa" class="form-label">PLACA</label>
        <input type="text"  class="form-control" id="placa" name="placa" placeholder="PLACA">
      </div>
      <div class="col-auto">
        <label for="marca" class="form-label">MARCA</label>
        <input type="text"  class="form-control" id="marca" name="marca" placeholder="MARCA">
      </div>
      <div class="col-auto">
        <label for="linea" class="form-label">LÍNEA</label>
        <input type="text"  class="form-control" id="linea" name="linea" placeholder="LÍNEA">
      </div>
      <div class="col-auto">
        <label for="modelo" class="form-label">MODELO</label>
        <input type="number"  class="form-control" id="modelo" name="modelo" placeholder="MODELO">
      </div>
    </div>
  
  
    <div class="row g-3">
      <div class="col-auto">
        <label for="cilindrada" class="form-label">CILINDRAJE CC</label>
        <input type="number"  class="form-control" id="cilindrada" name="cilindrada" placeholder="CILINDRAJE CC">
      </div>
      <div class="col-auto">
        <label for="color" class="form-label">COLOR</label>
        <input type="text"  class="form-control" id="color" name="color" placeholder="COLOR">
      </div>
      <div class="col-auto">
        <label for="servicio" class="form-label">SERVICIO</label>
        <input type="text"  class="form-control" id="servicio" name="servicio" placeholder="SERVICIO">
      </div>
      <div class="col-auto">
        <label for="clase_vehiculo" class="form-label">CLASE DE VEHÍCULO</label>
        <input type="text"  class="form-control" id="clase_vehiculo" name="clase_vehiculo" placeholder="CLASE DE VEHÍCULO">
      </div>
    </div>
  
    <div class="row g-3">
      <div class="col-auto">
        <label for="tipo_carroceria" class="form-label">TIPO DE CARROCERIA</label>
        <input type="text"  class="form-control" id="tipo_carroceria" name="tipo_carroceria" placeholder="TIPO DE CARROCERIA">
      </div>
      <div class="col-auto">
        <label for="combustible" class="form-label">COMBUSTIBLE</label>
        <input type="text"  class="form-control" id="combustible" name="combustible" placeholder="COMBUSTIBLE">
      </div>
      <div class="col-auto">
        <label for="capacidad" class="form-label">CAPACIDAD KG PSJ</label>
        <input type="number"  class="form-control" id="capacidad" name="capacidad" placeholder="CAPACIDAD KG PSJ">
      </div>
      <div class="col-auto">
        <label for="numero_motor" class="form-label">NÚMERO DE MOTOR</label>
        <input type="text"  class="form-control" id="numero_motor" name="numero_motor" placeholder="NÚMERO DE MOTOR">
      </div>
    </div>
  
    <div class="row g-3">
      <div class="col-auto">
        <label for="numero_vin" class="form-label">NÚMERO VIN</label>
        <input type="text"  class="form-control" id="numero_vin" name="numero_vin" placeholder="NÚMERO VIN">
      </div>
      <div class="col-auto">
        <label for="numero_serie" class="form-label">NÚMERO DE SERIE</label>
        <input type="text"  class="form-control" id="numero_serie" name="numero_serie" placeholder="NÚMERO DE SERIE">
      </div>
      <div class="col-auto">
        <label for="numero_chasis" class="form-label">NÚMERO DE CHASIS</label>
        <input type="text"  class="form-control" id="numero_chasis" name="numero_chasis" placeholder="NÚMERO DE CHASIS">
      </div>
      <div class="col-auto">
        <label for="potencia" class="form-label">POTENCIA HP</label>
        <input type="number"  class="form-control" id="potencia" name="potencia" placeholder="POTENCIA HP">
      </div>
    </div>
  
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary"><span class="fas fa-walking fa-fw"></span>Submit</button>
      <div   style="height: 100px; width: 120px; wh: 100px; background-color: rgba(255,0,0,0.1);">
        <span class="fas fa-walking fa-fw"></span>
      </div>
  
      
    </form>

   

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

@endsection


@endsection