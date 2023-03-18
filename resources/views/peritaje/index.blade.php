@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
@endsection



@section('contenido')
<div class="m-0 row justify-content-center">
<div class="row g-3">
  <div class="col-md-4">
    <div class="card" style="width: 18rem;">
      <img src="/imagen/plantillas/moto.jpg" class="card-img-top" alt="..." style="height: 100px; width: 120px;">
      <div class="card-body">
        <a href="/cvehiculo/" class="btn btn-primary">Nuevo Peritaje</a>
      </div>    
    </div>
  </div> 
</div>
</div>
     
     
<div class="m-0 row justify-content-center">
  <div class="row g-3">
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <img src="/imagen/plantillas/carro.jpeg" class="card-img-top" alt="..." style="height: 100px; width: 120px;">
        <div class="card-body">
          <a href="/vehiculos/" class="btn btn-primary">Consultar Peritaje</a>
        </div>    
      </div>
    </div> 
  </div>
  </div>
         
 

   

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

@endsection


@endsection