{{--@extends('layouts.plantillaperitaje')
@section('contenido')--}}
<!DOCTYPE html>
<html>
<head>
    <title> Generate PDF  </title>
 {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"/>
 <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
 <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
 <!-- Scripts -->
 @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    @page {
        margin: 0cm 0cm;
        font-family: Arial;
    }

    body {
        margin: 3cm 2cm 2cm;
    }

    header {
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        background-color:rgba(239, 107, 19, 0.951);
        color: hsla(0, 33%, 4%, 0.851);
        text-align: center;
        line-height: 20px;
        font-weight: bold;
        border-radius: 15px 15px 15px 15px;
        
    }

    footer {
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        background-color:rgba(239, 107, 19, 0.951);
        color: hsla(0, 33%, 4%, 0.851);
        text-align: center;
        line-height: 20px;
        font-weight: bold;
        border-radius: 15px 15px 15px 15px;
       
    }
    
        

</style>
@guest
    <a title="login" href="{{ url('/') }}" target="_self" id="enlaceLogin"><i class="fas fa-key"></i>Iniciar sesión </a>
    @else

<body>
   <header>
        <p>CARVALUE <br>
            INFORME DE PERITAJE <br>
            MOTO BÁSICO
        </p>
    </header>

    <footer>
        Copyright &copy; {{date("Y")}}
    </footer>
    
  {{-- <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p> --}}
     
    @if(isset($peritaje->vehiculo->placa))
    <div   style=" border-top-width: 5px;
     border-right-width: 5px;
     border-bottom-width: 5px;
     width: 100px;
   height: 40px; 
   font-weight: bold;
   background-color: #eafe39;
     border-left-width: 5px;  border-radius: 5px 5px 5px 5px;  border-color: rgba(11, 5, 0, 0.951); text-align:center;">
      
    
      {{ $peritaje->vehiculo->placa }}</div>
      @endif 


      <br>
   
    @if(isset($peritaje->vehiculo->placa) && isset($peritaje->tarjeta ))
   
   
   
   <div style=" border-top-width: 20px;
    border-right-width: thin;
    border-bottom-width: thin; 
    border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: rgba(239, 107, 19, 0.951);">
  
  <p style="font-size: x-small;
  font-size:10px;
  margin-top:-19px;
   margin-left:20px;
 "> <img src="{{public_path('iconos/directions_car.jpg')}}"> N° INSPECCION {{$peritaje->id}}</p>
      
       
      <table style="font-size: x-small;" >
        <tr>
            <th>FECHA:</th>
            <td>{{ $peritaje->created_at}}</td>
        </tr>
        <tr>
   
            <th >CODIGO FASECOLSA:</th>
                     <td style="font-size: x-small;">666666</td>
                     <th>VALOR FASECOLSA:</th>
                     <td >42000000</td>
       </tr>
                     <tr>

                     <th>VALOR CARVALUE:</th>
                     <td>42000000</td>
                     <th>APROBADO:</th>
                     <td>SI</td>
                     </tr>
        
    </table>
               
          
      
      
      <br>
      
      <table     style="font-size: xx-small; margin: 0 auto;"  >
                <tr>
                   
                    <th bgcolor ="#19ea6d">PLACA</th>
                     <td>{{ $peritaje->vehiculo->placa}}</td>
                    <th bgcolor ="#19ea6d">TIPO</th>
                     <td>{{ $peritaje->tipo }}</td>
                     <th bgcolor ="#19ea6d">VEHICULO</th>
                     <td>{{ $peritaje->vehiculo->clase_vehiculo }}</td>
                     
                     <th bgcolor="#19ea6d">SERVICIO</th>
                     <td> {{$peritaje->tarjeta->servicio->nombre}}</td>
                    
                    
                </tr>
                
                <tr>
                    <th bgcolor ="#19ea6d">SOLICITANTE</th>
                    <td>{{ $peritaje->vehiculo->solicitante}}</td>
                    <th   bgcolor="#19ea6d">MODELO</th>
                    <td>{{ $peritaje->tarjeta->modelo}}</td>
                    <th  bgcolor="#19ea6d">COMBUSTIBLE</th>
                    <td> {{$peritaje->tarjeta->combustible->nombre}}</td>
                  
                   <th  bgcolor="#19ea6d">N MOTOR</th>
                <td> {{$peritaje->tarjeta->numero_motor}}</td>
                  
                </tr>
                
                 <tr>
                    <th bgcolor ="#19ea6d">CORREO</th>
                    <td>{{ $peritaje->vehiculo->email}}</td>
                    <th bgcolor="#19ea6d">COLOR</th>
                    <td> {{$peritaje->tarjeta->color->nombre}}</td>
                    <th bgcolor ="#19ea6d">KILOMETRAJE</th>
                    <td>{{ $peritaje->vehiculo->km }}Km</td>
                    <th bgcolor="#19ea6d">N SERIE</th>
                     <td> {{$peritaje->tarjeta->numero_serie}}</td>
                </tr>
               <tr>
                <th bgcolor ="#19ea6d">TELEFONO</th>
                <td>{{ $peritaje->vehiculo->telefono}}</td>
                <th bgcolor="#19ea6d">MARCA</th>
                <td> {{$peritaje->tarjeta->marca->nombre}}</td>
                <th  bgcolor="#19ea6d">CILINDRADA CC</th>
                   <td>{{ $peritaje->tarjeta->cilindrada}}</td>
                  
                   <th bgcolor="#19ea6d">N VIN</th>
                   <td> {{$peritaje->tarjeta->numero_vin}}</td>
               
               
               </tr>  

               <tr>
                <th bgcolor ="#19ea6d">{{$peritaje->vehiculo->tipoidentificacion }}</th>
                <td>{{ $peritaje->vehiculo->numeroidentificacion}}</td>
                <th  bgcolor="#19ea6d">LINEA</th>
                <td> {{$peritaje->tarjeta->linea->nombre}}</td>
                
                     <th  bgcolor="#19ea6d">CAPACIDAD</th>
                     <td> {{$peritaje->tarjeta->capacidad}}</td>
               
                <th bgcolor="#19ea6d">N CHASIS</th>
                <td> {{$peritaje->tarjeta->numero_chasis}}</td>
               </tr>
               
            </table>
            <br>
           <p style="font-size: x-small;">NOVEDADES EN LA INSPECCION</p> 
            <textarea style="font-size: xx-small;  width: 500px;"   readonly>N/A</textarea>
</div>
@endif
    <br>

    {{--fotos tarjeta --}}
    @if(isset($peritaje->fotocontrol->fotoparts))
    <div style=" border-top-width: 20px;
    border-right-width: thin;
    border-bottom-width: thin; 
    border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: rgba(239, 107, 19, 0.951);">

    
    <p style="font-size: xx-small;
    font-size:10px;
     margin-top:-19px;
      margin-left:30px;">TARJETA DE PROPIEDAD</p>
    <table style="margin: 0 auto;">
        
       
       {{-- @foreach($peritaje->fotocontrol->fotoparts as $foto) --}}
     {{  $foto=$peritaje->fotocontrol->fotoparts}}
    
    
   <td  align="center">   <img src="{{ public_path('imagen/'.$foto[0]->imagen)}}" width="250" height="200"></td>
   <td align="center"> <img src="{{ public_path('imagen/'.$foto[1]->imagen)}}"  width="250" height="200"></td>
    
    </table>
   
    </div>
    @endif
    {{--fin de tarjeta--}}
<br>

<div style=" border-top-width: 20px;
     border-right-width: thin;
    border-bottom-width: thin;  
    border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: rgba(239, 107, 19, 0.951);">

    
    <p style="font-size: xx-small;
    font-size:10px;
     margin-top:-19px;
      margin-left:30px;">IMPRONTAS DEL VEHICULO</p>

    <div style=" border-top-width: thin;
    border-right-width: thin;
    border-bottom-width: thin; 
   
    border-left-width: 1em;  border-radius: 5px 5px 5px 5px;  border-color:#19ea6d;">

    
<p style=" 
 margin-left:-15px;
width:15px;
word-wrap: break-word;
text-align:center;
 ">MOTOR</p>
    </div>
    <br>
    <div style=" border-top-width: thin;
    border-right-width: thin;
    border-bottom-width: thin; 
   
    border-left-width: 1em;  border-radius: 5px 5px 5px 5px;  border-color:#19ea6d;">

    
<p style=" 
 margin-left:-15px;
width:15px;
word-wrap: break-word;
text-align:center;
 ">CHASIS</p>
    </div>

</div>
    <div style="page-break-after:always;"></div>
    <header>
        <p>CAR VALUE <br>
            INFORME DE PERITAJE <br>
            LIVIANO BÁSICO
        </p>
    </header>

    <footer>
        Copyright &copy; {{date("Y")}}
    </footer>
 {{--registro fotografico --}}

  {{--fotos tarjeta --}}
  @if(isset($peritaje->fotocontrol->fotoparts))
  <div style=" border-top-width: 20px;
  border-right-width: thin;
  border-bottom-width: thin; 
  border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: rgba(239, 107, 19, 0.951);">

  
  <p style="font-size: xx-small;
  font-size:10px;
   margin-top:-19px;
    margin-left:30px;">REGISTRO FOTOGRAFICO</p>
  <table style="margin: 0 auto;">
      
     
     {{-- @foreach($peritaje->fotocontrol->fotoparts as $foto) --}}
   {{  $foto=$peritaje->fotocontrol->fotoparts}}
  
   <tr>
    <td>{{ $foto[2]->fotopart->name }}</td>
    <td>{{ $foto[3]->fotopart->name }}</td>
   </tr>
  <tr>
 <td  align="center">   <img src="{{ public_path('imagen/'.$foto[2]->imagen)}}" width="250" height="200"></td>
 <td align="center"> <img src="{{ public_path('imagen/'.$foto[3]->imagen)}}"  width="250" height="200"></td>
</tr>
<tr>
    <td>{{ $foto[4]->fotopart->name }}</td>
    <td>{{ $foto[5]->fotopart->name }}</td>
   </tr>
<tr>
    <td  align="center">   <img src="{{ public_path('imagen/'.$foto[4]->imagen)}}" width="250" height="200"></td>
 <td align="center"> <img src="{{ public_path('imagen/'.$foto[5]->imagen)}}"  width="250" height="200"></td>
</tr>
  </table>
 
  </div>
  @endif
  {{--fin de tarjeta--}}



  {{-- fin registro fotografico --}}
<br>

 {{-- inicio de latoneria o carroceria--}}
 @if(isset($peritaje->latoneriacontrol))
 <div style=" border-top-width: 30px;
 border-right-width: thin;
 border-bottom-width:  thin; 
 border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

 
 <p style="font-size: xx-small;
 font-size:10px;
  margin-top:-19px;
   margin-left:30px;">LATONERIA O CARROCERIA {{$peritaje->latoneriacontrol->nivelaprobado}}%</p>


<table   style="font-size: xx-small" >

<tr>
<th>
<br>
@if(isset($peritaje->latoneriacontrol->latoneriaparts))
<div class="col-10"   style=" 

   width: 300px;
 border-top-width: 20px; 
border-right-width: thin;

 border-bottom-width: thin; 
 border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
     font-size:10px;
      margin-top:-19px;
       margin-left:20px;"> VISTA IZQUIERDA</p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">

<th>PIEZA</th>
<th>ESTADO</th>


</tr>
@foreach($peritaje->latoneriacontrol->latoneriaparts as $latoneria)
@if($latoneria->vista=="IZQUIERDA")
<tr>
<td>{{ $latoneria->latoneriapart->name }}</td>
<td>{{ $latoneria->estado }}</td>


</tr>
@endif
@endforeach
</table>










 </div>
 @endif
</th>
<th>
 <br>
 @if(isset($peritaje->latoneriacontrol->latoneriaparts))
 <div class="col-10"   style=" 
 width: 300px;

border-top-width: 20px; 
border-right-width: thin;

border-bottom-width: thin; 
border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
   font-size:10px;
    margin-top:-19px;
     margin-left:20px;"> VISTA DERECHA </p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">

<th>PIEZA</th>
<th>ESTADO</th>


</tr>
@foreach($peritaje->latoneriacontrol->latoneriaparts as $latoneria)
@if($latoneria->vista=="DERECHA")
<tr>
<td>{{ $latoneria->latoneriapart->name }}</td>
<td>{{ $latoneria->estado }}</td>


</tr>
@endif
@endforeach
</table>










</div>
@endif  

 </th>
</tr>


<tr>
 <th>

<br>
@if(isset($peritaje->latoneriacontrol->latoneriaparts))
<div class="col-10"   style=" 

       width: 300px;
     border-top-width: 20px; 
    border-right-width: thin;
   
     border-bottom-width: thin; 
     border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
         font-size:10px;
          margin-top:-19px;
           margin-left:20px;"> VISTA POSTERIOR</p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">
 
  <th>PIEZA</th>
  <th>ESTADO</th>
   

</tr>
@foreach($peritaje->latoneriacontrol->latoneriaparts as $latoneria)
@if($latoneria->vista=="POSTERIOR")
<tr>
  <td>{{ $latoneria->latoneriapart->name }}</td>
  <td>{{ $latoneria->estado }}</td>
  
   
</tr>
@endif
@endforeach
</table>










     </div>
     @endif
 </th>
 <th>
     <br>
     @if(isset($peritaje->latoneriacontrol->latoneriaparts))
     <div class="col-10"   style=" 
   
    width: 300px;
   border-top-width: 20px; 
  border-right-width: thin;
 
   border-bottom-width: thin; 
   border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
       font-size:10px;
        margin-top:-19px;
         margin-left:20px;"> VISTA FRONTAL </p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">

<th>PIEZA</th>
<th>ESTADO</th>
 

</tr>
@foreach($peritaje->latoneriacontrol->latoneriaparts as $latoneria)
@if($latoneria->vista=="FRONTAL")
<tr>
<td>{{ $latoneria->latoneriapart->name }}</td>
<td>{{ $latoneria->estado }}</td>

 
</tr>
@endif
@endforeach
</table>










   </div>
   @endif  

     </th>
 </tr>
</table> 

 

<textarea style="font-size: xx-small;  width: 550px;margin: 20px;"   readonly>{{$peritaje->latoneriacontrol->observacion}}</textarea>
  
 </div>
 @endif
 {{--fin de latoneria y carroceria--}}

 <div style="page-break-after:always;"></div>
    <header>
        <p>CAR VALUE <br>
            INFORME DE PERITAJE <br>
            LIVIANO BÁSICO
        </p>
    </header>

    <footer>
        Copyright &copy; {{date("Y")}}
    </footer>

    <br>
   {{--inicio fuga de fluidos y niveles--}}
   <table   style="font-size: xx-small" >
      
    <tr>
    <th>

        @if(isset($peritaje->fluidocontrol->fluidoparts))
<div class="col-10"   style=" 
          width: 300px;
        border-top-width: 20px; 
       border-right-width: thin;
      
        border-bottom-width: thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
            font-size:10px;
             margin-top:-19px;
              margin-left:20px;"> FUGAS DE FLUIDOS {{$peritaje->fluidocontrol->nivelaprobado}}%</p>
<table   style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>FUGA</th>
     <th>OBSERVACION</th>
 {{--    <th>TIPO</th>
     <th>OBSERVACION</th>--}}

 </tr>
 @foreach($peritaje->fluidocontrol->fluidoparts as $fluido)
 <tr>
     <td>{{ $fluido->fluidopart->name }}</td>
     <td>{{ $fluido->estado }}</td>
     <td>{{ $fluido->observaciones }}</td>
  {{--  <td>{{ $esterior->tipo }}</td>
     <td>{{ $esterior->observaciones }}</td>--}}
      
 </tr>
 @endforeach
</table>




<textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->fluidocontrol->observacion}}</textarea>





        </div>
        @endif
    </th>
    <th>
<br>
@if(isset($peritaje->nfluidocontrol->fluidoparts))
            <div class="col-10"   style="
              width: 300px;
            border-top-width: 20px;
            border-right-width: thin;
            border-bottom-width: thin;
            border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
font-size:10px;
margin-top:-19px;
margin-left:20px;">NIVELES DE FLUIDOS {{$peritaje->nfluidocontrol->nivelaprobado}}%</p>
<table style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>ESTADO</th>
    
     

 </tr>
 @foreach($peritaje->nfluidocontrol->fluidoparts as $nfluido)
 <tr>
     <td>{{ $nfluido->fluidopart->name }}</td>
     <td>{{ $nfluido->estado }}</td>
     
     
      
 </tr>
 @endforeach
 
</table>
<textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->nfluidocontrol->observacion}}</textarea>


            </div> 
            @endif
        </th>
    </tr>
</table> 
<br>
{{--fin de fugas de fluidos y niveles --}}

{{--chasis y suspension--}}
<br>
<table   style="font-size: xx-small" >
      
    <tr>
    <th>
        @if(isset($peritaje->chasiscontrol->chasisparts))

<div class="col-10"   style=" 
          width: 300px;
        border-top-width: 20px; 
       border-right-width: thin;
      
        border-bottom-width: thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
            font-size:10px;
             margin-top:-19px;
              margin-left:20px;"> CHASIS {{$peritaje->chasiscontrol->nivelaprobado}}%</p>
<table   style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>ESTADO</th>
 {{--    <th>TIPO</th>
     <th>OBSERVACION</th>--}}

 </tr>
 @foreach($peritaje->chasiscontrol->chasisparts as $chasis)
 <tr>
     <td>{{ $chasis->chasispart->name }}</td>
     <td>{{ $chasis->estado }}</td>
  {{--  <td>{{ $esterior->tipo }}</td>
     <td>{{ $esterior->observaciones }}</td>--}}
      
 </tr>
 @endforeach
</table>




<textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->fluidocontrol->observacion}}</textarea>





        </div>
        @endif
    </th>
    <th>
        <br>
      
        </th>
    </tr>
</table> 
<br>
{{--fin de chasis y suspension--}}


   

  {{--inicio exteriores y parte baja--}}
    <table   style="font-size: xx-small" >
      
        <tr>
        <th>

   

@if(isset($peritaje->exteriorcontrol->piezasexteriores))
<div class="col-10"   style=" 
              width: 300px;
            border-top-width: 20px; 
           border-right-width: thin;
          
            border-bottom-width: thin; 
            border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
 
 <p style="font-size: xx-small;
                font-size:10px;
                 margin-top:-19px;
                  margin-left:20px;"> REVISION DE EXTERIORES {{$peritaje->exteriorcontrol->nivelaprobado}}%</p>
 <table   style="font-size: xx-small; margin: 0 auto;">
     <tr bgcolor="#19ea6d">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
         
     {{--    <th>TIPO</th>
         <th>OBSERVACION</th>--}}

     </tr>
     @foreach($peritaje->exteriorcontrol->piezasexteriores as $esterior)
     <tr>
         <td>{{ $esterior->exteriorpart->name }}</td>
         <td>{{ $esterior->estado }}</td>
      {{--  <td>{{ $esterior->tipo }}</td>
         <td>{{ $esterior->observaciones }}</td>--}}
          
     </tr>
     @endforeach
 </table>


  
    
    <textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->exteriorcontrol->observacion}}</textarea>
   
 



            </div>
            @endif
        </th>
        <th>
    @if(isset($peritaje->bajacontrol->bajaparts))
                <div class="col-10"   style="
                  width: 300px;
                border-top-width: 20px;
                border-right-width: thin;
                border-bottom-width: thin;
                border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
 
 <p style="font-size: xx-small;
 font-size:10px;
  margin-top:-19px;
   margin-left:20px;">PARTE BAJA {{$peritaje->bajacontrol->nivelaprobado}}%</p>
 <table style="font-size: xx-small; margin: 0 auto;">
     <tr bgcolor="#19ea6d">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
         

     </tr>
     @foreach($peritaje->bajacontrol->bajaparts as $baja)
     <tr>
         <td>{{ $baja->bajapart->name }}</td>
         <td>{{ $baja->estado }}</td>
          
         
          
     </tr>
     @endforeach
      
 </table>
 <textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->bajacontrol->observacion}}</textarea>


                </div> 
                @endif
            </th>
        </tr>
    </table> 
    <br>
    {{--FIN DE EXTERIOR Y COMPRESION--}}
    <div style="page-break-after:always;"></div>
    <header>
        <p>CAR VALUE <br>
            INFORME DE PERITAJE <br>
            LIVIANO BÁSICO
        </p>
    </header>

    <footer>
        Copyright &copy; {{date("Y")}}
    </footer>


    @if(isset($peritaje->vehiculo->placa))
    <div   style=" border-top-width: 5px;
     border-right-width: 5px;
     border-bottom-width: 5px;
     width: 100px;
   height: 40px; 
   font-weight: bold;
   background-color: #eafe39;
     border-left-width: 5px;  border-radius: 5px 5px 5px 5px;  border-color: rgba(11, 5, 0, 0.951); text-align:center;">
      
    
      {{ $peritaje->vehiculo->placa }}</div>
      @endif
   
    @if(isset($peritaje->fotocontrol->fotoparts))
    <div style=" border-top-width: 20px;
    border-right-width: 1em;
    border-bottom-width: thick; 
    border-left-width: thin;  border-radius: 5px 30px 5px 5px;  border-color: rgba(239, 107, 19, 0.951);">

    
    <p style="font-size: xx-small;
    font-size:10px;
     margin-top:-19px;
      margin-left:30px;"> REGISTRO FOTOGRAFICO</p>
    <table class="table table-bordered" style="font-size: xx-small;" >
        <tr bgcolor="#19ea6d">
           
            <th>FOTO</th>
            <th>IMAGEN</th>
            <th>OBSERVACION</th>
            <th>FOTO</th>
            <th>IMAGEN</th>
            <th>OBSERVACION</th>
        </tr>
       
       {{-- @foreach($peritaje->fotocontrol->fotoparts as $foto) --}}
     {{  $foto=$peritaje->fotocontrol->fotoparts}}
   {{ $c=count($foto)-1}}
   @if($c==0)
   <td>{{ $foto[0]->fotopart->name }}</td>
   <td>   <img src="{{ public_path('imagen/'.$foto[0]->imagen)}}" width="50%"></td>
   <td>{{ $foto[0]->observacion }}</td>
   @else
     @for($i=0;$i<$c;$i++)
    
     <tr>
              @if($i%2==0)  
            <td>{{ $foto[$i]->fotopart->name }}</td>
            <td>   <img src="{{ public_path('imagen/'.$foto[$i]->imagen)}}" width="50%"></td>
            <td>{{ $foto[$i]->observacion }}</td>
            @endif
          @if(($i+1)%2!=0)
            <td>{{ $foto[$i+1]->fotopart->name }}</td>
            <td>   <img src="{{ public_path('imagen/'.$foto[$i+1]->imagen)}}" width="50%"></td>
            <td>{{ $foto[$i+1]->observacion }}</td>
            @endif
             
        </tr>
        @endfor
        @if($c%2==0)
        <td>{{ $foto[$c]->fotopart->name }}</td>
            <td>   <img src="{{ public_path('./imagen/'.$foto[$c]->imagen)}}" width="50%"></td>
            <td>{{ $foto[$c]->observacion }}</td>
            @endif
      @endif
      {{-- @endforeach--}} 
    </table>
   
    </div>
    @endif
 {{--   <footer>
        <h1>CDA PARQUE DEL AGUA</h1>
    </footer>--}}
    <br>
        @if(isset($peritaje->estructuracontrol))
        <div style=" border-top-width: 30px;
        border-right-width: thin;
        border-bottom-width:  thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
    
        
        <p style="font-size: xx-small;
        font-size:10px;
         margin-top:-19px;
          margin-left:30px;"> ESTRUCTURA {{$peritaje->estructuracontrol->nivelaprobado}}%</p>


<table   style="font-size: xx-small" >
      
    <tr>
    <th>

<br>
@if(isset($peritaje->estructuracontrol->estructuraparts))
<div class="col-10"   style=" 
 
          width: 300px;
        border-top-width: 20px; 
       border-right-width: thin;
      
        border-bottom-width: thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
            font-size:10px;
             margin-top:-19px;
              margin-left:20px;"> VISTA IZQUIERDA</p>
<table   style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>ESTADO</th>
      

 </tr>
 @foreach($peritaje->estructuracontrol->estructuraparts as $estructura)
 @if($estructura->vista=="IZQUIERDA")
 <tr>
     <td>{{ $estructura->estructurapart->name }}</td>
     <td>{{ $estructura->estado }}</td>
     
      
 </tr>
 @endif
 @endforeach
</table>




 





        </div>
        @endif
    </th>
    <th>
        <br>
        @if(isset($peritaje->estructuracontrol->estructuraparts))
        <div class="col-10"   style=" 
        width: 300px;
      
      border-top-width: 20px; 
     border-right-width: thin;
    
      border-bottom-width: thin; 
      border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
          font-size:10px;
           margin-top:-19px;
            margin-left:20px;"> VISTA DERECHA </p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">
  
   <th>PIEZA</th>
   <th>ESTADO</th>
    

</tr>
@foreach($peritaje->estructuracontrol->estructuraparts as $estructura)
@if($estructura->vista=="DERECHA")
<tr>
   <td>{{ $estructura->estructurapart->name }}</td>
   <td>{{ $estructura->estado }}</td>
   
    
</tr>
@endif
@endforeach
</table>










      </div>
             
      @endif
        </th>
    </tr>


    <tr>
        <th>
    
    <br>
    @if(isset($peritaje->estructuracontrol->estructuraparts))
    <div class="col-10"   style=" 
     
              width: 300px;
            border-top-width: 20px; 
           border-right-width: thin;
          
            border-bottom-width: thin; 
            border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
   
    <p style="font-size: xx-small;
                font-size:10px;
                 margin-top:-19px;
                  margin-left:20px;"> VISTA POSTERIOR</p>
    <table   style="font-size: xx-small; margin: 0 auto;">
     <tr bgcolor="#19ea6d">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
          
    
     </tr>
     @foreach($peritaje->estructuracontrol->estructuraparts as $estructura)
     @if($estructura->vista=="POSTERIOR")
     <tr>
         <td>{{ $estructura->estructurapart->name }}</td>
         <td>{{ $estructura->estado }}</td>
         
          
     </tr>
     @endif
     @endforeach
    </table>
    
    
    
    
     
    
    
    
    
    
            </div>
            @endif
        </th>
        <th>
            <br>
            @if(isset($peritaje->estructuracontrol->estructuraparts))
            <div class="col-10"   style=" 
          
           width: 300px;
          border-top-width: 20px; 
         border-right-width: thin;
        
          border-bottom-width: thin; 
          border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
  
    <p style="font-size: xx-small;
              font-size:10px;
               margin-top:-19px;
                margin-left:20px;"> VISTA FRONTAL </p>
    <table   style="font-size: xx-small; margin: 0 auto;">
    <tr bgcolor="#19ea6d">
      
       <th>PIEZA</th>
       <th>ESTADO</th>
        
    
    </tr>
    @foreach($peritaje->estructuracontrol->estructuraparts as $estructura)
    @if($estructura->vista=="FRONTAL")
    <tr>
       <td>{{ $estructura->estructurapart->name }}</td>
       <td>{{ $estructura->estado }}</td>
       
        
    </tr>
    @endif
    @endforeach
    </table>
    
    
    
    
    
    
    
    
    
    
          </div>
          @endif  
    
            </th>
        </tr>
</table> 

        

<textarea style="font-size: xx-small;  width: 550px;margin: 20px;"   readonly>{{$peritaje->estructuracontrol->observacion}}</textarea>
         
        </div>
        @endif
<br>
       
<br>
        {{--inicio pintura--}}
        @if(isset($peritaje->pinturacontrol))
        <div style=" border-top-width: 30px;
        border-right-width: thin;
        border-bottom-width:  thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
    
        
        <p style="font-size: xx-small;
        font-size:10px;
         margin-top:-19px;
          margin-left:30px;"> PINTURA {{$peritaje->pinturacontrol->nivelaprobado}}%</p>


<table   style="font-size: xx-small" >
      
    <tr>
    <th>
<br>
@if(isset($peritaje->pinturacontrol->latoneriaparts))
<div class="col-10"   style=" 
 
          width: 300px;
        border-top-width: 20px; 
       border-right-width: thin;
      
        border-bottom-width: thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
            font-size:10px;
             margin-top:-19px;
              margin-left:20px;"> VISTA IZQUIERDA</p>
<table   style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>ESTADO</th>
      

 </tr>
 @foreach($peritaje->pinturacontrol->latoneriaparts as $pintura)
 @if($pintura->vista=="IZQUIERDA")
 <tr>
     <td>{{ $pintura->latoneriapart->name }}</td>
     <td>{{ $pintura->estado }}</td>
     
      
 </tr>
 @endif
 @endforeach
</table>




 





        </div>
        @endif
    </th>
    <th>
        <br>
        @if(isset($peritaje->pinturacontrol->latoneriaparts))
        <div class="col-10"   style=" 
        width: 300px;
      
      border-top-width: 20px; 
     border-right-width: thin;
    
      border-bottom-width: thin; 
      border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
          font-size:10px;
           margin-top:-19px;
            margin-left:20px;"> VISTA DERECHA </p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">
  
   <th>PIEZA</th>
   <th>ESTADO</th>
    

</tr>
@foreach($peritaje->pinturacontrol->latoneriaparts as $pintura)
@if($pintura->vista=="DERECHA")
<tr>
   <td>{{ $pintura->latoneriapart->name }}</td>
   <td>{{ $pintura->estado }}</td>
   
    
</tr>
@endif
@endforeach
</table>










      </div>
             
      @endif
        </th>
    </tr>


    <tr>
        <th>
    <br>
    @if(isset($peritaje->pinturacontrol->latoneriaparts))
    <div class="col-10"   style=" 
     
              width: 300px;
            border-top-width: 20px; 
           border-right-width: thin;
          
            border-bottom-width: thin; 
            border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
   
    <p style="font-size: xx-small;
                font-size:10px;
                 margin-top:-19px;
                  margin-left:20px;"> VISTA POSTERIOR</p>
    <table   style="font-size: xx-small; margin: 0 auto;">
     <tr bgcolor="#19ea6d">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
          
    
     </tr>
     @foreach($peritaje->pinturacontrol->latoneriaparts as $pintura)
     @if($pintura->vista=="POSTERIOR")
     <tr>
         <td>{{ $pintura->latoneriapart->name }}</td>
         <td>{{ $pintura->estado }}</td>
         
          
     </tr>
     @endif
     @endforeach
    </table>
    
    
    
    
     
    
    
    
    
    
            </div>
            @endif
        </th>
        <th>
            <br>
            @if(isset($peritaje->pinturacontrol->latoneriaparts))
            <div class="col-10"   style=" 
          
           width: 300px;
          border-top-width: 20px; 
         border-right-width: thin;
        
          border-bottom-width: thin; 
          border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
  
    <p style="font-size: xx-small;
              font-size:10px;
               margin-top:-19px;
                margin-left:20px;"> VISTA FRONTAL </p>
    <table   style="font-size: xx-small; margin: 0 auto;">
    <tr bgcolor="#19ea6d">
      
       <th>PIEZA</th>
       <th>ESTADO</th>
        
    
    </tr>
    @foreach($peritaje->pinturacontrol->latoneriaparts as $pintura)
    @if($pintura->vista=="FRONTAL")
    <tr>
       <td>{{ $pintura->latoneriapart->name }}</td>
       <td>{{ $pintura->estado }}</td>
       
        
    </tr>
    @endif
    @endforeach
    </table>
    
    
    
    
    
    
    
    
    
    
          </div>
          @endif  
    
            </th>
        </tr>
</table> 

        

<textarea style="font-size: xx-small;  width: 550px;margin: 20px;"   readonly>{{$peritaje->pinturacontrol->observacion}}</textarea>
         
        </div>
        @endif
        {{--fin pintura--}}

        {{--VIDRIOS I INTERIOR--}}
        <br>
        <table   style="font-size: xx-small" >
      
            <tr>
            <th>
    @if(isset($peritaje->vidriocontrol->vidrioparts))
    
    <div class="col-10"   style=" 
                  width: 300px;
                border-top-width: 20px; 
               border-right-width: thin;
              
                border-bottom-width: thin; 
                border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
     
     <p style="font-size: xx-small;
                    font-size:10px;
                     margin-top:-19px;
                      margin-left:20px;"> REVISION DE VIDRIOS {{$peritaje->vidriocontrol->nivelaprobado}}%</p>
     <table   style="font-size: xx-small; margin: 0 auto;">
         <tr bgcolor="#19ea6d">
            
             <th>PIEZA</th>
             <th>ESTADO</th>
         {{--    <th>TIPO</th>
             <th>OBSERVACION</th>--}}
    
         </tr>
         @foreach($peritaje->vidriocontrol->vidrioparts as $vidrio)
         <tr>
             <td>{{ $vidrio->vidriopart->name }}</td>
             <td>{{ $vidrio->estado }}</td>
          {{--  <td>{{ $esterior->tipo }}</td>
             <td>{{ $esterior->observaciones }}</td>--}}
              
         </tr>
         @endforeach
     </table>
    
    
      
        
        <textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->vidriocontrol->observacion}}</textarea>
       
     
    
    
    
                </div>
                @endif
            </th>
            <th>
                @if(isset($peritaje->interiorcontrol->interiorparts))
                    <div class="col-10"   style="
                      width: 300px;
                    border-top-width: 20px;
                    border-right-width: thin;
                    border-bottom-width: thin;
                    border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
     
     <p style="font-size: xx-small;
     font-size:10px;
      margin-top:-19px;
       margin-left:20px;">INTERIOR {{$peritaje->interiorcontrol->nivelaprobado}}%</p>
     <table style="font-size: xx-small; margin: 0 auto;">
         <tr bgcolor="#19ea6d">
            
             <th>PIEZA</th>
             <th>ESTADO</th>
            
             
    
         </tr>
         @foreach($peritaje->interiorcontrol->interiorparts as $interior)
         <tr>
             <td>{{ $interior->interiorpart->name }}</td>
             <td>{{ $interior->estado }}</td>
             
             
              
         </tr>
         @endforeach
         
     </table>
     <textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->interiorcontrol->observacion}}</textarea>
    
    
                    </div> 
                    @endif
                </th>
            </tr>
        </table> 
   {{--FIN DE VIDRIOS Y INTERIOR--}}    

{{--chasis y suspension--}}
<br>
<table   style="font-size: xx-small" >
      
    <tr>
    <th>
        @if(isset($peritaje->chasiscontrol->chasisparts))

<div class="col-10"   style=" 
          width: 300px;
        border-top-width: 20px; 
       border-right-width: thin;
      
        border-bottom-width: thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
            font-size:10px;
             margin-top:-19px;
              margin-left:20px;"> CHASIS {{$peritaje->chasiscontrol->nivelaprobado}}%</p>
<table   style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>ESTADO</th>
 {{--    <th>TIPO</th>
     <th>OBSERVACION</th>--}}

 </tr>
 @foreach($peritaje->chasiscontrol->chasisparts as $chasis)
 <tr>
     <td>{{ $chasis->chasispart->name }}</td>
     <td>{{ $chasis->estado }}</td>
  {{--  <td>{{ $esterior->tipo }}</td>
     <td>{{ $esterior->observaciones }}</td>--}}
      
 </tr>
 @endforeach
</table>




<textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->fluidocontrol->observacion}}</textarea>





        </div>
        @endif
    </th>
    <th>
        <br>
        @if(isset($peritaje->suspensioncontrol->suspensionparts))
            <div class="col-10"   style="
              width: 300px;
            border-top-width: 20px;
            border-right-width: thin;
            border-bottom-width: thin;
            border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
font-size:10px;
margin-top:-19px;
margin-left:20px;">ESTADO DE LA SUSPENSION {{$peritaje->suspensioncontrol->nivelaprobado}}%</p>
<table style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>ESTADO</th>
    
     

 </tr>
 @foreach($peritaje->suspensioncontrol->suspensionparts as $suspension)
 <tr>
     <td>{{ $suspension->suspensionpart->name }}</td>
     <td>{{ $suspension->estado }}</td>
     
     
      
 </tr>
 @endforeach
 
</table>
<textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->suspensioncontrol->observacion}}</textarea>


            </div> 
            @endif
        </th>
    </tr>
</table> 
<br>
{{--fin de chasis y suspension--}}
{{--partes del motor y llantas--}}
<table   style="font-size: xx-small" >
      
    <tr>
    <th>
<br>
@if(isset($peritaje->motorcontrol->piezasmotors))
<div class="col-10"   style=" 
          width: 300px;
        border-top-width: 20px; 
       border-right-width: thin;
      
        border-bottom-width: thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
            font-size:10px;
             margin-top:-19px;
              margin-left:20px;"> PARTES DEL MOTOR {{$peritaje->motorcontrol->nivelaprobado}}%</p>
<table   style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>ESTADO</th>
 {{--    <th>TIPO</th>
     <th>OBSERVACION</th>--}}

 </tr>
 @foreach($peritaje->motorcontrol->piezasmotors as $motor)
 <tr>
     <td>{{ $motor->motorpark->name }}</td>
     <td>{{ $motor->estado }}</td>
  {{--  <td>{{ $esterior->tipo }}</td>
     <td>{{ $esterior->observaciones }}</td>--}}
      
 </tr>
 @endforeach
</table>




<textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->motorcontrol->observacion}}</textarea>





        </div>
        @endif
    </th>
    <th>
<br>
@if(isset($peritaje->llantacontrol->llantaparts))
            <div class="col-10"   style="
              width: 300px;
            border-top-width: 20px;
            border-right-width: thin;
            border-bottom-width: thin;
            border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
font-size:10px;
margin-top:-19px;
margin-left:20px;">ESTADO DE LAS LLANTAS </p>
<table style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>PARA CAMBIO</th>
     <th>VIDA UTIL</th>
    
    
     

 </tr>
 @foreach($peritaje->llantacontrol->llantaparts as $llanta)
 <tr>
     <td>{{ $llanta->llantapart->name }}</td>
     <td>{{ $llanta->cambio }}</td>
     <td>{{ $llanta->vidautil }}</td>
      
     
     
      
 </tr>
 @endforeach
 
</table>
<textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->llantacontrol->observacion}}</textarea>


            </div> 
            @endif
        </th>
    </tr>
</table> 
{{--fin de partes del motor y llantas--}}
<br>
{{--inicio luces y equipo electrico--}}

 
<table   style="font-size: xx-small" >
      
    <tr>
    <th>

        @if(isset($peritaje->vlucescontrol->luzparts))
<div class="col-10"   style=" 
          width: 300px;
        border-top-width: 20px; 
       border-right-width: thin;
      
        border-bottom-width: thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
            font-size:10px;
             margin-top:-19px;
              margin-left:20px;"> LUCES {{$peritaje->vlucescontrol->nivelaprobado}}%</p>
<table   style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>ESTADO</th>
 {{--    <th>TIPO</th>
     <th>OBSERVACION</th>--}}

 </tr>
 @foreach($peritaje->vlucescontrol->luzparts as $luces)
 <tr>
     <td>{{ $luces->luzpart->name }}</td>
     <td>{{ $luces->estado }}</td>
  {{--  <td>{{ $esterior->tipo }}</td>
     <td>{{ $esterior->observaciones }}</td>--}}
      
 </tr>
 @endforeach
</table>




<textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->vlucescontrol->observacion}}</textarea>





        </div>
        @endif
    </th>
    <th>
<br>
@if(isset($peritaje->electricocontrol->piezaselectricas))
            <div class="col-10"   style="
              width: 300px;
            border-top-width: 20px;
            border-right-width: thin;
            border-bottom-width: thin;
            border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
font-size:10px;
margin-top:-19px;
margin-left:20px;">EQUIPOS ELECTRICOS {{$peritaje->electricocontrol->nivelaprobado}}%</p>
<table style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>ESTADO</th>
    
     

 </tr>
 @foreach($peritaje->electricocontrol->piezaselectricas as $electrico)
 <tr>
     <td>{{ $electrico->electricalpart->name }}</td>
     <td>{{ $electrico->estado }}</td>
     
     
      
 </tr>
 @endforeach
 
</table>
<textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->electricocontrol->observacion}}</textarea>


            </div> 
            @endif
        </th>
    </tr>
</table> 
{{--fin luces y equipo electrico--}}
{{--compresion de motor revision de luces--}}
<table   style="font-size: xx-small" >
      
    <tr>
    <th>
<br>
@if(isset($peritaje->luzcontrol->luzparts))
<div class="col-10"   style=" 
          width: 370px;
        border-top-width: 20px; 
       border-right-width: thin;
      
        border-bottom-width: thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
            font-size:10px;
             margin-top:-19px;
              margin-left:20px;"> RESULTADO DE LUCES {{$peritaje->luzcontrol->nivelaprobado}}%</p>
<table   style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>INTENCIDAD</th>
     <th>MINIMO</th>
     <th>UNIDAD</th>
     <th>INCLINACION</th>
     <th>RANGO</th>
 {{--    <th>TIPO</th>
     <th>OBSERVACION</th>--}}

 </tr>
 @foreach($peritaje->luzcontrol->luzparts as $luz)
 <tr>
     <td>{{ $luz->luzpart->name }}</td>
     <td>{{ $luz->intensidad }}</td>
     <td>{{ $luz->minimo }}</td>
     <td>{{ $luz->unidad }}</td>
     <td>{{ $luz->inclinacion }}</td>
     <td>{{ $luz->rango }}</td>

  {{--  <td>{{ $esterior->tipo }}</td>
     <td>{{ $esterior->observaciones }}</td>--}}
      
 </tr>
 @endforeach
</table>




<textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->luzcontrol->observacion}}</textarea>





        </div>
        @endif
    </th>
    <th>
<br>
@if(isset($peritaje->compresioncontrol->compresionparts))
            <div class="col-10"   style="
              width: 200px;
            border-top-width: 20px;
            border-right-width: thin;
            border-bottom-width: thin;
            border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
font-size:10px;
margin-top:-19px;
margin-left:20px;">COMPRESION Y FUGAS DEL MOTOR {{$peritaje->compresioncontrol->nivelaprobado}}%</p>
<table style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>COMPRESION</th>
     <th>FUGA</th>
     

 </tr>
 @foreach($peritaje->compresioncontrol->compresionparts as $compresion)
 <tr>
     <td>{{ $compresion->compresionpart->name }}</td>
     <td>{{ $compresion->compresion }}</td>
     <td>{{ $compresion->fuga }}</td>
     
      
 </tr>
 @endforeach
 <tr>
    
     <th>PROMEDIOS</th>
     <th>{{round($peritaje->compresioncontrol->compresionparts->avg('compresion'),2).'PSI'}}</th>
     <th>{{round($peritaje->compresioncontrol->compresionparts->avg('fuga'),2).'%'}}</th>
     

 </tr>
</table>
<textarea style="font-size: xx-small;  width: 150px;"   readonly>{{$peritaje->compresioncontrol->observacion}}</textarea>


            </div> 
            @endif
        </th>
    </tr>
</table> 
{{--fin de compresion y luces--}}
<br>
{{--  freno--}}
 <p>
    <table   style="font-size: xx-small" >
      
        <tr>
        <th>
            @if(isset($peritaje->simetria)) 
            <div class="col-10"   style=" 
            width: 300px;
            border-top-width: 20px; 
            border-right-width: thin;
            
            border-bottom-width: thin; 
            border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
           
            <p style="font-size: small;
              font-size:10px;
               margin-top:-19px;
                margin-left:20px;">SIMETRIA {{$peritaje->simetria->nivelaprobado}}%</p>
            
            <p>
            
            <p> 
            
            
            
            <table   style="font-size: small; margin: 0 auto;">
            <tr>
            
            <td> {{$peritaje->simetria->sderecho}}mm</td>
            <td> {{$peritaje->simetria->smedio}}mm</td>
            <td> {{$peritaje->simetria->sizquierdo}}mm</td>
            
            
            
            </tr>
            
            <tr>
            <td COLSPAN=3 > <img  style="width: 250px;
                height: 200px;"  src="{{ public_path('./iconos/chasis.jpg')}}"> </td>
            
            </tr>
            <tr>
            
            
            <td> {{$peritaje->simetria->iderecho}}{{'mm'}}</td>
            <td> {{$peritaje->simetria->imedio}}mm</td>
            <td> {{$peritaje->simetria->iizquierdo}}mm</td>
            
            </tr>
            
            </table>
            
            
            
                              
                        
                        
                        <label style="font-size: small;">OBSERVACION</label><p>
                        
                        <textarea id="observacion" readonly name="observacion" style="font-size: small;  width: 250px;">{{$peritaje->simetria->observacion}}</textarea>
                        
                                           
                
            
                </div>  
                @endif

 </th>
    <th>
        @if(isset($peritaje->frenocontrol->frenoparts))
<div class="col-10"   style=" 
          width: 300px;
        border-top-width: 20px; 
       border-right-width: thin;
      
        border-bottom-width: thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
            font-size:10px;
             margin-top:-19px;
              margin-left:20px;"> PRUEBA DE FRENOS {{$peritaje->frenocontrol->nivelaprobado}}%</p>
<table   style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>EFICIENCIA</th>
     <th>MINIMO</th>
     <th>FUERZA</th>
     <th>PESO</th>
     <th>UNIDAD</th>
 {{--    <th>TIPO</th>
     <th>OBSERVACION</th>--}}

 </tr>
 @foreach($peritaje->frenocontrol->frenoparts as $freno)
 <tr>
     <td>{{ $freno->frenopart->name }}</td>
     <td>{{ $freno->eficiencia }}</td>
     <td>{{ $freno->minimo }}</td>
     <td>{{ $freno->fuerza }}</td>
     <td>{{ $freno->peso }}</td>
     <td>{{ $freno->unidad }}</td>

   
      
 </tr>
 @endforeach
</table>

<textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->frenocontrol->observacion}}</textarea>





        </div>
        @endif
    </th>
</tr>
</table> 

       <p> 
        @if(isset($peritaje->emisiongas))  
        <div class="col-10"   style=" 
        width: 600px;
      border-top-width: 20px; 
     border-right-width: thin;
    
      border-bottom-width: thin; 
      border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
 
<p style="font-size: xx-small;
          font-size:10px;
           margin-top:-19px;
            margin-left:20px;">EMISION DE GASES</p>





<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">
  
   <th COLSPAN=2>MONOXICO DE CARBONO CO</th>
   <th COLSPAN=2>DIOXIDO DE CARBONO CO2</th>
   <th COLSPAN=2>OXIGENO O2</th>
   <th COLSPAN=2>HIDROCARBUROS HC</th>
   <th COLSPAN=2>OXIDO NITROSO NO</th>
   <th>UNIDAD</th>
   

</tr>

<tr>
   <td>NORMA </td>
   <td>VALOR</td>
   <td>NORMA </td>
   <td>VALOR</td>
   <td>NORMA </td>
   <td>VALOR</td>
   <td>NORMA </td>
   <td>VALOR</td>
   <td>NORMA </td>
   <td>VALOR</td>
</tr>
<tr>  emisiongas
   <td> {{$peritaje->emisiongas->conorma}}</td>
   <td> {{$peritaje->emisiongas->covlr}}</td>
   <td> {{$peritaje->emisiongas->codosnorma}}</td>
   <td> {{$peritaje->emisiongas->codosvlr}}</td>
   <td> {{$peritaje->emisiongas->oxnorma}}</td>
   <td> {{$peritaje->emisiongas->oxvlr}}</td>
   
   <td> {{$peritaje->emisiongas->hcnorma}}</td>
   <td> {{$peritaje->emisiongas->hcvlr}}</td>
   <td> {{$peritaje->emisiongas->nonorma}}</td>
   <td> {{$peritaje->emisiongas->novlr}}</td>
   <td> {{$peritaje->emisiongas->unidad}}</td>
   
    
</tr>

</table>


<label style="font-size: xx-small;">OBSERVACION</label><p>

<textarea id="observacion" readonly name="observacion" style="font-size: xx-small;  width: 400px;">{{$peritaje->emisiongas->observacion}}</textarea>

                 

<p>

</div>  
@endif
   
{{---fin de gases y frenos--}}

{{--equipo y sofwware--}}
<table   style="font-size: xx-small" >
      
    <tr>
    <th>
        @if(isset($peritaje->equipocontrol->equipoparts))

<div class="col-10"   style=" 
          width: 350px;
        border-top-width: 20px; 
       border-right-width: thin;
      
        border-bottom-width: thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
            font-size:10px;
             margin-top:-19px;
              margin-left:20px;">EQUIPOS UTILIZADOS</p>
<table   style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>EQUIPO</th>
     <th>MARCA</th>
     <th>SERAIL</th>
     <th>BANCO</th>
     <th>PEF</th>
     <th>LTOE</th>
 {{--    <th>TIPO</th>
     <th>OBSERVACION</th>--}}

 </tr>
 @foreach($peritaje->equipocontrol->equipoparts as $equipo)
 <tr>
     <td>{{ $equipo->equipopart->name }}</td>
     <td>{{ $equipo->equipopart->marca }}</td>
     <td>{{ $equipo->equipopart->serial }}</td>
     <td>{{ $equipo->equipopart->banco }}</td>
     <td>{{ $equipo->equipopart->pef }}</td>
     <td>{{ $equipo->equipopart->ltoe }}</td>

  {{--  <td>{{ $esterior->tipo }}</td>
     <td>{{ $esterior->observaciones }}</td>--}}
      
 </tr>
 @endforeach
</table>




<textarea style="font-size: xx-small;  width: 230px;"   readonly>{{$peritaje->equipocontrol->observacion}}</textarea>





        </div>
        @endif
    </th>
    <th>
        @if(isset($peritaje->swcontrol->swparts))
            <div class="col-10"   style="
              width: 250px;
            border-top-width: 20px;
            border-right-width: thin;
            border-bottom-width: thin;
            border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
font-size:10px;
margin-top:-19px;
margin-left:20px;">SOFTWARE Y/O APLICATIVO UTILIZADO </p>
<table style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>APLICACION</th>
     <th>VERSION</th>
     <th>DISPOSITIVO</th>
    
     

 </tr>
 @foreach($peritaje->swcontrol->swparts as $sw)
 <tr>
     <td>{{ $sw->swpart->name }}</td>
     <td>{{ $sw->version }}</td>
     <td>{{ $sw->dispositivo }}</td>
     
     
      
 </tr>
 @endforeach
 
</table>
<textarea style="font-size: xx-small;  width: 200px;"   readonly>{{$peritaje->swcontrol->observacion}}</textarea>


            </div> 
            @endif
        </th>
    </tr>
</table> 
{{--fin de equpos y software--}}
</body>
@endguest
</html>

{{--
@endsection --}}
