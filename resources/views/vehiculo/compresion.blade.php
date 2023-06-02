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
 COMPRESION DEL VEHICULO : {{$vehiculo->placa}} <br/>
  @endif
  @if(isset($responsable))  
  


<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
{{--
@if(isset($vehiculo) && Auth::user()->id==$responsable->id)
  
         <a href="{{ URL::to('/') }}/scompresions/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR PIEZA</a>
       
     @endif--}}
     @if(isset($vehiculo) && $compresioncontrol->activo)
  
         <a href="{{ URL::to('/') }}/scompresions/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR PIEZA</a>
       
       
         <form action="{{ route('compresioncontrol.update','compresion')}}" method="POST" class="formdesactivar">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
            <textarea class="form-control" name="observacion" id="observacion" rows="3" required value="{{$compresioncontrol->observacion}}" placeholder="La observación general se diligencia al final de registrar todas las piezas y se almacena al finalizar la inspección del compresion ">{{$compresioncontrol->observacion}}</textarea>
          </div>
          <div class="form-group">
            <label for="" class="form-label">NIVEL DE APROBACIÓN</label>
            <input id="nivelaprobado" name="nivelaprobado" type="number"  placeholder="0% a 100%" step="0" min="0" max="100"   class="form-control" tabindex="3" required value="{{$compresioncontrol->nivelaprobado}}">
          </div>
          <input type="hidden" name="peritajeid" value="{{$vehiculo->peritaje->id}}">

          @method('PUT')
         <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">FINALIZAR REGISTRO</button>
        
          </form>
     @endif

     @if(isset($compresioncontrol->activo))
     @if($compresioncontrol->activo==0)
     <div class="form-group">
       <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
       <textarea class="form-control" name="observacion" id="observacion" rows="3" required value="{{$compresioncontrol->observacion}}" placeholder="La observación general se diligencia al final de registrar todas las piezas y se almacena al finalizar la inspección del compresion " readonly>{{$compresioncontrol->observacion}}</textarea>
     </div>
     <div class="form-group">
       <label for="" class="form-label">NIVEL DE APROBACIÓN</label>
       <input id="nivelaprobado" name="nivelaprobado" type="number"  placeholder="0% a 100%" step="0" min="0" max="100"   class="form-control" tabindex="3" value="{{$compresioncontrol->nivelaprobado}}" required readonly>
     </div>
     @endif
  @endif
  <table id="compresions" class="table table-dark table-striped mt-4">
  <thead>
    <tr>
   {{--   <th scope="col">ID</th>--}}
      <th scope="col">PIEZA</th>
      <th scope="col">COMPRESION EN PSI</th>
      <th scope="col">PORCENTAJE DE FUGA</th>
      <th scope="col">PERITO</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>   
    @if(isset($compresions))  
    @foreach ($compresions as $compresion)
    <tr>
     {{--   <td>{{$compresion->id}}</td>--}}
        <td>{{$compresion->compresionpart->name}}</td>
        <td>{{$compresion->compresion}}</td>
        <td>{{$compresion->fuga}}</td>
        <td>{{$compresion->perito}}</td>
         
        <td>
          @if($compresioncontrol->activo) 
        <form action="{{ route('scompresions.destroy',$compresion->id) }}" method="POST">
          <a href="/scompresions/{{$compresion->id}}/edit" class="btn btn-info">Editar</a>         
              @csrf
              @method('DELETE')
              @if(Auth::user()->role->nombre_rol=="superadmin")
              <button type="submit" class="btn btn-danger">Delete</button>
         @endif
            </form>  
          
         @endif
                   
        </td>        
    </tr>
    @endforeach
    {{--$pfuga--}}
    {{'PROMEDIO DE FUGAS '.round($compresions->avg('fuga'),1).'% PROMEDIO DE COMPRESION '.round($compresions->avg('compresion'),2).'PSI'}}
    @endif
    @else

@if(isset($vehiculo))
        <p>
         <a href="{{ URL::to('/') }}/scompresions/create?id={{$vehiculo->peritaje_id}}" class="btn btn-primary"  >AGREGAR RESULTADOS DE COMPRESION Y FUGAS DE MOTOR</a>
       
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
  $('#compresions').DataTable();
});
</script>
<script src="/js/marca_lineas.js">

</script>
@endsection
@endsection

 