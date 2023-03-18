@extends('layouts.plantillaperitaje')
@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')

@if(!isset($vehiculo))

<form action="vehiculos" method="GET">
   
  <div class="row">
    
   
    <div class="col-md-3">
    <label for="placa" class="form-label">PLACA</label>
    </div>
    <div class="col-md-3"> 
    <input type="text"   class="form-control" id="placa"  name="placa" placeholder="PLACA" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
  </div>
  <div class="col-md-3"> 
    <input type="hidden"   class="form-control"  name="vehiculoindex" value="1"   >
  </div>
  </div>
 
     <a href="/peritaje" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">buscar</button>
</form>

@if(isset($mensaje))
<p class="btn btn-danger">  {{$mensaje}} </p>
@endif

@endif
@if(isset($vehiculo))



 
  <p>PLACA: {{$vehiculo->placa}}  VEHICULO: {{$vehiculo->clase_vehiculo}}</p>
  <p>TIPO DEL PERITAJE: {{$vehiculo->peritaje->tipo}}</p>
  <p>FECHA DEL PERITAJE: {{$vehiculo->peritaje->created_at}}</p>
  <div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
         INFORMACIÓN DEL VEHICULO
        </button>
      </h2>
      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          @if(isset($vehiculo->peritaje))
          @if( $vehiculo->activo) 
          <p>   <a style="color:hsl(20, 80%, 50%);" href="/vehiculos/{{$vehiculo->id}}/edit"  tabindex="4">PERITAJE </a>
            @else 
            <p>   <a style="color:rgb(49, 230, 25);" href="/consulta/{{$vehiculo->id}}/"  tabindex="4">PERITAJE </a>
          @endif
        
       @endif

      @if(isset($vehiculo->peritaje->tarjeta))
      @if(Auth::user()->id==$vehiculo->peritaje->tarjeta->user->id && $vehiculo->peritaje->tarjeta->activo) 
      <p>   <a style="color:hsl(20, 80%, 50%);" href="/tarjetas/{{$vehiculo->peritaje->tarjeta->id}}/edit"  tabindex="4">TARJETA </a>
        @else 
        <p>   <a style="color:rgb(49, 230, 25);" href="/tarjetas/{{$vehiculo->peritaje->tarjeta->id}}"  tabindex="4"> TARJETA </a>
      @endif
    @else
    <p>  <a  href="/ctarjeta?placa={{$vehiculo->placa}}"  tabindex="4">TARJETA </a>  <p>
   @endif

  

   @if(isset($vehiculo->peritaje->fotocontrol))
   @if($vehiculo->peritaje->fotocontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=11"  tabindex="4">REGISTRO FOTOGRAFICO</a>
     @else
     <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=11"  tabindex="4">REGISTRO FOTOGRAFICO</a>
@endif
       @else
 <p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=11"  tabindex="4">REGISTRO FOTOGRAFICO</a>
@endif
<p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=12"  tabindex="4" target="_blank" rel="noopener">INFORME DEL  PERITAJE</a>
            </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
          REVISIÓN VISUAL 1
        </button>
      </h2>
      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">

          @if(isset($vehiculo->peritaje->exteriorcontrol))
          @if($vehiculo->peritaje->exteriorcontrol->activo)
       <p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=4"  tabindex="4">EXTERIORES</a>
            @else
            <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=4"  tabindex="4">EXTERIORES</a>
       @endif
              @else
        <p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=4"  tabindex="4">EXTERIORES</a>
       @endif


       @if(isset($vehiculo->peritaje->motorcontrol))
       @if($vehiculo->peritaje->motorcontrol->activo)
    <p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=3"  tabindex="4">ACCESORIOS MOTOR</a>
         @else
         <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=3"  tabindex="4">ACCESORIOS MOTOR</a>
    @endif
           @else
     <p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=3"  tabindex="4">ACCESORIOS MOTOR</a>
    @endif

    @if(isset($vehiculo->peritaje->fluidocontrol))
       @if($vehiculo->peritaje->fluidocontrol->activo)
    <p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=5"  tabindex="4">FUGAS DE FLUIDOS</a>
         @else
         <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=5"  tabindex="4">FUGAS DE FLUIDOS</a>
    @endif
           @else
     <p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=5"  tabindex="4">FUGAS DE FLUIDOS</a>
    @endif

    @if(isset($vehiculo->peritaje->llantacontrol))
    @if($vehiculo->peritaje->llantacontrol->activo)
 <p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=6"  tabindex="4">LLANTAS</a>
      @else
      <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=6"  tabindex="4">LLANTAS</a>
 @endif
        @else
  <p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=6"  tabindex="4">LLANTAS</a>
 @endif

 @if(isset($vehiculo->peritaje->electricocontrol))
 @if($vehiculo->peritaje->electricocontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=2"  tabindex="4">EQUIPO ELECTRICO</a>
   @else
   <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=2"  tabindex="4">EQUIPO ELECTRICO</a>
@endif
     @else
<p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=2"  tabindex="4">EQUIPO ELECTRICO</a>
@endif

@if(isset($vehiculo->peritaje->suspensioncontrol))
 @if($vehiculo->peritaje->suspensioncontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=7"  tabindex="4">SUSPENSION</a>
   @else
   <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=7"  tabindex="4">SUSPENSION</a>
@endif
     @else
<p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=7"  tabindex="4">SUSPENSION</a>
@endif


@if(isset($vehiculo->peritaje->vidriocontrol))
@if($vehiculo->peritaje->vidriocontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=vidrio"  tabindex="4">VIDRIO</a>
  @else
  <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=vidrio"  tabindex="4">VIDRIO</a>
@endif
    @else
<p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=vidrio"  tabindex="4">VIDRIO</a>
@endif
       
@if(isset($vehiculo->peritaje->vlucescontrol))
@if($vehiculo->peritaje->vlucescontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=vluces"  tabindex="4">LUCES</a>
  @else
  <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=vluces"  tabindex="4">LUCES</a>
@endif
    @else
<p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=vluces"  tabindex="4">LUCES</a>
@endif
     
                  </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseTwo">
          REVISIÓN VISUAL 2
        </button>
      </h2>
      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          
@if(isset($vehiculo->peritaje->chasiscontrol))
@if($vehiculo->peritaje->chasiscontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=chasis"  tabindex="4">CHASIS</a>
  @else
  <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=chasis"  tabindex="4">CHASIS</a>
@endif
    @else
<p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=chasis"  tabindex="4">CHASIS</a>
@endif

@if(isset($vehiculo->peritaje->estructuracontrol))
@if($vehiculo->peritaje->estructuracontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=estructura"  tabindex="4">ESTRUCTURA</a>
  @else
  <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=estructura"  tabindex="4">ESTRUCTURA</a>
@endif
    @else
<p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=estructura"  tabindex="4">ESTRUCTURA</a>
@endif

@if(isset($vehiculo->peritaje->interiorcontrol))
@if($vehiculo->peritaje->interiorcontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=interior"  tabindex="4">INTERIOR</a>
  @else
  <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=interior"  tabindex="4">INTERIOR</a>
@endif
    @else
<p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=interior"  tabindex="4">INTERIOR</a>
@endif

@if(isset($vehiculo->peritaje->latoneriacontrol))
@if($vehiculo->peritaje->latoneriacontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=latoneria"  tabindex="4">LATONERIA O CARROCERIA</a>
  @else
  <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=latoneria"  tabindex="4">LATONERIA O CARROCERIA</a>
@endif
    @else
<p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=latoneria"  tabindex="4">LATONERIA O CARROCERIA</a>
@endif

@if(isset($vehiculo->peritaje->pinturacontrol))
@if($vehiculo->peritaje->pinturacontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=pintura"  tabindex="4">PINTURA</a>
  @else
  <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=pintura"  tabindex="4">PINTURA</a>
@endif
    @else
<p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=pintura"  tabindex="4">PINTURA</a>
@endif



@if(isset($vehiculo->peritaje->nfluidocontrol))
@if($vehiculo->peritaje->nfluidocontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=nfluido"  tabindex="4">NIVEL DE FLUIDOS</a>
  @else
  <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=nfluido"  tabindex="4">NIVEL DE FLUIDOS</a>
@endif
    @else
<p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=nfluido"  tabindex="4">NIVEL DE FLUIDOS</a>
@endif



@if(isset($vehiculo->peritaje->bajacontrol))
@if($vehiculo->peritaje->bajacontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=baja"  tabindex="4">PARTE BAJA</a>
  @else
  <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=baja"  tabindex="4">PARTE BAJA</a>
@endif
    @else
<p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=baja"  tabindex="4">PARTE BAJA</a>
@endif    
        </div>
      </div>
    </div>



    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
          RESULTADOS Y PRUEBAS 
        </button>
      </h2>
      <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">

          @if(isset($vehiculo->peritaje->compresioncontrol))
          @if($vehiculo->peritaje->compresioncontrol->activo)
          <p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=8"  tabindex="4">COMPRESION Y FUGAS DEL MOTOR</a>
            @else
            <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=8"  tabindex="4">COMPRESION Y FUGAS DEL MOTOR</a>
          @endif
              @else
          <p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=8"  tabindex="4">COMPRESION Y FUGAS DEL MOTOR</a>
          @endif


          @if(isset($vehiculo->peritaje->luzcontrol))
          @if($vehiculo->peritaje->luzcontrol->activo)
          <p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=9"  tabindex="4">REVISION DE LUCES</a>
            @else
            <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=9"  tabindex="4">REVISION DE LUCES</a>
          @endif
              @else
          <p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=9"  tabindex="4">REVISION DE LUCES</a>
          @endif

          @if(isset($vehiculo->peritaje->frenocontrol))
          @if($vehiculo->peritaje->frenocontrol->activo)
          <p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=10"  tabindex="4">PRUEBA DE FRENADO</a>
            @else
            <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=10"  tabindex="4">PRUEBA DE FRENADO</a>
          @endif
              @else
          <p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=10"  tabindex="4">PRUEBA DE FRENADO</a>
          @endif



           
       
            
               
                @if(isset($vehiculo->peritaje->emisiongas))
                @if(Auth::user()->id==$vehiculo->peritaje->emisiongas->user->id && $vehiculo->peritaje->emisiongas->activo) 
                <p>    <a style="color:hsl(20, 80%, 50%);" href="/emisiongass/{{$vehiculo->peritaje->emisiongas->id}}/edit"  tabindex="4">EMISION DE GASES </a>  <p>
                  
               
                  @else 
                  <p>    <a style="color:rgb(49, 230, 25);" href="/emisiongass/{{$vehiculo->peritaje->emisiongas->id}}"  tabindex="4">EMISION DE GASES </a>  <p>
                @endif
              @else
              <p>
             <a  href="/cemisiongas?placa={{$vehiculo->placa}}"  tabindex="4">EMISION DE GASES </a>
             @endif


             @if(isset($vehiculo->peritaje->simetria))
             @if(Auth::user()->id==$vehiculo->peritaje->simetria->user->id && $vehiculo->peritaje->simetria->activo) 
             <p>    <a style="color:hsl(20, 80%, 50%);" href="/simetrias/{{$vehiculo->peritaje->simetria->id}}/edit"  tabindex="4">SIMETRIA </a>  <p>
               
            
               @else 
               <p>    <a style="color:rgb(49, 230, 25);" href="/simetrias/{{$vehiculo->peritaje->simetria->id}}"  tabindex="4"> SIMETRIA </a>  <p>
             @endif
           @else
           <p>
          <a  href="/csimetria?placa={{$vehiculo->placa}}"  tabindex="4">SIMETRIA </a>
          @endif


          @if(isset($vehiculo->peritaje->equipocontrol))
          @if($vehiculo->peritaje->equipocontrol->activo)
          <p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=equipo"  tabindex="4">EQUPOS UTILIZADOS</a>
            @else
            <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=equipo"  tabindex="4">EQUIPOS UTILIZADOS</a>
          @endif
              @else
          <p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=equipo"  tabindex="4">EQUIPOS UTILIZADOS</a>
          @endif

          @if(isset($vehiculo->peritaje->swcontrol))
          @if($vehiculo->peritaje->swcontrol->activo)
          <p> <a style="color:hsl(20, 80%, 50%);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=sw"  tabindex="4">APLICACIONES UTILIZADAS</a>
            @else
            <p> <a style="color:rgb(49, 230, 25);"  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=sw"  tabindex="4">APLICACIONES UTILIZADAS</a>
          @endif
              @else
          <p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=sw"  tabindex="4">APLICACIONES UTILIZADAS</a>
          @endif




              </div>
      </div>
    </div>
  </div>


 


         
            
    
   
                   
                      <p><p>
   
    
  

    
    
   
   @endif
                   
         
  </tbody>
</table>

<!-- xxxxxxxxxxxxxxxxxxxxx -->


@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function () {
  $('#electricos').DataTable();
});
</script>
<script src="/js/marca_lineas.js">

</script>
@endsection
@endsection

 