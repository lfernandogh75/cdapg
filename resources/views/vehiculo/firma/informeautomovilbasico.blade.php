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
        .text-justify {
  text-align: justify;
}
#t1{
  width: 900px;
  height: 180px;
    background-image: no-repeat;
    background-image: fixed;
    background-image: center;
    
    background-image:url({{url('/iconos/cabezalivianobasico.jpg')}});
    
    
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
color: #00B1DD;
margin: 10px 30px 0px 20px;
}
body{
    background-image: no-repeat;
background-image: fixed;
background-image: center;
    background-image:url({{url('/iconos/marcadeagua.jpg')}});
   
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
    <table   style="font-size: xx-small; margin: 0 auto;"  >
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
  
  <P class="text-justify" style="font-size: xx-small;  width: 500px;">{{$peritaje->cierre->observacion}}</p>
</div>
      <br>
   
    @if(isset($peritaje->vehiculo->placa) && isset($peritaje->tarjeta ))
   
   
   
    <div class="col-11"   style=" width: 100%; border: 1px solid;">
  
  <p style="font-size: small;"> DATOS DEL VEHICULO</p>
      
       
        
               
            <table  style="font-size: xx-small; margin: 0 auto;" >
                <tr>
                   
                    <th align="left"  bgcolor ="#a0dd30">PLACA:</th>
                     <td>{{ $peritaje->vehiculo->placa}}</td>
                    <th align="left"  bgcolor ="#a0dd30">NACIONALIDAD:</th>
                     <td>{{ $peritaje->tarjeta->nacionalidad }}</td>
                     <th align="left"  bgcolor ="#a0dd30">VEHICULO</th>
                     <td>{{ $peritaje->vehiculo->clase_vehiculo }}</td>
                     
                     <th align="left"  bgcolor="#a0dd30">SERVICIO</th>
                     <td> {{$peritaje->tarjeta->servicio->nombre}}</td>
                    
                    
                </tr>
                
                <tr>
                    <th align="left" bgcolor ="#a0dd30">Nº LICENCIA</th>
                    <td>{{ $peritaje->tarjeta->licencia}}</td>
                    <th align="left"   bgcolor="#a0dd30">MODELO</th>
                    <td>{{ $peritaje->tarjeta->modelo}}</td>
                    <th align="left"  bgcolor="#a0dd30">COMBUSTIBLE</th>
                    <td> {{$peritaje->tarjeta->combustible->nombre}}</td>
                  
                   <th align="left"  bgcolor="#a0dd30">N MOTOR</th>
                <td> {{$peritaje->tarjeta->numero_motor}}</td>
                  
                </tr>
                
                 <tr>
                    <th align="left"  bgcolor ="#a0dd30">FECHA MATRICULA:</th>
                    <td>{{ $peritaje->tarjeta->fecha_matricula}}</td>
                    <th align="left"  bgcolor="#a0dd30">COLOR</th>
                    <td> {{$peritaje->tarjeta->color->nombre}}</td>
                    <th align="left"  bgcolor ="#a0dd30">KILOMETRAJE</th>
                    <td>{{ $peritaje->vehiculo->km }}Km</td>
                    <th align="left"  bgcolor="#a0dd30">N SERIE</th>
                     <td> {{$peritaje->tarjeta->numero_serie}}</td>
                </tr>
               <tr>
                <th align="left"  bgcolor ="#a0dd30">TIPO MOTOR:</th>
                <td>{{ $peritaje->cierre->tipomotor}}</td>
                <th align="left"  bgcolor="#a0dd30">MARCA</th>
                <td> {{$peritaje->tarjeta->marca->nombre}}</td>
                <th align="left"   bgcolor="#a0dd30">CILINDRADA CC</th>
                   <td>{{ $peritaje->tarjeta->cilindrada}}</td>
                  
                   <th align="left"  bgcolor="#a0dd30">N VIN</th>
                   <td> {{$peritaje->tarjeta->numero_vin}}</td>
               
               
               </tr>  

               <tr>
                <th align="left"  bgcolor ="#a0dd30">TIPO DE CAJA</th>
                <td>{{ $peritaje->cierre->tipocaja}}</td>
                <th align="left"   bgcolor="#a0dd30">LINEA</th>
                <td> {{$peritaje->tarjeta->linea->nombre}}</td>
                
                     <th align="left"  bgcolor="#a0dd30">CAPACIDAD</th>
                     <td> {{$peritaje->tarjeta->capacidad}}</td>
               
                <th align="left"  bgcolor="#a0dd30">N CHASIS</th>
                <td> {{$peritaje->tarjeta->numero_chasis}}</td>
               </tr>
               <tr>
                <th align="left"  bgcolor ="#a0dd30">MATRICULADO EN:</th>
                <td>{{ $peritaje->tarjeta->matriculado}}</td>
                <th align="left"   bgcolor="#a0dd30">PROPIETARIO:</th>
                <td> {{$peritaje->tarjeta->propietario}}</td>
                
                     <th align="left"   bgcolor="#a0dd30">IDENTIFICACION:</th>
                     <td> {{$peritaje->tarjeta->identificacion_propietario}}</td>
               
                <th align="left"  bgcolor="#a0dd30">TIPO PINTURA</th>
                <td> {{$peritaje->cierre->tipopintura}}</td>
               </tr>
               <tr>
                <th  align="left"  colspan="3" bgcolor ="#a0dd30">FECHA VENCIMIENTO CERTIFICACO GNVC:</th>
                <td>{{ $peritaje->cierre->gnvc}}</td>
                
                
                     <th align="left"   bgcolor="#a0dd30">BLINDADO:</th>
                     <td> {{$peritaje->cierre->blindado}}</td>
               
                <th align="left"  bgcolor="#a0dd30">POLARIZADO:</th>
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
border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: #a0dd30;">


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
    border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: #a0dd30;">

    
    <p style="font-size: xx-small;
    font-size:10px;
     margin-top:-19px;
      margin-left:30px;">IMPRONTAS DEL VEHICULO</p>

    <div style=" border-top-width: thin;
    border-right-width: thin;
    border-bottom-width: thin; 
   
    border-left-width: 1em;  border-radius: 5px 5px 5px 5px;  border-color:#a0dd30;">

    
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
   
    border-left-width: 1em;  border-radius: 5px 5px 5px 5px;  border-color:#a0dd30;">

    
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
             @if($foto->categoria=="RECESION")
              @php $fotos[]=$foto @endphp
               @endif              
@endforeach
@if(count($fotos)>=4)
 
      <div class="col-11"  style=" border-top-width: 20px;
      border-right-width: thin;
     border-bottom-width: thin;  
     border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: #a0dd30;">
  
      
          <p style="font-size:10px;
          margin-top:-19px;
           margin-left:30px;"> REGISTRO FOTOGRAFICO</p>
      <table  width="90%" class="table table-bordered" style="font-size: small; margin: 0 auto;" >
          <tr bgcolor="#a0dd30">
      
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


  <div style="page-break-after:always;"></div>

  {{-- inicio de latoneria o carroceria--}}
  @if(isset($peritaje->latoneriacontrol))
  <div class="col-11"  style=" border-top-width: 20px;
  border-right-width: thin;
 border-bottom-width: thin;  
 border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: #a0dd30;">

  @if($peritaje->latoneriacontrol->nivelaprobado!=0)
  <p style="font-size:10px;
  margin-top:-19px;
   margin-left:30px;">LATONERIA O CARROCERIA {{$peritaje->latoneriacontrol->nivelaprobado}}%</p>
@else
<p style="font-size:10px;
margin-top:-19px;
 margin-left:30px;">LATONERIA O CARROCERIA</p>
@endif

<table   style="font-size: xx-small; margin: 0 auto;" >

<tr>
<th>
<br>


@if(isset($peritaje->latoneriacontrol->latoneriaparts))
<div class="col-10"   style=" width: 320px; border: 1px solid;">
<p > VISTA IZQUIERDA</p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#a0dd30">

<th>PIEZA</th>
<th>ESTADO</th>


</tr>
@foreach($peritaje->latoneriacontrol->latoneriaparts as $latoneria)
@if($latoneria->vista=="IZQUIERDA")
<tr>
<td  align="left">{{ $latoneria->latoneriapart->name }}</td>
<td  align="left">{{ $latoneria->estado }}</td>


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
<div class="col-10"   style=" width: 320px; border: 1px solid;">
<p> VISTA DERECHA </p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#a0dd30">

<th>PIEZA</th>
<th>ESTADO</th>


</tr>
@foreach($peritaje->latoneriacontrol->latoneriaparts as $latoneria)
@if($latoneria->vista=="DERECHA")
<tr>
<td align="left">{{ $latoneria->latoneriapart->name }}</td>
<td align="left">{{ $latoneria->estado }}</td>


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
<div class="col-10"   style=" width: 320px;  border: 1px solid;">
<p> VISTA POSTERIOR</p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#a0dd30">
  
   <th>PIEZA</th>
   <th>ESTADO</th>
    

</tr>
@foreach($peritaje->latoneriacontrol->latoneriaparts as $latoneria)
@if($latoneria->vista=="POSTERIOR")
<tr>
   <td align="left">{{ $latoneria->latoneriapart->name }}</td>
   <td align="left">{{ $latoneria->estado }}</td>
   
    
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
<div class="col-10"   style=" width: 320px;  border: 1px solid;">
<p> VISTA FRONTAL </p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#a0dd30">

 <th>PIEZA</th>
 <th>ESTADO</th>
  

</tr>
@foreach($peritaje->latoneriacontrol->latoneriaparts as $latoneria)
@if($latoneria->vista=="FRONTAL")
<tr>
 <td align="left">{{ $latoneria->latoneriapart->name }}</td>
 <td align="left">{{ $latoneria->estado }}</td>
 
  
</tr>
@endif
@endforeach
</table>










    </div>
    @endif     

      </th>
  </tr>
</table> 

  
<P class="text-justify" style="font-size: xx-small;  width: 550px;">{{$peritaje->latoneriacontrol->observacion}}</p>

   
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
          <tr bgcolor="#a0dd30">
      
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





  </div>
  @endif



    {{--fin de latoneria y carroceria--}}
<br>

{{--chasis y partes bajas--}}
<div class="col-10" style=" border-top-width: 20px;
border-right-width: thin;
border-bottom-width: thin;  
border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: #a0dd30;">
<br>
<table   style="font-size: small;margin: 0 auto; width: 100%; " >
     
   <tr>
   <th>


        
@if(isset($peritaje->chasiscontrol->chasisparts))
<div   class="col-10"  style=" margin: 1em;  border: 1px solid;">
@if($peritaje->chasiscontrol->nivelaprobado!=0)
    <p> CHASIS {{$peritaje->chasiscontrol->nivelaprobado}}%</p>  
@else
<p> CHASIS</p>
@endif
    <table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#a0dd30">
   
    <th>PIEZA</th>
    <th>ESTADO</th>
    <th>OBSERVACION</th>
{{--    <th>TIPO</th>
    <th>OBSERVACION</th>--}}

</tr>
@foreach($peritaje->chasiscontrol->chasisparts as $chasis)
<tr>
    <td align="left">{{ $chasis->chasispart->name }}</td>
    <td align="left">{{ $chasis->estado }}</td>
    <td align="left">{{ $chasis->observaciones}}</td>
 {{--  <td>{{ $esterior->tipo }}</td>
    <td>{{ $esterior->observaciones }}</td>--}}
     
</tr>
@endforeach
 
</table>
<P class="text-justify" style="font-size: xx-small;  width: 250px;">{{$peritaje->chasiscontrol->observacion}}</p>
</th>
<th>
    @if(isset($peritaje->bajacontrol->bajaparts))
    <div   class="col-10"  style=" margin: 1em;  border: 1px solid;">
   @if($peritaje->bajacontrol->nivelaprobado!=0)
        <p>PARTE BAJA {{$peritaje->bajacontrol->nivelaprobado}}%</p>   
   @else
   <p>PARTE BAJA</p>
   @endif
        <table style="font-size: xx-small; margin: 0 auto;">
        <tr bgcolor="#a0dd30">
           
            <th>PIEZA</th>
            <th>ESTADO</th>
            <th>OBSERVACION</th>
            
   
        </tr>
        @foreach($peritaje->bajacontrol->bajaparts as $baja)
        <tr>
            <td align="left">{{ $baja->bajapart->name }}</td>
            <td align="left">{{ $baja->estado }}</td>
            <td align="left">{{ $baja->observaciones }}</td>
             
            
             
        </tr>
        @endforeach
       
    </table>

@endif
<P class="text-justify" style="font-size: xx-small;  width: 250px;">{{$peritaje->bajacontrol->observacion}}</p>
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
             <tr bgcolor="#a0dd30">
         
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





    

 {{-- <textarea style="font-size: xx-small;  width: 250px;"   readonly>{{$peritaje->chasiscontrol->observacion}}</textarea>--}}




       </div>
       @endif
 </div>
<br>
{{--fin de chasis --}}



 {{--inicio fuga de fluidos y niveles--}}
 <div  class="col-10" style=" border-top-width: 20px;
 border-right-width: thin;
 border-bottom-width: thin;  
 border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: #a0dd30;">
  <table   style="font-size: xx-small;width: 100%; margin: 0 auto;" >
     
   <tr>
   <th>



@if(isset($peritaje->fluidocontrol->fluidoparts))
<div class="col-10"  style=" margin: 1em;  border: 1px solid;" >

@if($peritaje->fluidocontrol->nivelaprobado!=0)
    <p> FUGAS DE FLUIDOS {{$peritaje->fluidocontrol->nivelaprobado}}%</p>
     
@else
<p> FUGAS DE FLUIDOS</p>
@endif
    <table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#a0dd30">
   
    <th>PIEZA</th>
    <th>FUGA</th>
    <th>OBSERVACION</th>
{{--    <th>TIPO</th>
    <th>OBSERVACION</th>--}}

</tr>
@foreach($peritaje->fluidocontrol->fluidoparts as $fluido)
<tr>
    <td align="left">{{ $fluido->fluidopart->name }}</td>
    <td align="left">{{ $fluido->estado }}</td>
    <td align="left">{{ $fluido->observaciones }}</td>
 {{--  <td>{{ $esterior->tipo }}</td>
    <td>{{ $esterior->observaciones }}</td>--}}
     
</tr>
@endforeach
</table>




<P class="text-justify" style="font-size: xx-small;  width: 250px;">{{$peritaje->fluidocontrol->observacion}}</p>





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
<table style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#a0dd30">
   
    <th>PIEZA</th>
    <th>ESTADO</th>
    <th>OBSERVACION</th>
   
    

</tr>
@foreach($peritaje->nfluidocontrol->fluidoparts as $nfluido)
<tr>
    <td align="left">{{ $nfluido->fluidopart->name }}</td>
    <td align="left">{{ $nfluido->estado }}</td>
    <td align="left">{{ $nfluido->observaciones}}</td>
    
    
    
     
</tr>
@endforeach

</table>
<P class="text-justify" style="font-size: xx-small;  width: 250px;">{{$peritaje->nfluidocontrol->observacion}}</p>


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
          <tr bgcolor="#a0dd30">
      
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

{{--fin de fugas de fluidos y niveles --}}

</div>




<br>
   
  {{--inicio exteriores y interior--}}

  <div class="col-10"    style=" border-top-width: 20px;
 border-right-width: thin;
border-bottom-width: thin;  
border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: #a0dd30;">



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
     <tr bgcolor="#a0dd30">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
         <th>OBSERVACION</th>
     {{--    <th>TIPO</th>
         <th>OBSERVACION</th>--}}

     </tr>
     @foreach($peritaje->exteriorcontrol->piezasexteriores as $esterior)
     <tr>
         <td align="left" >{{ $esterior->exteriorpart->name }}</td>
         <td align="left" >{{ $esterior->estado }}</td>
         <td align="left" >{{ $esterior->observaciones }}</td>
      {{--  <td>{{ $esterior->tipo }}</td>
         <td>{{ $esterior->observaciones }}</td>--}}
          
     </tr>
     @endforeach


 </table>


  
    
 <P class="text-justify" style="font-size: xx-small;  width: 250px;">{{$peritaje->exteriorcontrol->observacion}}</p>
   
 



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
     <tr bgcolor="#a0dd30">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
         <th>OBSERVACION</th>
         

     </tr>
     @foreach($peritaje->interiorcontrol->interiorparts as $interior)
     <tr>
         <td align="left" >{{ $interior->interiorpart->name }}</td>
         <td align="left" >{{ $interior->estado }}</td>
         <td align="left" >{{ $interior->observaciones }}</td>
          
         
          
     </tr>
     @endforeach


  

      
 </table>
 <P class="text-justify" style="font-size: xx-small;  width: 250px;">{{$peritaje->interiorcontrol->observacion}}</p>
 

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
          <tr bgcolor="#a0dd30">
      
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
    {{--FIN DE EXTERIOR Y INTERIOR--}}


  

      {{--inicio electrico  y luces--}}
      <div class="col-10" 
 
      style=" border-top-width: 20px;
          border-right-width: thin;
         border-bottom-width: thin;  
         border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: #a0dd30;">
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
     <tr bgcolor="#a0dd30">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
         <th>OBSERVACION</th>
     {{--    <th>TIPO</th>
         <th>OBSERVACION</th>--}}

     </tr>
     @foreach($peritaje->vlucescontrol->luzparts as $luces)
     <tr>
         <td align="left" >{{ $luces->luzpart->name }}</td>
         <td align="left" >{{ $luces->estado }}</td>
         <td align="left" >{{ $luces->observaciones }}</td>
      {{--  <td>{{ $esterior->tipo }}</td>
         <td>{{ $esterior->observaciones }}</td>--}}
          
     </tr>
     @endforeach


 </table>


  
    
 <P class="text-justify" style="font-size: xx-small;  width: 250px;">{{$peritaje->vlucescontrol->observacion}}</p>
   
 



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
     <tr bgcolor="#a0dd30">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
         <th>OBSERVACION</th>
         

     </tr>
     @foreach($peritaje->electricocontrol->piezaselectricas as $electrico)
     <tr>
         <td align="left" >{{ $electrico->electricalpart->name }}</td>
         <td align="left" >{{ $electrico->estado }}</td>
         <td align="left" >{{ $electrico->observaciones }}</td>
          
         
          
     </tr>
     @endforeach


  

      
 </table>
 <P class="text-justify" style="font-size: xx-small;  width: 250px;">{{$peritaje->electricocontrol->observacion}}</p>
 

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
          <tr bgcolor="#a0dd30">
      
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
    {{--FIN DE electrico Y luces--}}

  </div>


<br>

  {{-- llantas prueba de frenado--}}
  <div class="col-10" 
 
      style=" border-top-width: 20px;
          border-right-width: thin;
         border-bottom-width: thin;  
         border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: #a0dd30;">
<table   style="font-size: xx-small; width: 100%;  margin: 0 auto;" >
     
    <tr>
    <th>
 <br>
 @if(isset($peritaje->frenocontrol->frenoparts))
<div class="col-10"   style=" width: 300px;  border: 1px solid;">
    @if($peritaje->frenocontrol->nivelaprobado!=0)
<p> PRUEBA DE FRENOS {{$peritaje->frenocontrol->nivelaprobado}}%</p>    
@else
<p> PRUEBA DE FRENOS</p>  
@endif
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#a0dd30">
   
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

<P class="text-justify" style="font-size: xx-small;  width: 250px;">{{$peritaje->frenocontrol->observacion}}</p>





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
 <table style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#a0dd30">
    
     <th>PIEZA</th>
     <th>PARA CAMBIO</th>
     <th>VIDA UTIL</th>
     <th>LABRADO</th>
    
    
     
 
 </tr>
 @foreach($peritaje->llantacontrol->llantaparts as $llanta)
 <tr>
     <td  align="left">{{ $llanta->llantapart->name }}</td>
     <td  align="left">{{ $llanta->cambio }}</td>
     <td  align="left">{{ $llanta->vidautil }}%</td>
     <td  align="left">{{ $llanta->labrado}}mm</td>
      
     
     
      
 </tr>
 @endforeach
 
 </table>
 <P class="text-justify" style="font-size: xx-small;  width: 250px;">{{$peritaje->llantacontrol->observacion}}</p>
 
 
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
         <tr bgcolor="#a0dd30">
     
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
 {{--fin de prueba de frenado y llantas--}}


</div>

<br>

{{--compresion de motor--}}
<div class="col-10" 
 
      style=" border-top-width: 20px;
          border-right-width: thin;
         border-bottom-width: thin;  
         border-left-width: thin;  border-radius: 30px 30px 5px 5px;  border-color: #a0dd30;">
<table   style="font-size: xx-small;  margin: 0 auto;" >  
    <tr>
    <th>

        

      
        <br>
        <img  src="{{ url('/iconos/motor.jpg')}}" style=" width: 150px;">
    </th>
    <th>

          
        <br>
        <div class="col-10"   style=" margin: 1em; width: 200px; border: 1px solid;">
@if(isset($peritaje->compresioncontrol->compresionparts))
@if($peritaje->compresioncontrol->nivelaprobado!=0)
<p>COMPRESION Y FUGAS DEL MOTOR {{$peritaje->compresioncontrol->nivelaprobado}}%</p>  
@else
<p>COMPRESION Y FUGAS DEL MOTOR</p> 
@endif
<table style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#a0dd30">

 <th>PIEZA</th>
 <th>COMPRESION</th>
 <th>FUGA</th>
 

</tr>
@foreach($peritaje->compresioncontrol->compresionparts as $compresion)
<tr>
 <td align="left">{{ $compresion->compresionpart->name }}</td>
 <td align="left">{{ $compresion->compresion }}</td>
 <td align="left">{{ $compresion->fuga }}</td>
 
  
</tr>
@endforeach
<tr>

 <th>PROMEDIOS</th>
 <th>{{round($peritaje->compresioncontrol->compresionparts->avg('compresion'),2).'PSI'}}</th>
 <th>{{round($peritaje->compresioncontrol->compresionparts->avg('fuga'),2).'%'}}</th>
 

</tr>
</table>



        </div> 
        @endif
          <br>
          <P class="text-justify" style="font-size: xx-small;  width: 300px;">{{$peritaje->compresioncontrol->observacion}}</textarea> 

        </th>
    </tr>
</table> 
</div>
{{--fin de compresion--}}
 

    

     <div style="page-break-after:always;"></div>

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
 
