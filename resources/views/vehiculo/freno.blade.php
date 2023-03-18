@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
 {{--
<form action="vehiculos" method="GET">
   
  <div class="row">
    
   
    <div class="col-md-3">
    <label for="placa" class="form-label">PLACA</label>
    </div>
    <div class="col-md-3"> 
    <input type="text"   class="form-control"  name="placa" placeholder="PLACA" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
  </div>
  </div>
 
  <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=1" type="button" class="btn btn-primary" tabindex="4">REGRESAR </a>
  <button type="submit" class="btn btn-primary" tabindex="4">buscar</button>
</form>
--}}
@if(isset($vehiculo)) 
 PRUENBA DE FRENADO DEL VEHICULO : {{$vehiculo->placa}} <br/>
  @endif
  @if(isset($responsable))  
  PERITO PRUEBA DE FRENADO : {{$responsable->name}} <br/>


<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
@if(isset($vehiculo) && Auth::user()->id==$responsable->id && $frenocontrol->activo)
  
         <a href="{{ URL::to('/') }}/sfrenos/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR PIEZA</a>
       
       
         <form action="{{ route('frenocontrol.update','freno')}}" method="POST" class="formdesactivar">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
            <textarea class="form-control" name="observacion" id="observacion" rows="3" required value="{{$frenocontrol->observacion}}" placeholder="La observación general se diligencia al final de registrar todas las piezas y se almacena al finalizar la inspección del freno ">{{$frenocontrol->observacion}}</textarea>
          </div>
          <div class="form-group">
            <label for="" class="form-label">NIVEL DE APROBACIÓN</label>
            <input id="nivelaprobado" name="nivelaprobado" type="number"  placeholder="0% a 100%" step="0" min="0" max="100"   class="form-control" tabindex="3" required value="{{$frenocontrol->nivelaprobado}}">
          </div>
          <input type="hidden" name="peritajeid" value="{{$vehiculo->peritaje->id}}">

          @method('PUT')
         <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">FINALIZAR REGISTRO DE EXTERIORES</button>
        
          </form>
     @endif

     @if(isset($frenocontrol->activo))
     @if($frenocontrol->activo==0)
     <div class="form-group">
       <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
       <textarea class="form-control" name="observacion" id="observacion" rows="3" required value="{{$frenocontrol->observacion}}" placeholder="La observación general se diligencia al final de registrar todas las piezas y se almacena al finalizar la inspección del freno " readonly>{{$frenocontrol->observacion}}</textarea>
     </div>
     <div class="form-group">
       <label for="" class="form-label">NIVEL DE APROBACIÓN</label>
       <input id="nivelaprobado" name="nivelaprobado" type="number"  placeholder="0% a 100%" step="0" min="0" max="100"   class="form-control" tabindex="3" value="{{$frenocontrol->nivelaprobado}}" required readonly>
     </div>
     @endif
  @endif
 
  <table id="frenos" class="table table-dark table-striped mt-4">
  <thead>
    <tr>
    {{--  <th scope="col">ID</th>--}}
      <th scope="col">PIEZA</th>
      <th scope="col">EFICIENCIA TOTAL</th>
      <th scope="col">MINIMO</th>
      <th scope="col">FUERZA</th>
      <th scope="col">PESO</th>
      <th scope="col">UNIDAD</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>   
    @if(isset($frenos))  
    @foreach ($frenos as $freno)
    <tr>
        {{--<td>{{$freno->id}}</td>--}}
        <td>{{$freno->frenopart->name}}</td>
        <td>{{$freno->eficiencia}}</td>
        <td>{{$freno->minimo}}%</td>
        <td>{{$freno->fuerza}}</td>
        <td>{{$freno->peso}}</td>
        <td>{{$freno->unidad}}</td>
         
        <td>
          @if(Auth::user()->id==$responsable->id && $frenocontrol->activo) 
        <form action="{{ route('sfrenos.destroy',$freno->id) }}" method="POST">
          <a href="/sfrenos/{{$freno->id}}/edit" class="btn btn-info">Editar</a>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
         </form>  
          
         @endif
                   
        </td>        
    </tr>
    @endforeach
    
    @endif
    @else

@if(isset($vehiculo))
        <p>
         <a href="{{ URL::to('/') }}/sfrenos/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR RESULTADOS PRUEBA DE FRENADO Y SER RESPONSABLE </a>
       
     @endif


    @endif
  </tbody>
</table>
<a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=1" type="button" class="btn btn-primary" tabindex="4">REGRESAR </a>
<!-- xxxxxxxxxxxxxxxxxxxxx -->


@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function () {
  $('#frenos').DataTable();
});
</script>
<script src="/js/marca_lineas.js">

</script>
@endsection
@endsection

 