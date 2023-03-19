@extends('layouts.plantillaperitaje')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
 
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

 {{--acordion--}}
 
<div  id="accordion-collapse" data-accordion="collapse">
  <h5 id="accordion-collapse-heading-1" >
    <button  style="height: 0.75rem;"  type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-100 border border-b-0 border-gray-100 rounded-t-xl focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-200 dark:border-gray-200 dark:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-200" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
      <span >INFORMACIÓN DEL VEHICULO</span>
      <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </h5>
  <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
    <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
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
  <h5 id="accordion-collapse-heading-2">
    <button style="height: 0.75rem;" type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
      <span>REVISIÓN VISUAL 1</span>
      <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </h5>
  <div    id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
    <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700">
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
  <h5 id="accordion-collapse-heading-3">
    <button style="height: 0.75rem;" type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
      <span>REVISIÓN VISUAL 2</span>
      <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </h5>
  <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
    <div class="p-5 font-light border border-t-0 border-gray-200 dark:border-gray-700">
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

  <h5 id="accordion-collapse-heading-4">
    <button style="height: 0.75rem;" type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false" aria-controls="accordion-collapse-body-4">
      <span> RESULTADOS Y PRUEBAS </span>
      <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </h5>
  <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
    <div class="p-5 font-light border border-t-0 border-gray-200 dark:border-gray-700">
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

{{--finacordion--}}
 

 


         
            
    
   
                   
                      <p><p>
   
    
  

    
    
   
   @endif
                   
         


<!-- xxxxxxxxxxxxxxxxxxxxx -->


@section('js')
 

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>


@endsection
@endsection

 