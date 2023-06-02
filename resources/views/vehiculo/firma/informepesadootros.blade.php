<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1></h1>
  
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
 @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        
        .cssimagen {
            display: block;
            margin:1em;
             
            width:300px;
             height:250px;
             
        }
        @font-face {
    font-family: letrablack;
    src: url({{url('/css/SemiBold.otf')}});}
    @font-face {
    font-family: letralight;
    src: url({{url('/css/Light.otf')}});

}
@font-face {
    font-family: letraSemiBold;
    src: url({{url('/css/Medium.otf')}});

}
th{
  font-family: letrablack;
}
body,td{
  font-family: letraSemiBold;
}

strong{
  font-family: letralight;
  font-size: 0.9em;
}


        .text-justify {
  text-align: justify;
}
#t1{
  width: 900px;
  height: 180px;
    background-image: no-repeat;
    background-image: fixed;
    background-image: center;
    
    background-image:url({{url('/iconos/cabezapesadootros.jpg')}});
    
    
}
#t2{
  width: 900px;
  height: 47px;
    background-image: no-repeat;
    background-image: fixed;
    background-image: center;
    margin-top: 350px;  
    background-image:url({{url('/iconos/piedepagina.png')}});   
}
#t3{
  width: 900px;
  height: 47px;
    background-image: no-repeat;
    background-image: fixed;
    background-image: center;
    margin-top: 100px;  
    background-image:url({{url('/iconos/piedepagina.png')}});   
}
    #titulo {
       
font: bold 10px auto, verdana, sans-serif;
 text-shadow: rgba(0,0,0,0.5) 4px 4px 6px;
color: ;
margin: 10px 30px 0px 20px;
}
 
    </style>
     <title>INSPECCIÓN Nº  {{ $vehiculo->peritaje_id }} PLACA {{ $vehiculo->placa }}
      

    
    </title>
 
</head>
 
<body>
    <div id="t1">
        
    </div>
    
    @if($peritaje->cierre!=null && $peritaje->tarjeta!=null)
    <div class="col-11"   style=" width: 100%; border: 1px solid;">
  <table width="100%">
    <td width="80%">
        <p>N° INSPECCION {{$peritaje->id}}</p>
        <p style="font-size: small;">CERTIFICADO DE PERITAJE </p>
    <table   style="font-size: x-small; margin: 0 auto;"  >
                <tr>
                   
                    <th align="left">FECHA:</th>
                     <td colspan="3">{{ $peritaje->created_at}}</td>
                    <th></th>
                    <td></td>
                </tr>
               <tr>
                <th align="left">SOLICITANTE:</th>
                    <td colspan="3">{{ $peritaje->vehiculo->solicitante}}</td>
                    <th></th>
                    <td></td>
               </tr>
               <tr>
                <th align="left">{{$peritaje->vehiculo->tipoidentificacion }}:</th>
                <td>{{ $peritaje->vehiculo->numeroidentificacion}}</td>
                <th align="left">TELEFONO:</th>
                <td> {{$peritaje->vehiculo->telefono}}</td>
               </tr>
               <tr>
                <th align="left">CORREO:</th>
                    <td colspan="3">{{ $peritaje->vehiculo->email}}</td>
                    <th></th>
                    <td></td>
               </tr>
               <tr>
                <th align="left">SERVICIO SOLICITADO:</th>
                    <td colspan="3">{{ $peritaje->cierre->serviciosolicitado}}</td>
                    
               </tr>
               <tr>
                   
                <th align="left">CODIGO FASECOLDA:</th>
                 <td>{{ $peritaje->cierre->codigofasecolda}}</td>
                <th align="left">VALOR FASECOLDA:</th>
                 <td>${{ $peritaje->cierre->valorfasecolda }}</td>
               </tr>
               <tr>
                   
                <th align="left">VALOR {{$peritaje->cierre->empresa->razonsocial}}:</th>
                 <td>${{ $peritaje->cierre->valorcarvalue}}</td>
                <th align="left">VALOR ACCESORIOS:</th>
                 <td>${{ $peritaje->cierre->valoraccesorios }}</td>
               </tr>
               <tr>
                <th align="left">RESULTADO:</th>
                    <td colspan="3">{{ $peritaje->cierre->resultado}}</td>
                    
               </tr>
               <tr>
    </table>

</td>
    <td width="20%" align="right">
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
    </td>
  </table>
  <p style="font-size: small;">NOVEDADES EN LA INSPECCION</p>
  
  <P class="text-justify" style="font-size: x-small;  width: 500px;">{{$peritaje->cierre->observacion}}</p>
</div>
      <br>
   
    @if(isset($peritaje->vehiculo->placa) && isset($peritaje->tarjeta ))
   
   
   
    <div class="col-11"   style=" width: 100%; border: 1px solid;">
  
  <p style="font-size: small;"> DATOS DEL VEHICULO</p>
      
       
        
               
            <table  style="font-size: x-small; margin: 0 auto;" >
                <tr>
                   
                    <th align="left"  style="border-bottom:1pt solid black;">PLACA:</th>
                     <td align="left"  style="border-bottom:1pt solid black;">{{ $peritaje->vehiculo->placa}}</td>
                    <th  align="left"  style="border-bottom:1pt solid black;">NACIONALIDAD:</th>
                     <td align="left"  style="border-bottom:1pt solid black;">{{ $peritaje->tarjeta->nacionalidad }}</td>
                     <th  align="left"  style="border-bottom:1pt solid black;">VEHICULO</th>
                     <td align="left"  style="border-bottom:1pt solid black;">{{ $peritaje->vehiculo->clase_vehiculo }}</td>
                     
                     <th align="left"  style="border-bottom:1pt solid black;">SERVICIO</th>
                     <td align="left"  style="border-bottom:1pt solid black;"> {{$peritaje->tarjeta->servicio->nombre}}</td>
                    
                    
                </tr>
                
                <tr>
                    <th  align="left"  style="border-bottom:1pt solid black;">Nº LICENCIA</th>
                    <td align="left"  style="border-bottom:1pt solid black;">{{ $peritaje->tarjeta->licencia}}</td>
                    <th  align="left"  style="border-bottom:1pt solid black;">MODELO</th>
                    <td align="left"  style="border-bottom:1pt solid black;">{{ $peritaje->tarjeta->modelo}}</td>
                    <th  align="left"  style="border-bottom:1pt solid black;">COMBUSTIBLE</th>
                    <td align="left"  style="border-bottom:1pt solid black;"> {{$peritaje->tarjeta->combustible->nombre}}</td>
                  
                   <th  align="left"  style="border-bottom:1pt solid black;">N MOTOR</th>
                <td align="left"  style="border-bottom:1pt solid black;"> {{$peritaje->tarjeta->numero_motor}}</td>
                  
                </tr>
                
                 <tr>
                    <th  align="left"  style="border-bottom:1pt solid black;">FECHA MATRICULA:</th>
                    <td align="left"  style="border-bottom:1pt solid black;">{{ $peritaje->tarjeta->fecha_matricula}}</td>
                    <th  align="left"  style="border-bottom:1pt solid black;">COLOR</th>
                    <td align="left"  style="border-bottom:1pt solid black;"> {{$peritaje->tarjeta->color->nombre}}</td>
                    <th  align="left"  style="border-bottom:1pt solid black;">KILOMETRAJE</th>
                    <td align="left"  style="border-bottom:1pt solid black;">{{ $peritaje->vehiculo->km }}Km</td>
                    <th  align="left"  style="border-bottom:1pt solid black;">N SERIE</th>
                     <td align="left"  style="border-bottom:1pt solid black;"> {{$peritaje->tarjeta->numero_serie}}</td>
                </tr>
               <tr>
                <th  align="left"  style="border-bottom:1pt solid black;">TIPO MOTOR:</th>
                <td align="left"  style="border-bottom:1pt solid black;">{{ $peritaje->cierre->tipomotor}}</td>
                <th  align="left"  style="border-bottom:1pt solid black;">MARCA</th>
                <td align="left"  style="border-bottom:1pt solid black;"> {{$peritaje->tarjeta->marca->nombre}}</td>
                <th  align="left"  style="border-bottom:1pt solid black;">CILINDRADA CC</th>
                   <td align="left"  style="border-bottom:1pt solid black;">{{ $peritaje->tarjeta->cilindrada}}</td>
                  
                   <th  align="left"  style="border-bottom:1pt solid black;">N VIN</th>
                   <td align="left"  style="border-bottom:1pt solid black;"> {{$peritaje->tarjeta->numero_vin}}</td>
               
               
               </tr>  

               <tr>
                <th  align="left"  style="border-bottom:1pt solid black;">TIPO DE CAJA</th>
                <td align="left"  style="border-bottom:1pt solid black;">{{ $peritaje->cierre->tipocaja}}</td>
                <th  align="left"  style="border-bottom:1pt solid black;">LINEA</th>
                <td align="left"  style="border-bottom:1pt solid black;"> {{$peritaje->tarjeta->linea->nombre}}</td>
                
                     <th  align="left"  style="border-bottom:1pt solid black;">CAPACIDAD</th>
                     <td align="left"  style="border-bottom:1pt solid black;"> {{$peritaje->tarjeta->capacidad}}</td>
               
                <th  align="left"  style="border-bottom:1pt solid black;">N CHASIS</th>
                <td align="left"  style="border-bottom:1pt solid black;"> {{$peritaje->tarjeta->numero_chasis}}</td>
               </tr>
               <tr>
                <th  align="left"  style="border-bottom:1pt solid black;">MATRICULADO EN:</th>
                <td align="left"  style="border-bottom:1pt solid black;">{{ $peritaje->tarjeta->matriculado}}</td>
                <th  align="left"  style="border-bottom:1pt solid black;">PROPIETARIO:</th>
                <td align="left"  style="border-bottom:1pt solid black;"> {{$peritaje->tarjeta->propietario}}</td>
                
                     <th  align="left"  style="border-bottom:1pt solid black;">IDENTIFICACION:</th>
                     <td align="left"  style="border-bottom:1pt solid black;"> {{$peritaje->tarjeta->identificacion_propietario}}</td>
               
                <th  align="left"  style="border-bottom:1pt solid black;">TIPO PINTURA</th>
                <td align="left"  style="border-bottom:1pt solid black;"> {{$peritaje->cierre->tipopintura}}</td>
               </tr>
               <tr>
                <th  align="left"  colspan="3" bgcolor ="">FECHA VENCIMIENTO CERTIFICACO GNVC:</th>
                <td>{{ $peritaje->cierre->gnvc}}</td>
                
                
                     <th align="left"   bgcolor="">BLINDADO:</th>
                     <td> {{$peritaje->cierre->blindado}}</td>
               
                <th align="left"  bgcolor="">POLARIZADO:</th>
                <td> {{$peritaje->cierre->polarizado}}</td>
               </tr>
               
            </table>
            

        </div>
@endif
@endif
    <br>

{{--fotos tarjeta --}}
@if(isset($peritaje->fotocontrol->fotoparts))
@php ($fotos = []) @endphp
@foreach($peritaje->fotocontrol->fotoparts as $foto) 
            @if($foto->categoria=="TARJETA")
             @php $fotos[]=$foto @endphp
              @endif              
@endforeach
@if(count($fotos)==2)

<div style=" border-top-width: 20px;
border-right-width: thin;
border-bottom-width: thin; 
border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">


<p style="font-size:10px;
margin-top:-19px;
 margin-left:30px;">TARJETA DE PROPIEDAD</p>
<br>
<table style="margin: 0 auto;">
<td  align="center"  width="300px">   <img src="{{ url('imagen/'.$fotos[0]->imagen)}}" width="250px" height="200px"></td>
<td align="center"  width="300px"> <img src="{{ url('imagen/'.$fotos[1]->imagen)}}"  width="250px" height="200px"></td>

</table>

</div>
@endif
@endif
{{--fin de tarjeta--}}



<br>

<div style=" border-top-width: 20px;
     border-right-width: thin;
    border-bottom-width: thin;  
    border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">

    
    <p style="font-size: x-small;
    font-size:10px;
     margin-top:-19px;
      margin-left:30px;">IMPRONTAS DEL VEHICULO</p>

    <div style=" border-top-width: thin;
    border-right-width: thin;
    border-bottom-width: thin; 
   
    border-left-width: 1em;  border-radius: 5px 5px 5px 5px;  border-color:;">

    
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
   
    border-left-width: 1em;  border-radius: 5px 5px 5px 5px;  border-color:;">

    
<p style=" 
 margin-left:-15px;
width:15px;
word-wrap: break-word;
text-align:center;
 ">CHASIS</p>
    </div>

</div>
<div id="t2"></div>

<div style="page-break-after:always;"></div>





      {{--registro fotografico--}}
   
      @if(isset($peritaje->fotocontrol->fotoparts))
 @php ($fotos = []) @endphp
 @foreach($peritaje->fotocontrol->fotoparts as $foto) 
             @if($foto->categoria=="RECEPCION")
              @php $fotos[]=$foto @endphp
               @endif              
@endforeach
@if(count($fotos)>=4)
 
      <div class="col-11"  style=" border-top-width: 20px;
      border-right-width: thin;
     border-bottom-width: thin;  
     border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">
  
      
          <p style="font-size:10px;
          margin-top:-19px;
           margin-left:30px;"> REGISTRO FOTOGRAFICO</p>
      <table  width="90%" class="table table-bordered" style="font-size: small; margin: 0 auto;" >
          <tr>
      
          </tr>
         
        
       @php  $foto=$fotos;
      $c=count($foto)-1; @endphp
     @if($c==0)
   
     <td align="center"  width="300px">{{ $foto[0]->fotopart->name }}<br>
         <img  src="{{ url('imagen/'.$foto[0]->imagen)}}" width="250px" height="200px">
         <br>
                    {{ $foto[0]->observacion }}
        </td>
    
     @else
       @for($i=0;$i<$c;$i++)
      
       <tr>
                @if($i%2==0)  
         {{--     <td>{{ $foto[$i]->fotopart->name }}</td> --}}
              <td align="center"  width="300px">{{ $foto[$i]->fotopart->name }}<br>
                     <img   src="{{ url('imagen/'.$foto[$i]->imagen)}}" width="250px" height="200px" >
                    <br>
                    {{ $foto[$i]->observacion }}
                </td>
          
              @endif
            @if(($i+1)%2!=0)
              <td align="center"  width="300px">{{ $foto[$i+1]->fotopart->name }}<br>
                     <img  src="{{ url('imagen/'.$foto[$i+1]->imagen)}}" width="250px" height="200px" >
                     <br>
                    {{ $foto[$i+1]->observacion }}</td>
              @endif     
          </tr>
          @endfor
          @if($c%2==0)
              <td align="center"  width="300px">{{ $foto[$c]->fotopart->name }}<br>
                     <img   src="{{ url('./imagen/'.$foto[$c]->imagen)}}" width="250px" height="200px">
                     <br>
                    {{ $foto[$c]->observacion }}</td>
              @endif
        @endif
      </table> 
      </div>
      @endif
      @endif
  
  {{--fin de registro fotografico--}}


  @php 
if(isset($peritaje->paginadocontrol))
{
  $activochasis=0;
  foreach($peritaje->paginadocontrol->paginadoparts as $paginado)
  {
    if(($paginado->nombre=="REGISTRO FOTOGRAFICO"||$paginado->nombre=="LATONERIA") && $paginado->activo==1)
       $activochasis=1;
  }

 if($activochasis)
      echo "<div style='page-break-after:always;'></div>";
}
      @endphp

  {{-- inicio de latoneria o carroceria--}}
  @if(isset($peritaje->latoneriacontrol))
  <div class="col-11"  style=" border-top-width: 20px;
  border-right-width: thin;
 border-bottom-width: thin;  
 border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">

  @if($peritaje->latoneriacontrol->nivelaprobado!=0)
  <p style="font-size:10px;
  margin-top:-19px;
   margin-left:30px;">LATONERIA O CARROCERIA {{$peritaje->latoneriacontrol->nivelaprobado}}%</p>
@else
<p style="font-size:10px;
margin-top:-19px;
 margin-left:30px;">LATONERIA O CARROCERIA</p>
@endif

<table   style="font-size: x-small; margin: 0 auto;" >

<tr>
<th>
<br>


@if(isset($peritaje->latoneriacontrol->latoneriaparts))
<div class="col-10"   style=" width: 320px; border: 1px solid;">
<p > VISTA IZQUIERDA</p>
<table   style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">

<th>PIEZA</th>
<th>ESTADO</th>
<th>OBSERVACION</th>

</tr>
@foreach($peritaje->latoneriacontrol->latoneriaparts as $latoneria)
@if($latoneria->vista=="IZQUIERDA")
@php
$inspectorcarroceria[]=$latoneria->perito;
@endphp
<tr>
<td   align="left"  style="border-bottom:1pt solid black;">{{ $latoneria->latoneriapart->name }}</td>
<td  align="left"  style="border-bottom:1pt solid black;">{{ $latoneria->estado }}</td>
<td align="left"  style="border-bottom:1pt solid black;">{{ $latoneria->observaciones }}</td>

</tr>
@endif
@endforeach
</table>




<br>





  </div>
  @endif
</th>
<th>
  <br>
 
@if(isset($peritaje->latoneriacontrol->latoneriaparts))
<div class="col-10"   style=" width: 320px; border: 1px solid;">
<p> VISTA DERECHA </p>
<table   style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">

<th>PIEZA</th>
<th>ESTADO</th>
<th>OBSERVACION</th>

</tr>
@foreach($peritaje->latoneriacontrol->latoneriaparts as $latoneria)
@if($latoneria->vista=="DERECHA")
@php
$inspectorcarroceria[]=$latoneria->perito;
@endphp
<tr>
<td align="left"  style="border-bottom:1pt solid black;">{{ $latoneria->latoneriapart->name }}</td>
<td align="left"  style="border-bottom:1pt solid black;">{{ $latoneria->estado }}</td>
<td align="left"  style="border-bottom:1pt solid black;">{{ $latoneria->observaciones }}</td>

</tr>
@endif
@endforeach
</table>



<br>






</div>
@endif
       

  </th>
</tr>


<tr>
  <th>

<br>

@if(isset($peritaje->latoneriacontrol->latoneriaparts))
<div class="col-10"   style=" width: 320px;  border: 1px solid;">
<p> VISTA POSTERIOR</p>
<table   style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">
  
   <th>PIEZA</th>
   <th>ESTADO</th>
   <th>OBSERVACION</th>
    

</tr>
@foreach($peritaje->latoneriacontrol->latoneriaparts as $latoneria)
@if($latoneria->vista=="POSTERIOR")
@php
$inspectorcarroceria[]=$latoneria->perito;
@endphp
<tr>
   <td align="left"  style="border-bottom:1pt solid black;">{{ $latoneria->latoneriapart->name }}</td>
   <td align="left"  style="border-bottom:1pt solid black;">{{ $latoneria->estado }}</td>
   <td align="left"  style="border-bottom:1pt solid black;">{{ $latoneria->observaciones }}</td>
    
</tr>
@endif
@endforeach
</table>



<br>






      </div>
      @endif
  </th>
  <th>
      <br>
      
@if(isset($peritaje->latoneriacontrol->latoneriaparts))
<div class="col-10"   style=" width: 320px;  border: 1px solid;">
<p> VISTA FRONTAL </p>
<table   style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">

 <th>PIEZA</th>
 <th>ESTADO</th>
 <th>OBSERVACION</th>
  

</tr>
@foreach($peritaje->latoneriacontrol->latoneriaparts as $latoneria)
@if($latoneria->vista=="FRONTAL")
@php
$inspectorcarroceria[]=$latoneria->perito;
@endphp
<tr>
 <td align="left"  style="border-bottom:1pt solid black;">{{ $latoneria->latoneriapart->name }}</td>
 <td align="left"  style="border-bottom:1pt solid black;">{{ $latoneria->estado }}</td>
 <td align="left"  style="border-bottom:1pt solid black;">{{ $latoneria->observaciones }}</td>
 
  
</tr>
@endif
@endforeach
</table>


<br>







    </div>
    @endif     

      </th>
  </tr>
</table> 

  
<P class="text-justify" style="font-size: x-small;   margin: 10px;">{{$peritaje->latoneriacontrol->observacion}}</p>

   
      {{--registro fotografico--}}
   
      @if(isset($peritaje->fotocontrol->fotoparts))
 @php ($fotos = []) @endphp
 @foreach($peritaje->fotocontrol->fotoparts as $foto) 
             @if($foto->categoria=="LATONERIA O CARROCERIA")
              @php $fotos[]=$foto @endphp
               @endif              
@endforeach
@if(count($fotos)>0)
 
      <div class="col-11">
  
      
         
      <table width="90%" class="table table-bordered" style="font-size: small; margin: 0 auto;" >
          <tr>
      
          </tr>
         
        
       @php  $foto=$fotos;
      $c=count($foto)-1; @endphp
     @if($c==0)
   
     <td>{{ $foto[0]->fotopart->name }}<br>
         <img class="cssimagen" src="{{ url('imagen/'.$foto[0]->imagen)}}">
         <br>
                    {{ $foto[0]->observacion }}
        </td>
    
     @else
       @for($i=0;$i<$c;$i++)
      
       <tr>
                @if($i%2==0)  
         {{--     <td>{{ $foto[$i]->fotopart->name }}</td> --}}
              <td>{{ $foto[$i]->fotopart->name }}<br>
                     <img class="cssimagen" src="{{ url('imagen/'.$foto[$i]->imagen)}}" >
                    <br>
                    {{ $foto[$i]->observacion }}
                </td>
          
              @endif
            @if(($i+1)%2!=0)
              <td>{{ $foto[$i+1]->fotopart->name }}<br>
                     <img class="cssimagen" src="{{ url('imagen/'.$foto[$i+1]->imagen)}}" >
                     <br>
                    {{ $foto[$i+1]->observacion }}</td>
              @endif     
          </tr>
          @endfor
          @if($c%2==0)
              <td>{{ $foto[$c]->fotopart->name }}<br>
                     <img class="cssimagen" src="{{ url('./imagen/'.$foto[$c]->imagen)}}" >
                     <br>
                    {{ $foto[$c]->observacion }}</td>
              @endif
        @endif
      </table> 
      </div>
      @endif
      @endif
  
  {{--fin de registro fotografico--}}


  @php
           $inspectorcarroceria[]=$peritaje->latoneriacontrol->user->name;
           $inspectorcarroceria=array_unique($inspectorcarroceria); 
         @endphp
          <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
         @foreach ($inspectorcarroceria as $inspector )
       Inspector:  {{$inspector}} <br/>
         @endforeach
          </p> 


  </div>
  <br>
  @endif



    {{--fin de latoneria y carroceria--}}

 
@php 
if(isset($peritaje->paginadocontrol))
{
  $activochasis=0;
  foreach($peritaje->paginadocontrol->paginadoparts as $paginado)
  {
    if($paginado->nombre=="PINTURA" && $paginado->activo==1)
       $activochasis=1;
  }

 if($activochasis)
      echo "<div style='page-break-after:always;'></div>";
}
      @endphp



{{-- inicio de pintura--}}
@if(isset($peritaje->pinturacontrol))
<div class="col-11"  style=" border-top-width: 20px;
border-right-width: thin;
border-bottom-width: thin;  
border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">

@if($peritaje->pinturacontrol->nivelaprobado!=0)
<p style="font-size:10px;
margin-top:-19px;
 margin-left:30px;">PINTURA {{$peritaje->pinturacontrol->nivelaprobado}}%</p>
@else
<p style="font-size:10px;
margin-top:-19px;
margin-left:30px;">PINTURA</p>
@endif

<table   style="font-size: x-small; margin: 0 auto;" >

<tr>
<th>
<br>


@if(isset($peritaje->pinturacontrol->latoneriaparts))
<div class="col-10"   style=" width: 320px; border: 1px solid;">
<p > VISTA IZQUIERDA</p>
<table   style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">

<th>PIEZA</th>
<th>ESTADO</th>
<th>OBSERVACION</th>



</tr>
@foreach($peritaje->pinturacontrol->latoneriaparts as $pintura)
@if($pintura->vista=="IZQUIERDA")
@php
     $inspectorpintura[]=$pintura->perito;
 @endphp
<tr>
<td  align="left"  style="border-bottom:1pt solid black;">{{ $pintura->latoneriapart->name }}</td>
<td  align="left"  style="border-bottom:1pt solid black;">{{ $pintura->estado }}</td>
<td  align="left"  style="border-bottom:1pt solid black;">{{ $pintura->observaciones }}</td>


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
<div class="col-10"   style=" width: 320px; border: 1px solid;">
<p> VISTA DERECHA </p>
<table   style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">

<th>PIEZA</th>
<th>ESTADO</th>
<th>OBSERVACION</th>


</tr>
@foreach($peritaje->pinturacontrol->latoneriaparts as $pintura)
@if($pintura->vista=="DERECHA")
@php
     $inspectorpintura[]=$pintura->perito;
 @endphp
<tr>
<td align="left"  style="border-bottom:1pt solid black;">{{ $pintura->latoneriapart->name }}</td>
<td align="left"  style="border-bottom:1pt solid black;">{{ $pintura->estado }}</td>
<td align="left"  style="border-bottom:1pt solid black;">{{ $pintura->observaciones }}</td>


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
<div class="col-10"   style=" width: 320px;  border: 1px solid;">
<p> VISTA POSTERIOR</p>
<table   style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">

 <th>PIEZA</th>
 <th>ESTADO</th>
 <th>OBSERVACION</th>
  

</tr>
@foreach($peritaje->pinturacontrol->latoneriaparts as $pintura)
@if($pintura->vista=="POSTERIOR")
@php
     $inspectorpintura[]=$pintura->perito;
 @endphp
<tr>
 <td align="left"  style="border-bottom:1pt solid black;">{{ $pintura->latoneriapart->name }}</td>
 <td align="left"  style="border-bottom:1pt solid black;">{{ $pintura->estado }}</td>
 <td align="left"  style="border-bottom:1pt solid black;">{{ $pintura->observaciones }}</td>
 
  
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
<div class="col-10"   style=" width: 320px;  border: 1px solid;">
<p> VISTA FRONTAL </p>
<table   style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">

<th>PIEZA</th>
<th>ESTADO</th>
<th>OBSERVACION</th>


</tr>
@foreach($peritaje->pinturacontrol->latoneriaparts as $pintura)
@if($pintura->vista=="FRONTAL")
@php
     $inspectorpintura[]=$pintura->perito;
 @endphp
<tr>
<td align="left"  style="border-bottom:1pt solid black;">{{ $pintura->latoneriapart->name }}</td>
<td align="left"  style="border-bottom:1pt solid black;">{{ $pintura->estado }}</td>
<td align="left"  style="border-bottom:1pt solid black;">{{ $pintura->observaciones }}</td>

 
</tr>
@endif
@endforeach
</table>










  </div>
  @endif     

    </th>
</tr>
</table> 



<P class="text-justify" style="font-size: x-small;  margin: 10px;">{{$peritaje->pinturacontrol->observacion}}</p>
 
    {{--registro fotografico--}}
 
    @if(isset($peritaje->fotocontrol->fotoparts))
@php ($fotos = []) @endphp
@foreach($peritaje->fotocontrol->fotoparts as $foto) 
           @if($foto->categoria=="PINTURA")
            @php $fotos[]=$foto @endphp
             @endif              
@endforeach
@if(count($fotos)>0)

    <div class="col-11">

    
       
    <table width="90%" class="table table-bordered" style="font-size: small; margin: 0 auto;" >
        <tr>
    
        </tr>
       
      
     @php  $foto=$fotos;
    $c=count($foto)-1; @endphp
   @if($c==0)
 
   <td>{{ $foto[0]->fotopart->name }}<br>
       <img class="cssimagen" src="{{ url('imagen/'.$foto[0]->imagen)}}">
       <br>
                  {{ $foto[0]->observacion }}
      </td>
  
   @else
     @for($i=0;$i<$c;$i++)
    
     <tr>
              @if($i%2==0)  
       {{--     <td>{{ $foto[$i]->fotopart->name }}</td> --}}
            <td>{{ $foto[$i]->fotopart->name }}<br>
                   <img class="cssimagen" src="{{ url('imagen/'.$foto[$i]->imagen)}}" >
                  <br>
                  {{ $foto[$i]->observacion }}
              </td>
        
            @endif
          @if(($i+1)%2!=0)
            <td>{{ $foto[$i+1]->fotopart->name }}<br>
                   <img class="cssimagen" src="{{ url('imagen/'.$foto[$i+1]->imagen)}}" >
                   <br>
                  {{ $foto[$i+1]->observacion }}</td>
            @endif     
        </tr>
        @endfor
        @if($c%2==0)
            <td>{{ $foto[$c]->fotopart->name }}<br>
                   <img class="cssimagen" src="{{ url('./imagen/'.$foto[$c]->imagen)}}" >
                   <br>
                  {{ $foto[$c]->observacion }}</td>
            @endif
      @endif
    </table> 
    </div>
    @endif
    @endif

{{--fin de registro fotografico--}}


@php
$inspectorpintura[]=$peritaje->pinturacontrol->user->name;
$inspectorpintura=array_unique($inspectorpintura); 
@endphp
<p class="text-justify" style="font-size: x-small;  margin: 10px;" >
@foreach ($inspectorpintura as $inspector )
Inspector:  {{$inspector}} <br/>
@endforeach
</p> 


</div>
<br>
@endif



  {{--fin de pintura--}}


@php 
if(isset($peritaje->paginadocontrol))
{
  $activochasis=0;
  foreach($peritaje->paginadocontrol->paginadoparts as $paginado)
  {
    if($paginado->nombre=="VIDRIOS" && $paginado->activo==1)
       $activochasis=1;
  }

 if($activochasis)
      echo "<div style='page-break-after:always;'></div>";
}
@endphp

{{--inicio de vidrios--}}
@if(isset($peritaje->vidriocontrol->vidrioparts))

<div  class="col-10" style=" border-top-width: 20px;
border-right-width: thin;
border-bottom-width: thin;  
border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">
 <table   style="font-size: x-small;width: 100%; margin: 0 auto;" >
    
  <tr>
  <th>




  </th>
  <th>
    @if(isset($peritaje->vidriocontrol->vidrioparts))
    <div class="col-10"   style="  margin: 1em;  border: 1px solid;">
   @if($peritaje->vidriocontrol->nivelaprobado!=0)
      <p> REVISION DE VIDRIOS {{$peritaje->vidriocontrol->nivelaprobado}}%</p>
   
       
   @else
   <p> REVISION DE VIDRIOS</p>
   @endif
    <table   style="font-size: x-small; margin: 0 auto;">
        <tr bgcolor=""  style="border:1pt solid black;">
           
            <th>PIEZA</th>
            <th>ESTADO</th>
            <th>OBSERVACION</th>
        {{--    <th>TIPO</th>
            <th>OBSERVACION</th>--}}
   
        </tr>
        @foreach($peritaje->vidriocontrol->vidrioparts as $vidrio)
        <tr>
          @php
     $inspectorvidrio[]=$vidrio->perito;
      @endphp
            <td align="left"  style="border-bottom:1pt solid black;">{{ $vidrio->vidriopart->name }}</td>
            <td align="left"  style="border-bottom:1pt solid black;">{{ $vidrio->estado }}</td>
            <td align="left"  style="border-bottom:1pt solid black;">{{ $vidrio->observaciones }}</td>
         {{--  <td>{{ $esterior->tipo }}</td>
            <td>{{ $esterior->observaciones }}</td>--}}
             
        </tr>
        @endforeach
    </table>
   
   
     
       
    <P class="text-justify" style="font-size: x-small; margin: 10px;">{{$peritaje->vidriocontrol->observacion}}</p>
      
      @php
      $inspectorvidrio[]=$peritaje->vidriocontrol->user->name;
      $inspectorvidrio=array_unique($inspectorvidrio); 
    @endphp
     <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
    @foreach ($inspectorvidrio as $inspector )
  Inspector:  {{$inspector}} <br/>
    @endforeach
     </p> 
   
   
   
               </div>
               @endif

      </th>
  </tr>

{{--registro fotografico vidrios--}}
  
@if(isset($peritaje->fotocontrol->fotoparts))
@php ($fotos = []) @endphp
@foreach($peritaje->fotocontrol->fotoparts as $foto) 
            @if($foto->categoria=="VIDRIOS")
             @php $fotos[]=$foto @endphp
              @endif              
@endforeach
@if(count($fotos)>0)

     <div class="col-11">
 
     
        
     <table width="90%" class="table table-bordered" style="font-size: small; margin: 0 auto;" >
         <tr>
     
         </tr>
        
       
      @php  $foto=$fotos;
     $c=count($foto)-1; @endphp
    @if($c==0)
  
    <td> 
        <img class="cssimagen" src="{{ url('imagen/'.$foto[0]->imagen)}}">
        <br>
                   {{ $foto[0]->observacion }}
       </td>
   
    @else
      @for($i=0;$i<$c;$i++)
     
      <tr>
               @if($i%2==0)  
        {{--     <td>{{ $foto[$i]->fotopart->name }}</td> --}}
             <td> 
                    <img class="cssimagen" src="{{ url('imagen/'.$foto[$i]->imagen)}}" >
                   <br>
                   {{ $foto[$i]->observacion }}
               </td>
         
             @endif
           @if(($i+1)%2!=0)
             <td> 
                    <img class="cssimagen" src="{{ url('imagen/'.$foto[$i+1]->imagen)}}" >
                    <br>
                   {{ $foto[$i+1]->observacion }}</td>
             @endif     
         </tr>
         @endfor
         @if($c%2==0)
             <td> 
                    <img class="cssimagen" src="{{ url('./imagen/'.$foto[$c]->imagen)}}" >
                    <br>
                   {{ $foto[$c]->observacion }}</td>
             @endif
       @endif
     </table> 
     </div>
     @endif
     @endif
 
 {{--fin de registro fotografico de fuga y niveles--}}


</table> 


</div>
<br>
@endif
{{--fin de vidrios --}}








@php 
if(isset($peritaje->paginadocontrol))
{
  $activochasis=0;
  foreach($peritaje->paginadocontrol->paginadoparts as $paginado)
  {
    if($paginado->nombre=="CHASIS Y PARTES BAJAS"&& $paginado->activo==1)
       $activochasis=1;
  }

 if($activochasis)
      echo "<div style='page-break-after:always;'></div>";
}
@endphp



{{--chasis y partes bajas--}}
@if(isset($peritaje->chasiscontrol->chasisparts))
<div class="col-10" style=" border-top-width: 20px;
border-right-width: thin;
border-bottom-width: thin;  
border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">
<br>
<table   style="font-size: small;margin: 0 auto; width: 100%; " >
     
   <tr>
   <th>


        

<div   class="col-10"  style=" margin: 1em;  border: 1px solid;">
@if($peritaje->chasiscontrol->nivelaprobado!=0)
    <p> CHASIS {{$peritaje->chasiscontrol->nivelaprobado}}%</p>  
@else
<p> CHASIS</p>
@endif
    <table   style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">
   
    <th>PIEZA</th>
    <th>ESTADO</th>
    <th>OBSERVACION</th>
{{--    <th>TIPO</th>
    <th>OBSERVACION</th>--}}

</tr>
@foreach($peritaje->chasiscontrol->chasisparts as $chasis)
@php
     $inspectorchasis[]=$chasis->perito;
 @endphp
<tr>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $chasis->chasispart->name }}</td>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $chasis->estado }}</td>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $chasis->observaciones}}</td>
 {{--  <td>{{ $esterior->tipo }}</td>
    <td>{{ $esterior->observaciones }}</td>--}}
     
</tr>
@endforeach
 
</table>
<P class="text-justify" style="font-size: x-small;   margin: 10px;">{{$peritaje->chasiscontrol->observacion}}</p>
    @php
     $inspectorchasis[]=$peritaje->chasiscontrol->user->name;
    $inspectorchasis=array_unique($inspectorchasis); 
  @endphp
   <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
  @foreach ($inspectorchasis as $inspector )
Inspector:  {{$inspector}} <br/>
  @endforeach
   </p> 
</th>
<th>
    @if(isset($peritaje->bajacontrol->bajaparts))
    <div   class="col-10"  style=" margin: 1em;  border: 1px solid;">
   @if($peritaje->bajacontrol->nivelaprobado!=0)
        <p>PARTE BAJA {{$peritaje->bajacontrol->nivelaprobado}}%</p>   
   @else
   <p>PARTE BAJA</p>
   @endif
        <table style="font-size: x-small; margin: 0 auto;">
        <tr bgcolor=""  style="border:1pt solid black;">
           
            <th>PIEZA</th>
            <th>ESTADO</th>
            <th>OBSERVACION</th>
            
   
        </tr>
        @foreach($peritaje->bajacontrol->bajaparts as $baja)
        @php
     $inspectorbaja[]=$baja->perito;
 @endphp
        <tr>
            <td align="left"  style="border-bottom:1pt solid black;">{{ $baja->bajapart->name }}</td>
            <td align="left"  style="border-bottom:1pt solid black;">{{ $baja->estado }}</td>
            <td align="left"  style="border-bottom:1pt solid black;">{{ $baja->observaciones }}</td>
             
            
             
        </tr>
        @endforeach
       
    </table>
    <P class="text-justify" style="font-size: x-small;   margin: 10px;">{{$peritaje->bajacontrol->observacion}}</p>
        @php
        $inspectorbaja[]=$peritaje->bajacontrol->user->name;
              $inspectorbaja=array_unique($inspectorbaja); 
            @endphp
             <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
            @foreach ($inspectorbaja as $inspector )
          Inspector:  {{$inspector}} <br/>
            @endforeach
             </p> 
        @endif

</th>
</tr>
</table>




    {{--registro fotografico chasis--}}
   
    @if(isset($peritaje->fotocontrol->fotoparts))
    @php ($fotos = []) @endphp
    @foreach($peritaje->fotocontrol->fotoparts as $foto) 
                @if($foto->categoria=="CHASIS" || $foto->categoria=="PARTES BAJAS")
                 @php $fotos[]=$foto @endphp
                  @endif              
   @endforeach
   @if(count($fotos)>0)
    
         <div class="col-11">
     
         
            
         <table width="90%" class="table table-bordered" style="font-size: small; margin: 0 auto;" >
             <tr>
         
             </tr>
            
           
          @php  $foto=$fotos;
         $c=count($foto)-1; @endphp
        @if($c==0)
      
        <td> 
            <img class="cssimagen" src="{{ url('imagen/'.$foto[0]->imagen)}}">
            <br>
                       {{ $foto[0]->observacion }}
           </td>
       
        @else
          @for($i=0;$i<$c;$i++)
         
          <tr>
                   @if($i%2==0)  
            {{--     <td>{{ $foto[$i]->fotopart->name }}</td> --}}
                 <td> 
                        <img class="cssimagen" src="{{ url('imagen/'.$foto[$i]->imagen)}}" >
                       <br>
                       {{ $foto[$i]->observacion }}
                   </td>
             
                 @endif
               @if(($i+1)%2!=0)
                 <td> 
                        <img class="cssimagen" src="{{ url('imagen/'.$foto[$i+1]->imagen)}}" >
                        <br>
                       {{ $foto[$i+1]->observacion }}</td>
                 @endif     
             </tr>
             @endfor
             @if($c%2==0)
                 <td> 
                        <img class="cssimagen" src="{{ url('./imagen/'.$foto[$c]->imagen)}}" >
                        <br>
                       {{ $foto[$c]->observacion }}</td>
                 @endif
           @endif
         </table> 
         </div>
         @endif
         @endif
     
     {{--fin de registro fotografico chasis--}}





    

 {{-- <textarea style="font-size: x-small;  width: 250px;"   readonly>{{$peritaje->chasiscontrol->observacion}}</textarea>--}}




       </div>
     
 </div>
 <br>
 @endif

{{--fin de chasis --}}

@php 
if(isset($peritaje->paginadocontrol))
{
  $activochasis=0;
  foreach($peritaje->paginadocontrol->paginadoparts as $paginado)
  {
    if($paginado->nombre=="FUGAS Y NIVELES" && $paginado->activo==1)
       $activochasis=1;
  }

 if($activochasis)
      echo "<div style='page-break-after:always;'></div>";
}
@endphp



 {{--inicio fuga de fluidos y niveles--}}
 @if(isset($peritaje->nfluidocontrol->fluidoparts)||isset($peritaje->fluidocontrol->fluidoparts))
 <div  class="col-10" style=" border-top-width: 20px;
 border-right-width: thin;
 border-bottom-width: thin;  
 border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">
  <table   style="font-size: x-small;width: 100%; margin: 0 auto;" >
     
   <tr>
   <th>



@if(isset($peritaje->fluidocontrol->fluidoparts))
<div class="col-10"  style=" margin: 1em;  border: 1px solid;" >

@if($peritaje->fluidocontrol->nivelaprobado!=0)
    <p> FUGAS DE FLUIDOS {{$peritaje->fluidocontrol->nivelaprobado}}%</p>
     
@else
<p> FUGAS DE FLUIDOS</p>
@endif
    <table   style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">
   
    <th>PIEZA</th>
    <th>FUGA</th>
    <th>OBSERVACION</th>
{{--    <th>TIPO</th>
    <th>OBSERVACION</th>--}}

</tr>
@foreach($peritaje->fluidocontrol->fluidoparts as $fluido)
@php
     $inspectorfluido[]=$fluido->perito;
 @endphp
<tr>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $fluido->fluidopart->name }}</td>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $fluido->estado }}</td>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $fluido->observaciones }}</td>
 {{--  <td>{{ $esterior->tipo }}</td>
    <td>{{ $esterior->observaciones }}</td>--}}
     
</tr>
@endforeach
</table>




<P class="text-justify" style="font-size: x-small; margin: 10px;">{{$peritaje->fluidocontrol->observacion}}</p>
    @php
    
    $inspectorfluido[]=$peritaje->fluidocontrol->user->name;
    $inspectorfluido=array_unique($inspectorfluido); 
  @endphp
   <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
  @foreach ($inspectorfluido as $inspector )
Inspector:  {{$inspector}} <br/>
  @endforeach
   </p> 




       </div>
       @endif
   </th>
   <th>
<br>

@if(isset($peritaje->nfluidocontrol->fluidoparts))
<div class="col-10"     style=" margin: 1em;  border: 1px solid;">
@if($peritaje->nfluidocontrol->nivelaprobado!=0)
<p>NIVELES DE FLUIDOS {{$peritaje->nfluidocontrol->nivelaprobado}}%</p>  
@else
<p>NIVELES DE FLUIDOS</p>  
@endif
<table style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">
   
    <th>PIEZA</th>
    <th>ESTADO</th>
    <th>OBSERVACION</th>
   
    

</tr> 
@foreach($peritaje->nfluidocontrol->fluidoparts as $nfluido)
@php
    
 @endphp
<tr>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $nfluido->fluidopart->name }}</td>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $nfluido->estado }}</td>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $nfluido->observaciones}}</td>
    
    
    
     
</tr>
@endforeach

</table>
 
<P class="text-justify" style="font-size: x-small;  margin: 10px;">{{$peritaje->nfluidocontrol->observacion}}</p>
    @php
     $inspectornfluido[]=$peritaje->nfluidocontrol->user->name;
    $inspectornfluido=array_unique($inspectornfluido); 
  @endphp
   <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
  @foreach ($inspectornfluido as $inspector )
Inspector:  {{$inspector}} <br/>
  @endforeach
   </p> 

           </div> 
           @endif
       </th>
   </tr>

 {{--registro fotografico fugas y niveles--}}
   
 @if(isset($peritaje->fotocontrol->fotoparts))
 @php ($fotos = []) @endphp
 @foreach($peritaje->fotocontrol->fotoparts as $foto) 
             @if($foto->categoria=="NIVELES DE FLUIDOS" || $foto->categoria=="FUGAS DE FLUIDOS")
              @php $fotos[]=$foto @endphp
               @endif              
@endforeach
@if(count($fotos)>0)
 
      <div class="col-11">
  
      
         
      <table width="90%" class="table table-bordered" style="font-size: small; margin: 0 auto;" >
          <tr>
      
          </tr>
         
        
       @php  $foto=$fotos;
      $c=count($foto)-1; @endphp
     @if($c==0)
   
     <td> 
         <img class="cssimagen" src="{{ url('imagen/'.$foto[0]->imagen)}}">
         <br>
                    {{ $foto[0]->observacion }}
        </td>
    
     @else
       @for($i=0;$i<$c;$i++)
      
       <tr>
                @if($i%2==0)  
         {{--     <td>{{ $foto[$i]->fotopart->name }}</td> --}}
              <td> 
                     <img class="cssimagen" src="{{ url('imagen/'.$foto[$i]->imagen)}}" >
                    <br>
                    {{ $foto[$i]->observacion }}
                </td>
          
              @endif
            @if(($i+1)%2!=0)
              <td> 
                     <img class="cssimagen" src="{{ url('imagen/'.$foto[$i+1]->imagen)}}" >
                     <br>
                    {{ $foto[$i+1]->observacion }}</td>
              @endif     
          </tr>
          @endfor
          @if($c%2==0)
              <td> 
                     <img class="cssimagen" src="{{ url('./imagen/'.$foto[$c]->imagen)}}" >
                     <br>
                    {{ $foto[$c]->observacion }}</td>
              @endif
        @endif
      </table> 
      </div>
      @endif
      @endif
  
  {{--fin de registro fotografico de fuga y niveles--}}


</table> 

<br>
</div>
@endif
{{--fin de fugas de fluidos y niveles --}}




@php 
if(isset($peritaje->paginadocontrol))
{
  $activochasis=0;
  foreach($peritaje->paginadocontrol->paginadoparts as $paginado)
  {
    if($paginado->nombre=="EXTERIOR Y INTERIOR" && $paginado->activo==1)
       $activochasis=1;
  }

 if($activochasis)
      echo "<div style='page-break-after:always;'></div>";
}
@endphp

   
  {{--inicio exteriores y interior--}}
  @if(isset($peritaje->interiorcontrol->interiorparts)||isset($peritaje->exteriorcontrol->piezasexteriores))
  <div class="col-10"    style=" border-top-width: 20px;
 border-right-width: thin;
border-bottom-width: thin;  
border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">



    <table   style="font-size: x-small; width: 100%; margin: 0 auto;" >
      
        <tr>
        <th>



 @if(isset($peritaje->exteriorcontrol->piezasexteriores))
 <div class="col-10" 
 
 style=" margin: 1em;  border: 1px solid;">
   @if($peritaje->exteriorcontrol->nivelaprobado !=0)
   <p style="font-size: small;
     "> REVISION DE EXTERIORES {{$peritaje->exteriorcontrol->nivelaprobado}}%</p>
 @else
 <p style="font-size: small;
  "> REVISION DE EXTERIORES</p>
   @endif
 
 
 
 <table   style="font-size: x-small; margin: 0 auto;">
     <tr bgcolor=""  style="border:1pt solid black;">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
         <th>OBSERVACION</th>
     {{--    <th>TIPO</th>
         <th>OBSERVACION</th>--}}

     </tr>
     @foreach($peritaje->exteriorcontrol->piezasexteriores as $esterior)
     @php
     $inspectoresterior[]=$esterior->perito;
 @endphp

     <tr>
         <td align="left"  style="border-bottom:1pt solid black;" >{{ $esterior->exteriorpart->name }}</td>
         <td align="left"  style="border-bottom:1pt solid black;" >{{ $esterior->estado }}</td>
         <td align="left"  style="border-bottom:1pt solid black;" >{{ $esterior->observaciones }}</td>
      {{--  <td>{{ $esterior->tipo }}</td>
         <td>{{ $esterior->observaciones }}</td>--}}
          
     </tr>
     @endforeach


 </table>


  
    
 <P class="text-justify" style="font-size: x-small; margin: 10px;">{{$peritaje->exteriorcontrol->observacion}}</p>
   
    @php
     $inspectoresterior[]=$peritaje->exteriorcontrol->user->name;
    $inspectoresterior=array_unique($inspectoresterior); 
  @endphp
   <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
  @foreach ($inspectoresterior as $inspector )
Inspector:  {{$inspector}} <br/>
  @endforeach
   </p> 



            </div>
            @endif
        </th>
        <th>

           
 @if(isset($peritaje->interiorcontrol->interiorparts))
 <div class="col-10"     style=" margin: 1em;  border: 1px solid;">
   
   @if($peritaje->interiorcontrol->nivelaprobado!=0)
   <p style="font-size: small;">INTERIOR {{$peritaje->interiorcontrol->nivelaprobado}}%</p>
 @else 
 <p style="font-size: small;">INTERIOR</p>
 @endif
     
  
 
    <table style="font-size: x-small; margin: 0 auto;">
     <tr bgcolor=""  style="border:1pt solid black;">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
         <th>OBSERVACION</th>
         

     </tr>
     @foreach($peritaje->interiorcontrol->interiorparts as $interior)
     @php
     $inspectorinterior[]=$interior->perito;
 @endphp
     <tr>
         <td align="left"  style="border-bottom:1pt solid black;" >{{ $interior->interiorpart->name }}</td>
         <td align="left"  style="border-bottom:1pt solid black;" >{{ $interior->estado }}</td>
         <td align="left"  style="border-bottom:1pt solid black;" >{{ $interior->observaciones }}</td>
          
         
          
     </tr>
     @endforeach


  

      
 </table>
 <P class="text-justify" style="font-size: x-small;  margin: 10px;">{{$peritaje->interiorcontrol->observacion}}</p>
 
    @php
     $inspectorinterior[]=$peritaje->interiorcontrol->user->name;
    $inspectorinterior=array_unique($inspectorinterior); 
  @endphp
   <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
  @foreach ($inspectorinterior as $inspector )
Inspector:  {{$inspector}} <br/>
  @endforeach
   </p> 
                </div> 
                @endif
            </th>
        </tr>
 {{--registro fotografico fugas y niveles--}}
   
 @if(isset($peritaje->fotocontrol->fotoparts))
 @php ($fotos = []) @endphp
 @foreach($peritaje->fotocontrol->fotoparts as $foto) 
             @if($foto->categoria=="REVISION DE EXTERIORES" || $foto->categoria=="INTERIOR")
              @php $fotos[]=$foto @endphp
               @endif              
@endforeach
@if(count($fotos)>0)
 
      <div class="col-11">
  
      
         
      <table width="90%" class="table table-bordered" style="font-size: small; margin: 0 auto;" >
          <tr>
      
          </tr>
         
        
       @php  $foto=$fotos;
      $c=count($foto)-1; @endphp
     @if($c==0)
   
     <td> 
         <img class="cssimagen" src="{{ url('imagen/'.$foto[0]->imagen)}}">
         <br>
                    {{ $foto[0]->observacion }}
        </td>
    
     @else
       @for($i=0;$i<$c;$i++)
      
       <tr>
                @if($i%2==0)  
         {{--     <td>{{ $foto[$i]->fotopart->name }}</td> --}}
              <td> 
                     <img class="cssimagen" src="{{ url('imagen/'.$foto[$i]->imagen)}}" >
                    <br>
                    {{ $foto[$i]->observacion }}
                </td>
          
              @endif
            @if(($i+1)%2!=0)
              <td> 
                     <img class="cssimagen" src="{{ url('imagen/'.$foto[$i+1]->imagen)}}" >
                     <br>
                    {{ $foto[$i+1]->observacion }}</td>
              @endif     
          </tr>
          @endfor
          @if($c%2==0)
              <td> 
                     <img class="cssimagen" src="{{ url('./imagen/'.$foto[$c]->imagen)}}" >
                     <br>
                    {{ $foto[$c]->observacion }}</td>
              @endif
        @endif
      </table> 
      </div>
      @endif
      @endif
  
  {{--fin de registro fotografico de exteriores y interiores--}}




    </table> 
    </div>
    <br>
    @endif
    
    {{--FIN DE EXTERIOR Y INTERIOR--}}

@php 
if(isset($peritaje->paginadocontrol))
{
  $activochasis=0;
  foreach($peritaje->paginadocontrol->paginadoparts as $paginado)
  {
    if($paginado->nombre=="REVISION LUCES Y ELECTRICOS" && $paginado->activo==1)
       $activochasis=1;
  }

 if($activochasis)
      echo "<div style='page-break-after:always;'></div>";
}
@endphp

  

      {{--inicio electrico  y luces--}}
      @if(isset($peritaje->vlucescontrol->luzparts)||isset($peritaje->electricocontrol->piezaselectricas))
      <div class="col-10" 
 
      style=" border-top-width: 20px;
          border-right-width: thin;
         border-bottom-width: thin;  
         border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">
      <table   style="font-size: x-small; width: 100%; margin: 0 auto;" >
      
        <tr>
        <th>


           
 @if(isset($peritaje->vlucescontrol->luzparts))
 <div class="col-10" 
 
 style=" margin: 1em;  border: 1px solid;">
   @if($peritaje->vlucescontrol->nivelaprobado !=0)
   <p style="font-size: small;
     "> REVISION DE LUCES {{$peritaje->vlucescontrol->nivelaprobado}}%</p>
 @else
 <p style="font-size: small;
  "> REVISION DE LUCES</p>
   @endif
 
 
 
 <table   style="font-size: x-small; margin: 0 auto;">
     <tr bgcolor="" style="border:1pt solid black;">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
         <th>OBSERVACION</th>
     {{--    <th>TIPO</th>
         <th>OBSERVACION</th>--}}

     </tr>
     @foreach($peritaje->vlucescontrol->luzparts as $luces)
     @php
     $inspectorluces[]=$luces->perito;
 @endphp
     <tr>
         <td align="left"  style="border-bottom:1pt solid black;" >{{ $luces->luzpart->name }}</td>
         <td align="left"  style="border-bottom:1pt solid black;" >{{ $luces->estado }}</td>
         <td align="left"  style="border-bottom:1pt solid black;" >{{ $luces->observaciones }}</td>
      {{--  <td>{{ $esterior->tipo }}</td>
         <td>{{ $esterior->observaciones }}</td>--}}
          
     </tr>
     @endforeach


 </table>


  
    
 <P class="text-justify" style="font-size: x-small;  margin: 10px;">{{$peritaje->vlucescontrol->observacion}}</p>
   
    @php
     $inspectorluces[]=$peritaje->vlucescontrol->user->name;
    $inspectorluces=array_unique($inspectorluces); 
  @endphp
   <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
  @foreach ($inspectorluces as $inspector )
Inspector:  {{$inspector}} <br/>
  @endforeach
   </p> 



            </div>
            @endif
        </th>
        <th>

           
 @if(isset($peritaje->electricocontrol->piezaselectricas))
 <div class="col-10"      style=" margin: 1em;  border: 1px solid;">
   
   @if($peritaje->electricocontrol->nivelaprobado!=0)
   <p style="font-size: small;">EQUIPO ELECTRICO {{$peritaje->interiorcontrol->nivelaprobado}}%</p>
 @else 
 <p style="font-size: small;">EQUIPO ELECTRICO</p>
 @endif
     
  
 
    <table style="font-size: x-small; margin: 0 auto;">
     <tr bgcolor="" style="border:1pt solid black;">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
         <th>OBSERVACION</th>
         

     </tr>
     @foreach($peritaje->electricocontrol->piezaselectricas as $electrico)
     @php
     $inspectorelectrico[]=$electrico->perito;
 @endphp
     <tr>
         <td align="left"  style="border-bottom:1pt solid black;" >{{ $electrico->electricalpart->name }}</td>
         <td align="left"  style="border-bottom:1pt solid black;" >{{ $electrico->estado }}</td>
         <td align="left"  style="border-bottom:1pt solid black;" >{{ $electrico->observaciones }}</td>
          
         
          
     </tr>
     @endforeach


  

      
 </table>
 <P class="text-justify" style="font-size: x-small;  margin: 10px;">{{$peritaje->electricocontrol->observacion}}</p>
    @php
     $inspectorelectrico[]=$peritaje->electricocontrol->user->name;
    $inspectorelectrico=array_unique($inspectorelectrico); 
  @endphp
   <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
  @foreach ($inspectorelectrico as $inspector )
Inspector:  {{$inspector}} <br/>
  @endforeach
   </p>

                </div> 
                @endif
            </th>
        </tr>
 {{--registro fotografico luces y electrico--}}
   
 @if(isset($peritaje->fotocontrol->fotoparts))
 @php ($fotos = []) @endphp
 @foreach($peritaje->fotocontrol->fotoparts as $foto) 
             @if($foto->categoria=="LUCES" || $foto->categoria=="EQUIPOS ELECTRICOS")
              @php $fotos[]=$foto @endphp
               @endif              
@endforeach
@if(count($fotos)>0)
 
      <div class="col-11">
  
      
         
      <table width="90%" class="table table-bordered" style="font-size: small; margin: 0 auto;" >
          <tr>
      
          </tr>
         
        
       @php  $foto=$fotos;
      $c=count($foto)-1; @endphp
     @if($c==0)
   
     <td> 
         <img class="cssimagen" src="{{ url('imagen/'.$foto[0]->imagen)}}">
         <br>
                    {{ $foto[0]->observacion }}
        </td>
    
     @else
       @for($i=0;$i<$c;$i++)
      
       <tr>
                @if($i%2==0)  
         {{--     <td>{{ $foto[$i]->fotopart->name }}</td> --}}
              <td> 
                     <img class="cssimagen" src="{{ url('imagen/'.$foto[$i]->imagen)}}" >
                    <br>
                    {{ $foto[$i]->observacion }}
                </td>
          
              @endif
            @if(($i+1)%2!=0)
              <td> 
                     <img class="cssimagen" src="{{ url('imagen/'.$foto[$i+1]->imagen)}}" >
                     <br>
                    {{ $foto[$i+1]->observacion }}</td>
              @endif     
          </tr>
          @endfor
          @if($c%2==0)
              <td> 
                     <img class="cssimagen" src="{{ url('./imagen/'.$foto[$c]->imagen)}}" >
                     <br>
                    {{ $foto[$c]->observacion }}</td>
              @endif
        @endif
      </table> 
      </div>
      @endif
      @endif
  
  {{--fin de registro fotografico de electrico y luces--}}




    </table> 
    <br>
   

  </div>
  <br>
@endif
 {{--FIN DE electrico Y luces--}}

@php 
if(isset($peritaje->paginadocontrol))
{
  $activochasis=0;
  foreach($peritaje->paginadocontrol->paginadoparts as $paginado)
  {
    if($paginado->nombre=="FRENOS Y LLANTAS" && $paginado->activo==1)
       $activochasis=1;
  }

 if($activochasis)
      echo "<div style='page-break-after:always;'></div>";
}
@endphp

  {{-- llantas prueba de frenado--}}
  @if(isset($peritaje->frenocontrol->frenoparts)||isset($peritaje->llantacontrol->llantaparts))
  <div class="col-10" 
 
      style=" border-top-width: 20px;
          border-right-width: thin;
         border-bottom-width: thin;  
         border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">
<table   style="font-size: x-small; width: 100%;  margin: 0 auto;" >
     
    <tr>
    <th>
 <br>
 @if(isset($peritaje->frenocontrol->frenoparts))
<div class="col-10"   style=" width: 300px;  border: 1px solid; margin:10px;">
    @if($peritaje->frenocontrol->nivelaprobado!=0)
<p> PRUEBA DE FRENOS {{$peritaje->frenocontrol->nivelaprobado}}%</p>    
@else
<p> PRUEBA DE FRENOS</p>  
@endif
<table   style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">
   
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
@php
     $inspectorfreno[]=$freno->perito;
 @endphp
<tr>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $freno->frenopart->name }}</td>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $freno->eficiencia }}</td>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $freno->minimo }}</td>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $freno->fuerza }}</td>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $freno->peso }}</td>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $freno->unidad }}</td>

  
     
</tr>
@endforeach
</table>
<P class="text-justify" style="font-size: x-small;  width: 250px; margin: 10px;">EFICACIA DE FRENADO TOTAL :{{$peritaje->frenocontrol->frenadototal}}%</p>
    <P class="text-justify" style="font-size: x-small;  width: 250px; margin: 10px;">EFICACIA DE FRENADO AUXILIAR :{{$peritaje->frenocontrol->frenadoauxiliar}}%</p>
<P class="text-justify" style="font-size: x-small;  width: 250px; margin: 10px;">{{$peritaje->frenocontrol->observacion}}</p>

    @php
     $inspectorfreno[]=$peritaje->frenocontrol->user->name;
    $inspectorfreno=array_unique($inspectorfreno); 
  @endphp
   <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
  @foreach ($inspectorfreno as $inspector )
Inspector:  {{$inspector}} <br/>
  @endforeach
   </p> 



       </div>
       @endif
 
   
    </th>
    <th>
 <br>
 
 @if(isset($peritaje->llantacontrol->llantaparts))
 <div class="col-10"   style=" margin: 1em;  border: 1px solid;">
    @if($peritaje->llantacontrol->nivelaprobado!=0)
 <p>ESTADO DE LAS LLANTAS {{$peritaje->llantacontrol->nivelaprobado}}%</p>
 @else
 <p>ESTADO DE LAS LLANTAS</p>
 @endif
 <table style="font-size: x-small; margin: 0 auto;">
 <tr bgcolor=""  style="border:1pt solid black;">
    
     <th>PIEZA</th>
     <th>PARA CAMBIO</th>
     <th>VIDA UTIL</th>
     <th>LABRADO</th>
    
    
     
 
 </tr>
 @foreach($peritaje->llantacontrol->llantaparts as $llanta)
 @php
     $inspectorllanta[]=$llanta->perito;
 @endphp
 <tr>
     <td  align="left"  style="border-bottom:1pt solid black;">{{ $llanta->llantapart->name }}</td>
     <td  align="left"  style="border-bottom:1pt solid black;">{{ $llanta->cambio }}</td>
     <td  align="left"  style="border-bottom:1pt solid black;">{{ $llanta->vidautil }}%</td>
     <td  align="left"  style="border-bottom:1pt solid black;">{{ $llanta->labrado}}mm</td>
      
     
     
      
 </tr>
 @endforeach
 
 </table>
 <P class="text-justify" style="font-size: x-small;  margin: 10px;">{{$peritaje->llantacontrol->observacion}}</p>
    @php
     $inspectorllanta[]=$peritaje->llantacontrol->user->name;
    $inspectorllanta=array_unique($inspectorllanta); 
  @endphp
   <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
  @foreach ($inspectorllanta as $inspector )
Inspector:  {{$inspector}} <br/>
  @endforeach
   </p> 
 
            </div> 
            @endif
        </th>
    </tr>

{{--registro fotografico llantas--}}
   
@if(isset($peritaje->fotocontrol->fotoparts))
@php ($fotos = []) @endphp
@foreach($peritaje->fotocontrol->fotoparts as $foto) 
            @if($foto->categoria=="LLANTAS")
             @php $fotos[]=$foto @endphp
              @endif              
@endforeach
@if(count($fotos)>0)

     <div class="col-11">
 
     
        
     <table width="90%" class="table table-bordered" style="font-size: small; margin: 0 auto;" >
         <tr>
     
         </tr>
        
       
      @php  $foto=$fotos;
     $c=count($foto)-1; @endphp
    @if($c==0)
  
    <td> 
        <img class="cssimagen" src="{{ url('imagen/'.$foto[0]->imagen)}}">
        <br>
                   {{ $foto[0]->observacion }}
       </td>
   
    @else
      @for($i=0;$i<$c;$i++)
     
      <tr>
               @if($i%2==0)  
        {{--     <td>{{ $foto[$i]->fotopart->name }}</td> --}}
             <td> 
                    <img class="cssimagen" src="{{ url('imagen/'.$foto[$i]->imagen)}}" >
                   <br>
                   {{ $foto[$i]->observacion }}
               </td>
         
             @endif
           @if(($i+1)%2!=0)
             <td> 
                    <img class="cssimagen" src="{{ url('imagen/'.$foto[$i+1]->imagen)}}" >
                    <br>
                   {{ $foto[$i+1]->observacion }}</td>
             @endif     
         </tr>
         @endfor
         @if($c%2==0)
             <td> 
                    <img class="cssimagen" src="{{ url('./imagen/'.$foto[$c]->imagen)}}" >
                    <br>
                   {{ $foto[$c]->observacion }}</td>
             @endif
       @endif
     </table> 
     </div>
     @endif
     @endif
 
 {{--fin de registro fotografico de llantas--}}

 </table> 
 


</div>
<br>
@endif
{{--fin de prueba de frenado y llantas--}}

@php 
if(isset($peritaje->paginadocontrol))
{
  $activochasis=0;
  foreach($peritaje->paginadocontrol->paginadoparts as $paginado)
  {
    if($paginado->nombre=="COMPRESION MOTOR Y SUSPENSION MECANIZADA" && $paginado->activo==1)
       $activochasis=1;
  }

 if($activochasis)
      echo "<div style='page-break-after:always;'></div>";
}
@endphp


{{--compresion de motor--}}
@if(isset($peritaje->compresioncontrol->compresionparts)||isset($peritaje->suspensioncontrol->suspensionparts))
<div class="col-10" 
 
      style=" border-top-width: 20px;
          border-right-width: thin;
         border-bottom-width: thin;  
         border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">
<table   style="font-size: x-small;  margin: 0 auto;" >  
    <tr>
        @if(isset($peritaje->compresioncontrol->compresionparts))
        <th>
       
        

      
        <br>
        <img  src="{{ url('/iconos/motor.jpg')}}" style=" width: 150px;">
    </th>
    <th>

          
        <br>
        <div class="col-10"   style=" margin: 1em; width: 200px; border: 1px solid;">

@if($peritaje->compresioncontrol->nivelaprobado!=0)
<p>COMPRESION Y FUGAS DEL MOTOR {{$peritaje->compresioncontrol->nivelaprobado}}%</p>  
@else
<p>COMPRESION Y FUGAS DEL MOTOR</p> 
@endif
<table style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">

 <th>PIEZA</th>
 <th>COMPRESION</th>
 <th>FUGA</th>
 

</tr>
@foreach($peritaje->compresioncontrol->compresionparts as $compresion)
@php
     $inspectorcompresion[]=$compresion->perito;
 @endphp
<tr>
 <td align="left"  style="border-bottom:1pt solid black;">{{ $compresion->compresionpart->name }}</td>
 <td align="left"  style="border-bottom:1pt solid black;">{{ $compresion->compresion }}</td>
 <td align="left"  style="border-bottom:1pt solid black;">{{ $compresion->fuga }}</td>
 
  
</tr>
@endforeach
<tr>

 <th>PROMEDIOS</th>
 <th>{{round($peritaje->compresioncontrol->compresionparts->avg('compresion'),2).'PSI'}}</th>
 <th>{{round($peritaje->compresioncontrol->compresionparts->avg('fuga'),2).'%'}}</th>
 

</tr>
</table>



        </div> 
       
          <br>
          <P class="text-justify" style="font-size: x-small;  width: 300px;">{{$peritaje->compresioncontrol->observacion}}</p> 
            @php
             $inspectorcompresion[]=$peritaje->compresioncontrol->user->name;
              $inspectorcompresion=array_unique($inspectorcompresion); 
            @endphp
             <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
            @foreach ($inspectorcompresion as $inspector )
          Inspector:  {{$inspector}} <br/>
            @endforeach
             </p> 
        </th>
@endif
        <th>
            @if(isset($peritaje->suspensioncontrol->suspensionparts))
<div class="col-10"   style="margin: 1em; border: 1px solid;">
<p>SUSPENSION MECANIZADA: </p>
<table style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">
   
    <th>PIEZA</th>
    <th>PORCENTAJE</th>
   
    

</tr>
@foreach($peritaje->suspensioncontrol->suspensionparts as $suspension)

<tr>
    @if(isset($suspension->porcentaje))
    @php
   $inspectorsuspension[]=$suspension->perito;
    @endphp
    <td align="left"  style="border-bottom:1pt solid black;">{{ $suspension->suspensionpart->name }}</td>
    <td align="left"  style="border-bottom:1pt solid black;">{{ $suspension->porcentaje }}%</td>
     @endif
     
</tr>
@endforeach

</table>
<p class="text-justify" style="font-size: x-small;  margin: 10px;">LOS VALORES REGISTRADOS
    CORRESPONDEN A LA ADHERENCIA, EL
    VALOR MINIMO DEBE SER 40%.</p>
    @php
     $inspectorsuspension[]=$peritaje->suspensioncontrol->user->name;
    $inspectorsuspension=array_unique($inspectorsuspension); 
  @endphp
   <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
  @foreach ($inspectorsuspension as $inspector )
Inspector:  {{$inspector}} <br/>
  @endforeach
   </p> 

           </div> 
           @endif
        </th>
    </tr>
</table> 
</div>
<br>
@endif
{{--fin de compresion suspension mecanizado--}}

@php 
if(isset($peritaje->paginadocontrol))
{
  $activochasis=0;
  foreach($peritaje->paginadocontrol->paginadoparts as $paginado)
  {
    if($paginado->nombre=="RESULTADO LUCES Y ESTADO SUSPENSION" && $paginado->activo==1)
       $activochasis=1;
  }

 if($activochasis)
      echo "<div style='page-break-after:always;'></div>";
}
@endphp


{{--compresion de motor revision de luces--}}
@if( isset($peritaje->suspensioncontrol->suspensionparts)|| isset($peritaje->luzcontrol->luzparts))

<div class="col-10" 
 
      style=" border-top-width: 20px;
          border-right-width: thin;
         border-bottom-width: thin;  
         border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">
<table   style="font-size: x-small;  margin: 0 auto;" >  
    <tr>
    <th>

        <br>

       
        @if(isset($peritaje->luzcontrol->luzparts))
        <div class="col-10"   style=" margin: 1em;width: 370px;  border: 1px solid;">
       
        @if($peritaje->luzcontrol->nivelaprobado!=0)
 <p>RESULTADO DE LUCES {{$peritaje->luzcontrol->nivelaprobado}}%</p>
 @else
 <p>RESULTADO DE LUCES</p>
 @endif
       
       
       
        <table   style="font-size: x-small; margin: 0 auto;">
         <tr bgcolor=""  style="border:1pt solid black;">
            
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
          @php
          $inspectorluz[]=$luz->perito;
          @endphp
             <td align="left"  style="border-bottom:1pt solid black;">{{ $luz->luzpart->name }}</td>
             <td align="left"  style="border-bottom:1pt solid black;">{{ $luz->intensidad }}</td>
             <td align="left"  style="border-bottom:1pt solid black;">{{ $luz->minimo }}</td>
             <td align="left"  style="border-bottom:1pt solid black;">{{ $luz->unidad }}</td>
             <td align="left"  style="border-bottom:1pt solid black;">{{ $luz->inclinacion }}</td>
             <td align="left"  style="border-bottom:1pt solid black;">{{ $luz->rango }}</td>
        
          {{--  <td>{{ $esterior->tipo }}</td>
             <td>{{ $esterior->observaciones }}</td>--}}
              
         </tr>
         @endforeach
        </table>
        
        
        
        
        <p  class="text-justify" style="font-size: x-small;  margin: 10px;" >{{$peritaje->luzcontrol->observacion}}</p>
        
        <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
          
          @php
          $inspectorluz[]=$peritaje->luzcontrol->user->name;
          $inspectorluz=array_unique($inspectorluz); 
        @endphp
         <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
        @foreach ($inspectorluz as $inspector )
      Inspector:  {{$inspector}} <br/>
        @endforeach
         </p>
        
      
        
                </div>
                @endif
    </th>
    <th>

      @if(isset($peritaje->suspensioncontrol->suspensionparts))
      
     
        <div class="col-10"   style=" margin: 1em;width: 300px;  border: 1px solid;">
       
          @if($peritaje->suspensioncontrol->nivelaprobado!=0)
          <p>ESTADO DE LA SUSPENSION {{$peritaje->suspensioncontrol->nivelaprobado}}%</p>
   @else
   <p>ESTADO DE LA SUSPENSION</p>
   @endif
     
     
     
       
      <table style="font-size: x-small; margin: 0 auto;">
      <tr bgcolor=""  style="border:1pt solid black;">
         
          <th>PIEZA</th>
          <th>ESTADO</th>
          <th>OBSERVACION</th>
         
          
      
      </tr>
      @foreach($peritaje->suspensioncontrol->suspensionparts as $suspension)
      <tr>
        @if(!isset($suspension->porcentaje))
        @php
     $inspectorsuspension2[]=$suspension->perito;
 @endphp

          <td align="left"  style="border-bottom:1pt solid black;">{{ $suspension->suspensionpart->name }}</td>
          <td align="left"  style="border-bottom:1pt solid black;">{{ $suspension->estado }}</td>
          <td align="left"  style="border-bottom:1pt solid black;">{{ $suspension->observaciones }}</td>
         @endif  
           
      </tr>
      @endforeach
      
      </table>
      <p  class="text-justify" style="font-size: x-small;  margin: 10px;" >{{$peritaje->suspensioncontrol->observacion}}</p>
      @php
              $inspectorsuspension2[]=$peritaje->suspensioncontrol->user->name;
              $inspectorsuspension=array_unique($inspectorsuspension2); 
            @endphp
             <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
            @foreach ($inspectorsuspension as $inspector )
          Inspector:  {{$inspector}} <br/>
            @endforeach
             </p> 
      
                 </div> 
                 @endif
        </th>
    </tr>
</table> 

  </div>
  <br>
  @endif 
{{--fin de compresion y luces --}}

@php 
if(isset($peritaje->paginadocontrol))
{
  $activochasis=0;
  foreach($peritaje->paginadocontrol->paginadoparts as $paginado)
  {
    if($paginado->nombre=="EMISION DE GASES" && $paginado->activo==1)
       $activochasis=1;
  }

 if($activochasis)
      echo "<div style='page-break-after:always;'></div>";
}
@endphp

{{--gases--}}
@if(isset($peritaje->emisiongas) && isset($peritaje->tarjeta))  

<div class="col-10" 
 
      style=" border-top-width: 20px;
          border-right-width: thin;
         border-bottom-width: thin;  
         border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">
<p  style="font-size: small;
font-size:10px;
 margin-top:-19px;
  margin-left:20px;">EMISION DE GASES</p>
  <br>
<div class="col-10"   style=" width: 890px;  border: 1px solid;  margin: 0 auto;">

  @if($peritaje->tarjeta->combustible->nombre=="DIESEL") 

<table   style="font-size: small; margin: 0 auto;">
      
      
  <tr>
   <td> </td>
      <td>Ciclo 1 </td>
      <td>Unidad</td>
      <td>Ciclo 2 </td>
      <td>Unidad</td>
      <td>Ciclo 3 </td>
      <td>Unidad</td>
      <td>Ciclo 4 </td>
      <td>Unidad</td>
  </tr>
  <tr> <td><p   style="width : 70px; heigth : 10px;font-size: x-small">OPACIDAD</p></td>
   <td><input value="{{$peritaje->emisiongas->opacidadcuno}}" id="opacidadcuno" name="opacidadcuno" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
   <td><input value="{{$peritaje->emisiongas->opacidadcunou}}"  id="opacidadcunou" name="opacidadcunou" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required  value="%"></td>
   <td><input value="{{$peritaje->emisiongas->opacidadcdos}}" id="opacidadcdos" name="opacidadcdos" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required   ></td>
   <td><input value="{{$peritaje->emisiongas->opacidadcdosu}}" id="opacidadcdosu" name="opacidadcdosu" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required  value="%" ></td>
   <td><input value="{{$peritaje->emisiongas->opacidadctres}}" id="opacidadctres" name="opacidadctres" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
   <td><input value="{{$peritaje->emisiongas->opacidadctresu}}" id="opacidadctresu" name="opacidadctresu" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required  value="%" ></td>
   <td><input value="{{$peritaje->emisiongas->opacidadccuatro}}" id="opacidadccuatro" name="opacidadccuatro" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
   <td><input value="{{$peritaje->emisiongas->opacidadccuatrou}}" id="opacidadccuatrou" name="opacidadccuatrou" type="text" style="width : 70px; heigth : 10px;font-size: x-small" required   value="%"></td>
      
      
       
  </tr>
  <tr> <td><p   style="width : 70px; heigth : 10px;font-size: x-small">GOBERNADA</p></td>
   <td><input value="{{$peritaje->emisiongas->gobernadacuno}}" id="gobernadacuno" name="gobernadacunocuno" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
   <td><input value="{{$peritaje->emisiongas->gobernadacunou}}" id="gobernadacunocunou" name="gobernadacunocunou" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required  value="rpm"></td>
   <td><input value="{{$peritaje->emisiongas->gobernadacdos}}" id="gobernadacdos" name="gobernadacunocdos" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required   ></td>
   <td><input value="{{$peritaje->emisiongas->gobernadacdosu}}" id="gobernadacdosu" name="gobernadacunocdosu" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required  value="rpm" ></td>
   <td><input value="{{$peritaje->emisiongas->gobernadactres}}" id="gobernadactres" name="gobernadacunoctres" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
   <td><input value="{{$peritaje->emisiongas->gobernadactresu}}"  id="gobernadactresu" name="gobernadacunoctresu" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required  value="rpm" ></td>
   <td><input value="{{$peritaje->emisiongas->gobernadaccuatro}}"  id="gobernadaccuatro" name="gobernadacunoccuatro" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
   <td><input  value="{{$peritaje->emisiongas->gobernadaccuatrou}}" id="gobernadaccuatrou" name="gobernadacunoccuatrou" type="text" style="width : 70px; heigth : 10px;font-size: x-small" required   value="rpm"></td>
   
   
    
 </tr>
 </tr>
 <tr> <td><p   style="width : 60px; heigth : 10px;font-size: x-small">Valor:</p></td>
  <td><input  value="{{$peritaje->emisiongas->resultado}}" id="resultado" name="resultado" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><p   style="width : 60px; heigth : 10px;font-size: x-small">Norma:</p></td>
  <td><input  value="{{$peritaje->emisiongas->norma}}" id="norma" name="norma" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
  <td><p   style="width : 60px; heigth : 10px;font-size: x-small">Unidad:</p></td>
  <td><input  value="{{$peritaje->emisiongas->unidad}}" id="unidad" name="unidad" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required    ></td>
   
  
   
  
  
   
 </tr>
  
 </table>
 @else
 <table   style="font-size: small; margin:10px;">
  <tr bgcolor=""  style="border:1pt solid black;">
     <th></th>
      <th COLSPAN=3>MONOXICO DE CARBONO CO</th>
      <th COLSPAN=3>DIOXIDO DE CARBONO CO2</th>
      <th COLSPAN=3>OXIGENO O2</th>
      <th COLSPAN=3>HIDROCARBUROS HC</th>
      <th COLSPAN=3>OXIDO NITROSO NO</th>
   
      
 
  </tr>
   
  <tr style="border-bottom:1pt solid black;">
   <td></td>
      <td>NORMA </td>
      <td>VALOR</td>
      <td>UNIDAD</td>
      <td>NORMA </td>
      <td>VALOR</td>
      <td>UNIDAD</td>
      <td>NORMA </td>
      <td>VALOR</td>
      <td>UNIDAD</td>
      <td>NORMA </td>
      <td>VALOR</td>
      <td>UNIDAD</td>
      <td>NORMA </td>
      <td>VALOR</td>
      <td>UNIDAD</td>
  </tr>
  <tr style="border-bottom:1pt solid black;">
   <td><p   style="width : 45px; heigth : 10px;font-size: x-small">Relenti</p></td>
      <td> {{$peritaje->emisiongas->conorma}}</td>
      <td> {{$peritaje->emisiongas->covlr}}</td>
      <td> {{$peritaje->emisiongas->counidad}}</td>
      <td> {{$peritaje->emisiongas->codosnorma}}</td>
      <td> {{$peritaje->emisiongas->codosvlr}}</td>
      <td> {{$peritaje->emisiongas->codosunidad}}</td>
      <td> {{$peritaje->emisiongas->oxnorma}}</td>
      <td> {{$peritaje->emisiongas->oxvlr}}</td>
      <td> {{$peritaje->emisiongas->oxunidad}}</td>
      
      <td> {{$peritaje->emisiongas->hcnorma}}</td>
      <td> {{$peritaje->emisiongas->hcvlr}}</td>
      <td> {{$peritaje->emisiongas->hcunidad}}</td>
      <td> {{$peritaje->emisiongas->nonorma}}</td>
      <td> {{$peritaje->emisiongas->novlr}}</td>
      <td> {{$peritaje->emisiongas->nounidad}}</td>
      
       
  </tr>
  
  <tr style="border-bottom:1pt solid black;">
   <td><p   style="width : 45px; heigth : 10px;font-size: x-small">Crucero</p></td>
   <td> {{$peritaje->emisiongas->conormac}}</td>
   <td> {{$peritaje->emisiongas->covlrc}}</td>
   <td> {{$peritaje->emisiongas->counidadc}}</td>
   <td> {{$peritaje->emisiongas->codosnormac}}</td>
   <td> {{$peritaje->emisiongas->codosvlrc}}</td>
   <td> {{$peritaje->emisiongas->codosunidadc}}</td>
   <td> {{$peritaje->emisiongas->oxnormac}}</td>
   <td> {{$peritaje->emisiongas->oxvlrc}}</td>
   <td> {{$peritaje->emisiongas->oxunidadc}}</td>
   
   <td> {{$peritaje->emisiongas->hcnormac}}</td>
   <td> {{$peritaje->emisiongas->hcvlrc}}</td>
   <td> {{$peritaje->emisiongas->hcunidadc}}</td>
   <td> {{$peritaje->emisiongas->nonormac}}</td>
   <td> {{$peritaje->emisiongas->novlrc}}</td>
   <td> {{$peritaje->emisiongas->nounidadc}}</td>
   
    
</tr>
  
 </table>

@endif 



<p class="text-justify" style="font-size: x-small;  margin: 10px;" >
    Inspector:  {{$peritaje->emisiongas->user->name}}</p>

<p><label style="font-size: x-small;  margin: 10px;">OBSERVACION</label></p>

<p  class="text-justify" style="font-size: x-small;  margin: 10px;">{{$peritaje->emisiongas->observacion}}</p>

                

<p>

</div>  


</div>
<br>


@endif
{{---fin de gases --}}

@php 
if(isset($peritaje->paginadocontrol))
{
  $activochasis=0;
  foreach($peritaje->paginadocontrol->paginadoparts as $paginado)
  {
    if($paginado->nombre=="PARTES DEL MOTOR Y ESCANER" && $paginado->activo==1)
       $activochasis=1;
  }

 if($activochasis)
      echo "<div style='page-break-after:always;'></div>";
}
@endphp

{{--inicio motor y escaner--}}


@if(isset($peritaje->motorcontrol->piezasmotors)|| isset($peritaje->escanercontrol->escanerparts))

<div class="col-10" 
 
      style=" border-top-width: 20px;
          border-right-width: thin;
         border-bottom-width: thin;  
         border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">

<table   style="font-size: x-small;  margin: 0 auto;" >  
    <tr>
    <th>
      @if(isset($peritaje->motorcontrol->piezasmotors))

<div class="col-10"   style="margin: 1em;   border: 1px solid; width: 350px">


@if($peritaje->motorcontrol->nivelaprobado!=0)
<p>PARTES DEL MOTOR {{$peritaje->motorcontrol->nivelaprobado}}%</p>
@else
<p>PARTES DEL MOTOR</p>
@endif

<table   style="font-size: x-small; margin: 0 auto;">
<tr bgcolor=""  style="border:1pt solid black;">

 <th>PIEZA</th>
 <th>ESTADO</th>
 <th>OBSERVACION</th>
{{--    <th>TIPO</th>
 <th>OBSERVACION</th>--}}

</tr>
@foreach($peritaje->motorcontrol->piezasmotors as $motor)
@php
$inspectormotor[]=$motor->perito;
@endphp

<tr>
 <td align="left"  style="border-bottom:1pt solid black;">{{ $motor->motorpark->name }}</td>
 <td align="left"  style="border-bottom:1pt solid black;">{{ $motor->estado }}</td>
 <td align="left"  style="border-bottom:1pt solid black;">{{ $motor->observaciones }}</td>
{{--  <td>{{ $esterior->tipo }}</td>
 <td>{{ $esterior->observaciones }}</td>--}}
  
</tr>
@endforeach
</table>

@php
  $inspectormotor[]=$peritaje->motorcontrol->user->name;
$inspectormotor=array_unique($inspectormotor); 
@endphp
<p class="text-justify" style="font-size: x-small;  margin: 10px;" >
@foreach ($inspectormotor as $inspector )
Inspector:  {{$inspector}} <br/>
@endforeach
</p> 


<p class="text-justify" style="font-size: x-small;  margin: 10px;" >{{$peritaje->motorcontrol->observacion}}</p>





    </div>
    @endif
    </th>
    <th>
      @if( isset($peritaje->escanercontrol->escanerparts))
        <div class="col-10"   style="margin: 1em;   border: 1px solid; width: 350px">


            
            <p>ESCANER CODIGOS DE ERROR</p>
            
            
            <table   style="font-size: x-small; margin: 0 auto;">
            <tr bgcolor=""  style="border:1pt solid black;">
            
             <th>CODIGO</th>
             <th>ELEMENTO</th>
           <th>OBSERVACION</th> 
            {{--    <th>TIPO</th>
             <th>OBSERVACION</th>--}}
            
            </tr>
           
            @foreach($peritaje->escanercontrol->escanerparts as $escaner)
           @php
           $inspectorescaner[]=$escaner->perito;
           @endphp
            <tr>
             <td align="left"  style="border-bottom:1pt solid black;">{{ $escaner->codigo }}</td>
             <td align="left"  style="border-bottom:1pt solid black;">{{ $escaner->elemento }}</td>
            <td align="left"  style="border-bottom:1pt solid black;">{{ $escaner->observaciones }}</td>
            {{--  <td>{{ $esterior->tipo }}</td>
             <td>{{ $esterior->observaciones }}</td>--}}
              
            </tr>
            @endforeach
            </table>
            
            @php
            $inspectorescaner[]=$peritaje->escanercontrol->user->name;
              $inspectorescaner=array_unique($inspectorescaner); 
            @endphp
             <p class="text-justify" style="font-size: x-small;  margin: 10px;" >
            @foreach ($inspectorescaner as $inspector )
          Inspector:  {{$inspector}} <br/>
            @endforeach
             </p> 
            <p class="text-justify" style="font-size: x-small;  margin: 10px;" >{{$peritaje->escanercontrol->observacion}}</p>
            
             
            
                </div>

@endif

    </th>
    </tr>
</table>
</div> 
<br>
    @endif
{{--fin de motor y escaner --}}


@php 
if(isset($peritaje->paginadocontrol))
{
  $activochasis=0;
  foreach($peritaje->paginadocontrol->paginadoparts as $paginado)
  {
    if($paginado->nombre=="HISTORICO" && $paginado->activo==1)
       $activochasis=1;
  }

 if($activochasis)
      echo "<div style='page-break-after:always;'></div>";
}
@endphp


{{--inicio vhistorio y otro--}}


@if( isset($peritaje->cierre))

<div class="col-10" 
 
      style=" border-top-width: 20px;
          border-right-width: thin;
         border-bottom-width: thin;  
         border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: ;">

<p style="font-size:10px;
margin-top:-19px;
 margin-left:30px;">HISTORICO VEHICULAR</p>
 
<table   style="font-size: x-small;  margin: 0 auto;" >  
    <tr>
    <th>


<div class="col-10"   style="margin: 1em;   border: 1px solid; width: 350px">


 

<table   style="font-size: x-small; margin: 10px;">
<tr bgcolor=""  style="border:1pt solid black;">

 <th>RTM Y EC VIGENTE</th>
 <th>FECHA DE VIGENCIA</th>
 <th>RTM Y EC VIGENTE</th>
 <th>FECHA DE VIGENCIA</th>
 

</tr>


<tr>
 <td  align="left">{{$peritaje->cierre->rtm }}</td>
 <td  align="left">{{ $peritaje->cierre->fechartmvigente }}</td>
 <td  align="left">{{ $peritaje->cierre->soat}}</td>
 <td  align="left">{{ $peritaje->cierre->fechasoatvigente}}</td>
 
  
</tr>

</table>


<p class="text-justify" style="font-size: x-small;  margin: 10px;" >Embargos:{{ $peritaje->cierre->embargo}}</p>


<p class="text-justify" style="font-size: x-small;  margin: 10px;" >Otros: {{ $peritaje->cierre->observacionhv}}</p>





    </div>
    </th>
    <th>
       



    </th>
    </tr>
</table>
</div> 
    @endif
{{--fin de historico  y otros --}}
 

    

@php 
if(isset($peritaje->paginadocontrol))
{
  $activochasis=0;
  foreach($peritaje->paginadocontrol->paginadoparts as $paginado)
  {
    if($paginado->nombre=="POLÍTICAS" && $paginado->activo==1)
       $activochasis=1;
  }

 if($activochasis)
      echo "<div style='page-break-after:always;'></div>";
}
@endphp

    <strong>Para todos los efectos se hace saber al cliente que ninguno de los resultados se produjo basados en el kilometraje del vehículo, por cuanto es un sistema de fácil vulneración lo cual no es detectable con el servicio aquí prestado </p>
    <p class="text-justify">CÓDIGO FASECOLDA:  Es la asignación que se le da al vehículo de acuerdo a la guía fasecolda actualizada al mes de la revisión, y comprende las características técnicas del mismo al momento de su importación al país e inclusión al mercado colombiano.
    </p>
    <p class="text-justify"> PASO DE FLUIDOS: Quiere decir que un fluido "agua, aceite, refrigerante, combustible" está ingresando por "fisuras, grietas, cavidades, cámaras, empaques" a otros componentes causando un funcionamiento anormal.</p>
    <p class="text-justify"> 
        FUGA: Es cuando se presenta una pérdida de un fluido (agua, aceite, refrigerante, combustible) del motor por avería en empaques, sellos, retenedores, juntas u otro elemento sellante.
    </p>
    CLÁUSULAS DE LIMITACIÓN DE RESPONSABILIDAD DE CAR VALUE
    <p class="text-justify">
        SUSPENSIÓN: El alcance del servicio se da a través de diagnóstico en el cual se realiza la verificación de fugas (gas, aceite) en amortiguadores, validación visual de elementos como: tijera, tensores.  
    </p>
    <p class="text-justify"> 
        Observaciones: La validación visual aplica para los elementos que se puedan inspeccionar sin necesidad de desmontar algún otro elemento de la motocicleta.
    </p>
    <p class="text-justify"> 
        Este servicio no comprende: La vida útil de los elementos del sistema de dirección de la motocicleta.
    </p>
    <p class="text-justify"> 
        LLANTAS: Alcance del servicio: Estado del labrado y banda radial de las llantas en uso, no inferior a lo estipulado por las normas técnicas.  
    </p>
    <p class="text-justify"> 
        Observaciones: La vida útil estimada de la llanta es calculada según la profundidad de labrado y estado de la banda radial. Este puede cambiar drásticamente según los hábitos de manejo.
    </p>
    <p class="text-justify">Este servicio no comprende: Rines: No se valida si el rin presenta rectificación, reconstrucción. </p>
    <p class="text-justify">SISTEMA ELÉCTRICO: Alcance del servicio: Funcionamiento de luces (altas, bajas, direccionales, estacionarias (si aplica), placa, freno, exploradoras (si aplica), Estado de tablero de instrumentos (tacómetro, reloj (si aplica), pito, testigos de alerta en tablero de instrumentos). </p>
    <p class="text-justify">Observaciones: La inspección de las luces en general se realiza de manera visual sin necesidad de usar equipos profesionales para dicho fin. La revisión de los elementos eléctricos y electrónicos de la motocicleta depende de la carga de la batería que tenga durante el peritaje la misma. La funcionalidad de sensores, módulos de control electrónico de sistemas de seguridad y controladores o actuadores a nivel general, se validan con equipos profesionales y no están incluidos dentro del alcance del servicio. </p>
    <p class="text-justify"> Este servicio no comprende: Vida útil de elementos electrónicos. Estado de carga de batería. Estado conexiones eléctricas principales y secundarias. </p>
    <p class="text-justify"> TRANSMISION DE POTENCIA: Alcance del servicio: Verificación de fugas de fluidos en transmisión (si aplica) embrague. Verificar el nivel de líquido para embrague (en caso que aplique). </p>
    <p class="text-justify">Observaciones: La verificación de los elementos de transmisión de potencia se realiza de forma visual, no se implementa ningún tipo de equipo especializado que permita diagnosticar fallas u originalidad de las piezas. La detección de fugas se realiza de acuerdo al estado inicial de la motocicleta en modo estacionario, no se realizan pruebas de ruta o encendidos prolongados de la misma para verificar el estado de varios elementos o el impacto de una fuga.

    </p>
    <p class="text-justify"> Este servicio no comprende: No se verifica estado funcional de caja de la transmisión. Embrague: Se verifica el accionamiento básico del sistema, no se valida nivel de desgaste de los componentes internos (elementos de fricción) o ruidos anormales de funcionamiento. Funcionamiento o nivel de desgaste de los selectores de cambios. No se verifica conjunto de transferencia de control de tracción, ni sus sensores y controladores ya que no se realizan pruebas de ruta.</p>
    <p class="text-justify"> CHASIS: Alcance del servicio: Verificación del estado del chasis en cuanto a corrosión y deformación.  </p>
    <p class="text-justify">Observaciones: El no tener deformaciones en el chasis no garantiza una correcta unión de la estructura ya que no se realizan ensayos no destructivos (tintas penetrantes). </p>
    <p class="text-justify"> Este servicio no comprende: Despegue o fisuras en los componentes del chasis.</p>
    <p class="text-justify">PINTURA: Alcance del servicio: Validación visual de defectos más comunes en la aplicación. Medición del espesor de la capa de pintura de las piezas exteriores de carrocería, para determinar posibles reparaciones anteriores y espesor de la pintura.  

    </p>
    <p class="text-justify"> Observaciones: La medición de espesor de la capa de pintura no está necesariamente relacionada con una reparación de la pieza.

    </p>
    <p class="text-justify"> Este servicio no comprende: No se determina estado de pintura ajena a los componentes externos de la carrocería. No se determina originalidad de la pintura de fábrica. No se realiza prueba diferente a la visual para validar diferencia en tono de la pintura. No se realiza prueba de imprimación de la pintura sobre el material.</p>
    <p class="text-justify"> ACCESORIOS: Alcance del servicio: Inventario de accesorios adicionales al equipo de fábrica que se identifiquen visualmente sin necesidad de desmontar partes de la motocicleta. Valor estimado de los accesorios adicionales</p>
    <p class="text-justify"> Observaciones: Los accesorios de la motocicleta solo se tendrán en cuenta para generar un valor adicional a la misma, no garantiza el correcto funcionamiento de la motocicleta con la ausencia o ineficiencia de los mismos. El peritaje se limita a una revisión de las partes originales de la motocicleta.       </p>
    <p class="text-justify">Este servicio no comprende: Estado funcional del accesorio adicional. Estado físico de elementos adaptados a la motocicleta de fabricación industrial o artesanal. No se consultan bases de datos comerciales para validar el valor del accesorio. Valor real de mercado de los accesorios depende de su estado de conservación, calidad y funcionamiento. </p>
    <p class="text-justify"> MOTOR: Alcance del servicio: Revisión visual de fugas de fluidos (refrigerante, aceite, combustible). Revisión de sistema de escape parte baja (catalizador, silenciador y pre silenciador) (cuando aplique) estado de radiador (cuando aplique). Verificación de nivel de aceite y líquido refrigerante (cuando aplique). </p>
    <p class="text-justify">Observaciones: No se realiza ningún tipo de diagnóstico con el motor encendido, ni la funcionalidad de las partes internas o externas del mismo. Al cliente se le ofrecerán los servicios que incluyan un diagnostico al motor más completo (prueba de compresión), indicándole sobre el costo que acarrea. El exceso de humo del escape, el color o sus propiedades, no genera una afectación en el resultado del peritaje del vehículo. Si se realiza prueba de compresión de motor esta valida el estado aproximado de segmentos de pistones, cilindros, empaques de culata, lo cual determina un diagnóstico inicial el cual debe ser complementado con pruebas específicas para determinar un diagnóstico preciso del estado del motor. </p>
    <p class="text-justify">Este servicio no comprende: Funcionamiento del sistema de control de emisiones contaminantes del motor. Nivel de desgaste o vida útil de la correa o cadena de repartición, guayas de acelerador, elementos internos del motor como: cigüeñal, pistones, árbol de levas, válvulas, bloque de cilindros, bomba de aceite, volante. No se realiza análisis de ruidos anormales de funcionamiento. Daños internos que pueda tener el motor. Estado de complementos (electrónicos, mecánicos, estructurales, lujos) del conjunto motor. No se valida la calidad de los fluidos como: aceite de motor, combustible utilizado, líquido refrigerante. </p>
    <p class="text-justify"> Observaciones: La oxidación de las piezas de la motocicleta se puede agravar drásticamente sin el tratamiento adecuado.</p>
    <p class="text-justify"> Este servicio no comprende: Ruidos por desajuste de elementos de suspensión, frenos, transmisión. Si la motocicleta presenta protección en fibra de vidrio “bote” no se puede determinar el estado de las piezas ocultas por esta adaptación. </p>
    <p class="text-justify"> VALOR FASECOLDA: Alcance del servicio: Se publica el valor del vehículo según su código fasecolda en la guía de valores vigente de esta entidad. </p>
    <p class="text-justify">Observaciones: El valor comercial del vehículo está sujeto a modificaciones mensualmente según la entidad prestadora del servicio (Fasecolda).</p>
    <p class="text-justify">Este servicio no comprende: Este valor sugerido tiene como referencia la guía de valores de fasecolda y no significa el valor real del mercado de la motocicleta.</p>
    <p class="text-justify">VALOR SUGERIDO CAR VALUE: Alcance del servicio: Valor resultante al aplicar el descuento por estado después del peritaje sobre el valor fasecolda vigente de la motocicleta.     </p>
    <p class="text-justify">Observaciones: El valor de CAR VALUE no será un valor valido para actividades comerciales con el vehículo. CAR VALUE no tendrá responsabilidad en un proceso de compra venta del vehículo basado en el resultado de una inspección.</p>
    <p class="text-justify">Este servicio no comprende: Este valor sugerido tiene como referencia el valor de la motocicleta en la guía de valores de Fasecolda y no significa el valor real de mercado del automotor, ya que este depende de otros factores ajenos diferentes a los evaluados en el peritaje. El valor de descuento por estado es un estimado del costo de las reparaciones a que debe someterse el vehículo en los aspectos revisados, sin embargo, no se basa en cotizaciones reales de repuestos o mano de obra específica para la motocicleta.</p>
    <p class="text-justify">TESTIGOS DE ALERTA (TABLERO INSTRUMENTOS): Alcance del servicio: Verificación del correcto encendido y apagado de los testigos de falla del tablero de instrumentos. Se reporta los testigos que permanezcan encendidos o no cumplan con un parámetro normal de funcionamiento desde la revisión visual (Cuando aplique).  </p>
    <p class="text-justify">Observaciones: Los testigos del tablero de instrumentos deben encenderse al momento de iniciar la motocicleta y apagarse después de un tiempo no mayor a 10 segundos mientras la motocicleta sigue encendida. No se realizará un diagnóstico a los sistemas en los que tenga incidencia el testigo de falla.</p>
    <p class="text-justify">Este servicio no comprende: Diagnostico de fallas indicadas por los testigos encendidos. Diagnóstico del no encendido de los testigos. Utilizar el escáner como medio de validación de códigos de falla de la motocicleta.

    </p>
    <p class="text-justify">Este diagnóstico emitido por CAR VALUE, está basado exclusivamente en criterios técnicos y va con destino únicamente al cliente. Así mismo no podrá ser usado como medio que garantice la comercialización, ni relación contractual alguna con la motocicleta, no sustituye las formalidades propias de cada contrato y por ende no puede usarse como requisito para el perfeccionamiento de ningún de ellos.</p>
    <p class="text-justify">Por último, la inspección de la motocicleta no genera cobertura inmediata del mismo ya que CAR VALUE, no es parte dentro del contrato de seguro, de ninguno de ellos. Por último, la inspección de la motocicleta no genera cobertura inmediata del mismo ya que CAR VALUE no es parte el contrato. </p>
    
    <h2>FIRMA</h2>

   {{--<img  src="" alt="Firma del usuario" id="firma">--}}

    <br>
    {{--<input style=" border: 0;" id="nombre" value="{{$nombre}}">--}}
  <label for="">Nombre:{{$vehiculo->solicitante}}</label><br>
  <label for="">{{$vehiculo->tipoidentificacion}}:{{$vehiculo->numeroidentificacion}}</label>
    <br> 
    <p class="text-justify">EN MI CALIDAD DE CLIENTE MANIFIESTO QUE HE SIDO INFORMADO DE LOS ALCANCES Y LIMITACIONES DEL SERVICIO PRESTADO.</p>
    <p class="text-justify">EL DOCUMENTO NO TENDRÁ VALOR SI FALTA ALGUNA DE SUS PÁGINAS, YA QUE ESTE ES INTEGRAL.</p>
   
  </strong>
    <div id="t3"></div>
   <script>
     //   if (window.opener) {
         //   document.querySelector("#firma").src = window.opener.obtenerImagen();
            // Imprimir documento. Si no quieres imprimir, remueve la siguiente línea
           // document.querySelector("#nombre").value ="";
            window.print();
    //    }
         
    </script>
</body>

</html>
 


 
