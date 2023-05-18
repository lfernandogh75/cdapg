@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
<form action="{{route('hvehiculos.update',$cierre->id)}}" method="POST">
  @csrf
  
  @method('PUT')
    <div class="row">
      <div class="col-md-3">
        <label for="rtm" class="form-label">RTM Y EC VIGENTE</label>
      </div>
      <div class="col-md-3">
       
    
        <select name="rtm" class="form-select" id="rtm" required>
            <option value="{{$cierre->rtm}}">{{$cierre->rtm}}</option>
            <option value="NO">NO</option>
            <option value="SI">SI</option>
          </select> 
    
    
    </div>
      <div class="col-md-3">
        <label for="fechartmvigente" class="form-label">FECHA DE VIGENCIA</label>
      </div>
      <div class="col-md-3">
        <input type="date"   class="form-control" id="fechartmvigente" name="fechartmvigente"   value ="{{$cierre->fechartmvigente}}" required>
      </div>

    </div>

    <div class="row">
       
        <div class="col-md-3">
            <label for="soat" class="form-label">SOAT VIGENTE</label>
          </div>
          <div class="col-md-3">
            <select name="soat" class="form-select" id="soat" required>
                <option value="{{$cierre->soat}}">{{$cierre->soat}}</option>
                <option value="NO">NO</option>
                <option value="SI">SI</option>
              </select> 
          </div>
          <div class="col-md-3">
            <label for="fechasoatvigente" class="form-label">FECHA DE VIGENCIA</label>
          </div>
          <div class="col-md-3">
            <input type="date"   class="form-control" id="fechasoatvigente" name="fechasoatvigente"   value ="{{$cierre->fechasoatvigente}}" required>
          </div>

    </div>

    
    
    
   
     

    
    
    <div class="form-group">
        <label for="exampleFormControlTextarea1">EMBARGOS</label>
        <textarea  class="form-control" name="embargo" id="embargo" rows="3" required value="{{$cierre->embargo}}" placeholder=" diligencia los embargos en caso contratio digite no aplica">{{$cierre->embargo}}</textarea>
      </div>
    
    <div class="form-group">
      <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
      <textarea  class="form-control" name="observacionhv" id="observacionhv" rows="3" required value="{{$cierre->observacionhv}}" placeholder="observación historico vehiculo">{{$cierre->observacionhv}}</textarea>
    </div>
    
    
       



     <a href="/vehiculos?placa={{$cierre->peritaje->vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script>
  $("#valorcarvalue").keyup(function() {
 this.value = parseInt(this.value.replace(/,/g, ""))
                  .toString()
                   .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                 });
 $("#valorfasecolda").keyup(function() {
 this.value = parseInt(this.value.replace(/,/g, ""))
                  .toString()
                   .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                 });
 $("#valoraccesorios").keyup(function() {
 this.value = parseInt(this.value.replace(/,/g, ""))
                  .toString()
                   .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                 });
 
 
 
 </script>



@endsection
@endsection