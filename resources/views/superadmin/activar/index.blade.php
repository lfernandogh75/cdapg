@extends('layouts.plantillaperitaje')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
 
@endsection

@section('contenido')

@if(!isset($vehiculo))

<form action="activar" method="GET">
   
  <div class="row">
    
   
    <div class="col-md-3">
    <label for="placa" class="form-label">PLACA</label>
    </div>
    <div class="col-md-3"> 
    <input type="text"   class="form-control"  id="placa" name="placa" placeholder="PLACA" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
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

  {{--inico acordion--}}
  <div  id="accordion-collapse" data-accordion="collapse">
    <h5 id="accordion-collapse-heading-1" >
      <button  style="height: 0.75rem;"  type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-100 border border-b-0 border-gray-100 rounded-t-xl focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-200 dark:border-gray-200 dark:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-200" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
        <span > ACTIVAR Y DESACTIVAR  INFORMACIÓN DEL VEHICULO</span>
        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
    </h5>
    <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
      <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
        @if(isset($vehiculo->peritaje->tarjeta))
      @if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->tarjeta->activo) 
      <p>   <a style="color:hsl(20, 80%, 50%);" href="/tarjetainactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">TARJETA </a>
        
     
        @else 
        <p>   <a style="color:rgb(49, 230, 25);" href= "/tarjetaactivar/{{$vehiculo->peritaje->id}}"  tabindex="4"> TARJETA </a>
      @endif
   
   @endif


   @if(isset($vehiculo))
   @if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->activo) 
   <p>   <a style="color:hsl(20, 80%, 50%);" href="/vehiculoinactiva/{{$vehiculo->id}}"  tabindex="4">PERITAJE </a>
     
  
     @else 
     <p>   <a style="color:rgb(49, 230, 25);" href= "/vehiculoactivar/{{$vehiculo->id}}"  tabindex="4"> PERITAJE</a>
   @endif

@endif

   @if(isset($vehiculo->peritaje->fotocontrol))
   @if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->fotocontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/fotoinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">REGISTRO FOTOGRAFICO</a>
     @else
     <p> <a style="color:rgb(49, 230, 25);"  href="/fotoactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">REGISTRO FOTOGRAFICO</a>
@endif
       
@endif

@if(isset($vehiculo->peritaje->cierre))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->cierre->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/cierreinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">TERMINAR PERITAJE</a>
  @else
  <p> <a style="color:rgb(49, 230, 25);"  href="/cierreactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">TERMINAR PERITAJE</a>
@endif
    
@endif


<p> <a  href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=12"  tabindex="4" target="_blank" rel="noopener">INFORME DEL  PERITAJE</a>
           
      </div>
    </div>
    <h5 id="accordion-collapse-heading-2">
      <button style="height: 0.75rem;" type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
        <span>REVISIÓN VISUAL</span>
        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
    </h5>
    <div    id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
      <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700">
        @if(isset($vehiculo->peritaje->exteriorcontrol))
        @if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->exteriorcontrol->activo)
     <p> <a style="color:hsl(20, 80%, 50%);"  href="/exteriorinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">EXTERIOR</a>
          @else
          <p> <a style="color:rgb(49, 230, 25);"  href="/exterioractivar/{{$vehiculo->peritaje->id}}"  tabindex="4">EXTERIOR</a>
     @endif
            
     @endif

     @if(isset($vehiculo->peritaje->motorcontrol))
     @if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->motorcontrol->activo)
  <p> <a style="color:hsl(20, 80%, 50%);"  href="/motorinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">ACCESORIOS MOTOR</a>
       @else
       <p> <a style="color:rgb(49, 230, 25);"  href="/motoractivar/{{$vehiculo->peritaje->id}}"  tabindex="4">ACCESORIOS MOTOR</a>
  @endif
         
  @endif

  @if(isset($vehiculo->peritaje->fluidocontrol))
  @if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->fluidocontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/fluidoinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">FUGAS DE FLUIDO</a>
    @else
    <p> <a style="color:rgb(49, 230, 25);"  href="/fluidoactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">FUGAS DE FLUIDO</a>
@endif
      
@endif

@if(isset($vehiculo->peritaje->llantacontrol))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->llantacontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/llantainactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">LLANTAS</a>
 @else
 <p> <a style="color:rgb(49, 230, 25);"  href="/llantaactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">LLANTAS</a>
@endif
   
@endif

@if(isset($vehiculo->peritaje->electricocontrol))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->electricocontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/electricoinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">EQUIPO ELECTRICO</a>
@else
<p> <a style="color:rgb(49, 230, 25);"  href="/electricoactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">EQUIPO ELECTRICO</a>
@endif
  
@endif

@if(isset($vehiculo->peritaje->suspensioncontrol))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->suspensioncontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/suspensioninactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">SUSPENSION</a>
@else
<p> <a style="color:rgb(49, 230, 25);"  href="/suspensionactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">SUSPENSION</a>
@endif
  
@endif

@if(isset($vehiculo->peritaje->chasiscontrol))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->chasiscontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/chasisinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">CHASIS</a>
@else
<p> <a style="color:rgb(49, 230, 25);"  href="/chasisactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">CHASIS</a>
@endif
  
@endif

@if(isset($vehiculo->peritaje->estructuracontrol))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->estructuracontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/estructurainactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">ESTRUCTURA</a>
@else
<p> <a style="color:rgb(49, 230, 25);"  href="/estructuraactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">ESTRUCTURA</a>
@endif
  
@endif

@if(isset($vehiculo->peritaje->interiorcontrol))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->interiorcontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/interiorinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">INTERIOR</a>
@else
<p> <a style="color:rgb(49, 230, 25);"  href="/interioractivar/{{$vehiculo->peritaje->id}}"  tabindex="4">INTERIOR</a>
@endif
  
@endif
@if(isset($vehiculo->peritaje->latoneriacontrol))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->latoneriacontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/latoneriainactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">LATONERIA</a>
@else
<p> <a style="color:rgb(49, 230, 25);"  href="/latoneriaactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">LATONERIA</a>
@endif
  
@endif

@if(isset($vehiculo->peritaje->pinturacontrol))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->pinturacontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/pinturainactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">PINTURA</a>
@else
<p> <a style="color:rgb(49, 230, 25);"  href="/pinturaactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">PINTURA</a>
@endif    
@endif

@if(isset($vehiculo->peritaje->vlucescontrol))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->vlucescontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/vlucesinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">LUCES</a>
@else
<p> <a style="color:rgb(49, 230, 25);"  href="/vlucesactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">LUCES</a>
@endif    
@endif

@if(isset($vehiculo->peritaje->nfluidocontrol))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->nfluidocontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/nfluidoinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">NIVEL DE FLUIDOS</a>
@else
<p> <a style="color:rgb(49, 230, 25);"  href="/nfluidoactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">NIVEL DE FLUIDOS</a>
@endif    
@endif

@if(isset($vehiculo->peritaje->vidriocontrol))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->vidriocontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/vidrioinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">VIDRIOS</a>
@else
<p> <a style="color:rgb(49, 230, 25);"  href="/vidrioactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">VIDRIOS</a>
@endif
  
@endif

@if(isset($vehiculo->peritaje->bajacontrol))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->bajacontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/bajainactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">PARTE BAJA</a>
@else
<p> <a style="color:rgb(49, 230, 25);"  href="/bajaactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">PARTE BAJA</a>
@endif
  
@endif

      </div>
    </div>
    <h5 id="accordion-collapse-heading-3">
      <button style="height: 0.75rem;" type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
        <span> RESULTADOS Y PRUEBAS </span>
        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
    </h5>
    <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
      <div class="p-5 font-light border border-t-0 border-gray-200 dark:border-gray-700">
        @if(isset($vehiculo->peritaje->compresioncontrol))
        @if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->compresioncontrol->activo)
        <p> <a style="color:hsl(20, 80%, 50%);"  href="/compresioninactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">COMPRESION Y FUGAS DEL MOTOR</a>
          @else
          <p> <a style="color:rgb(49, 230, 25);"  href="/compresionactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">COMPRESION Y FUGAS DEL MOTOR</a>
        @endif
            
        @endif

        @if(isset($vehiculo->peritaje->luzcontrol))
        @if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->luzcontrol->activo)
        <p> <a style="color:hsl(20, 80%, 50%);"  href="/luzinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">REVISION DE LUCES</a>
          @else
          <p> <a style="color:rgb(49, 230, 25);"  href="/luzactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">REVISION DE LUCES</a>
        @endif
            
        @endif

        @if(isset($vehiculo->peritaje->frenocontrol))
        @if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->frenocontrol->activo)
        <p> <a style="color:hsl(20, 80%, 50%);"  href="/frenoinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">PRUEBA DE FRENADO</a>
          @else
          <p> <a style="color:rgb(49, 230, 25);"  href="/frenoactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">PRUEBA DE FRENADO</a>
        @endif
            
        @endif

        
     
        
             
               
               


           @if(isset($vehiculo->peritaje->emisiongas))
           @if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->emisiongas->activo) 
           <p>   <a style="color:hsl(20, 80%, 50%);" href="/emisiongasinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">EMISION DE GASES </a>
             
          
             @else 
             <p>   <a style="color:rgb(49, 230, 25);" href= "/emisiongasactivar/{{$vehiculo->peritaje->id}}"  tabindex="4"> EMISION DE GASES</a>
           @endif
         
        @endif

        @if(isset($vehiculo->peritaje->simetria))
           @if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->simetria->activo) 
           <p>   <a style="color:hsl(20, 80%, 50%);" href="/simetriainactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">SIMETRIA </a>
             
          
             @else 
             <p>   <a style="color:rgb(49, 230, 25);" href= "/simetriaactivar/{{$vehiculo->peritaje->id}}"  tabindex="4"> SIMETRIA</a>
           @endif
         
        @endif


        @if(isset($vehiculo->peritaje->equipocontrol))
        @if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->equipocontrol->activo)
        <p> <a style="color:hsl(20, 80%, 50%);"  href="/equipoinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">EQUIPOS UTILIZADOS</a>
          @else
          <p> <a style="color:rgb(49, 230, 25);"  href="/equipoactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">EQUIPOS UTILIZADOS</a>
        @endif
            
        @endif

        @if(isset($vehiculo->peritaje->swcontrol))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->swcontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/swinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">SOFTWARE UTILIZADO</a>
@else
<p> <a style="color:rgb(49, 230, 25);"  href="/swactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">SOFTWARE UTILIZADO</a>
@endif
  
@endif

@if(isset($vehiculo->peritaje->archivocontrol))
@if(Auth::user()->role->nombre_rol=="superadmin" && $vehiculo->peritaje->archivocontrol->activo)
<p> <a style="color:hsl(20, 80%, 50%);"  href="/archivoinactiva/{{$vehiculo->peritaje->id}}"  tabindex="4">ARCHIVOS</a>
@else
<p> <a style="color:rgb(49, 230, 25);"  href="/archivoactivar/{{$vehiculo->peritaje->id}}"  tabindex="4">ARCHIVOS</a>
@endif
  
@endif
      </div>
    </div>
  
    
  </div>

  {{--fin acordion--}}
 


         
            
    
   
                   
                      <p><p>
   
    
  

    
    
   
   @endif
                   
         
 

<!-- xxxxxxxxxxxxxxxxxxxxx -->


@section('js')
 
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

 
@endsection
@endsection

 