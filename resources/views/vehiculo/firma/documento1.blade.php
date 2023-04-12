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
    </style>
     <title>INSPECCIÓN Nº  {{ $vehiculo->peritaje_id }}
      

    
    </title>
 
</head>

<body>
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
                 <td>{{ $peritaje->cierre->valorfasecolda }}</td>
               </tr>
               <tr>
                   
                <th align="left">VALOR {{$peritaje->cierre->empresa->razonsocial}}:</th>
                 <td>{{ $peritaje->cierre->valorcarvalue}}</td>
                <th align="left">VALOR ACCESORIOS:</th>
                 <td>{{ $peritaje->cierre->valoraccesorios }}</td>
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
  <textarea style="font-size: small;  width: 500px;"   readonly>{{$peritaje->cierre->observacion}}</textarea>
    </div>
      <br>
   
    @if(isset($peritaje->vehiculo->placa) && isset($peritaje->tarjeta ))
   
   
   
    <div class="col-11"   style=" width: 100%; border: 1px solid;">
  
  <p style="font-size: small;"> DATOS DEL VEHICULO</p>
      
       
        
               
            <table  style="font-size: xx-small; margin: 0 auto;" >
                <tr>
                   
                    <th align="left"  bgcolor ="#19ea6d">PLACA:</th>
                     <td>{{ $peritaje->vehiculo->placa}}</td>
                    <th align="left"  bgcolor ="#19ea6d">NACIONALIDAD:</th>
                     <td>{{ $peritaje->tarjeta->nacionalidad }}</td>
                     <th align="left"  bgcolor ="#19ea6d">VEHICULO</th>
                     <td>{{ $peritaje->vehiculo->clase_vehiculo }}</td>
                     
                     <th align="left"  bgcolor="#19ea6d">SERVICIO</th>
                     <td> {{$peritaje->tarjeta->servicio->nombre}}</td>
                    
                    
                </tr>
                
                <tr>
                    <th align="left" bgcolor ="#19ea6d">Nº LICENCIA</th>
                    <td>{{ $peritaje->tarjeta->licencia}}</td>
                    <th align="left"   bgcolor="#19ea6d">MODELO</th>
                    <td>{{ $peritaje->tarjeta->modelo}}</td>
                    <th align="left"  bgcolor="#19ea6d">COMBUSTIBLE</th>
                    <td> {{$peritaje->tarjeta->combustible->nombre}}</td>
                  
                   <th align="left"  bgcolor="#19ea6d">N MOTOR</th>
                <td> {{$peritaje->tarjeta->numero_motor}}</td>
                  
                </tr>
                
                 <tr>
                    <th align="left"  bgcolor ="#19ea6d">FECHA MATRICULA:</th>
                    <td>{{ $peritaje->tarjeta->fecha_matricula}}</td>
                    <th align="left"  bgcolor="#19ea6d">COLOR</th>
                    <td> {{$peritaje->tarjeta->color->nombre}}</td>
                    <th align="left"  bgcolor ="#19ea6d">KILOMETRAJE</th>
                    <td>{{ $peritaje->vehiculo->km }}Km</td>
                    <th align="left"  bgcolor="#19ea6d">N SERIE</th>
                     <td> {{$peritaje->tarjeta->numero_serie}}</td>
                </tr>
               <tr>
                <th align="left"  bgcolor ="#19ea6d">TIPO MOTOR:</th>
                <td>{{ $peritaje->cierre->tipomotor}}</td>
                <th align="left"  bgcolor="#19ea6d">MARCA</th>
                <td> {{$peritaje->tarjeta->marca->nombre}}</td>
                <th align="left"   bgcolor="#19ea6d">CILINDRADA CC</th>
                   <td>{{ $peritaje->tarjeta->cilindrada}}</td>
                  
                   <th align="left"  bgcolor="#19ea6d">N VIN</th>
                   <td> {{$peritaje->tarjeta->numero_vin}}</td>
               
               
               </tr>  

               <tr>
                <th align="left"  bgcolor ="#19ea6d">TIPO DE CAJA</th>
                <td>{{ $peritaje->cierre->tipocaja}}</td>
                <th align="left"   bgcolor="#19ea6d">LINEA</th>
                <td> {{$peritaje->tarjeta->linea->nombre}}</td>
                
                     <th align="left"  bgcolor="#19ea6d">CAPACIDAD</th>
                     <td> {{$peritaje->tarjeta->capacidad}}</td>
               
                <th align="left"  bgcolor="#19ea6d">N CHASIS</th>
                <td> {{$peritaje->tarjeta->numero_chasis}}</td>
               </tr>
               <tr>
                <th align="left"  bgcolor ="#19ea6d">MATRICULADO EN:</th>
                <td>{{ $peritaje->tarjeta->matriculado}}</td>
                <th align="left"   bgcolor="#19ea6d">PROPIETARIO:</th>
                <td> {{$peritaje->tarjeta->propietario}}</td>
                
                     <th align="left"   bgcolor="#19ea6d">IDENTIFICACION:</th>
                     <td> {{$peritaje->tarjeta->identificacion_propietario}}</td>
               
                <th align="left"  bgcolor="#19ea6d">TIPO PINTURA</th>
                <td> {{$peritaje->cierre->tipopintura}}</td>
               </tr>
               <tr>
                <th  align="left"  colspan="3" bgcolor ="#19ea6d">FECHA VENCIMIENTO CERTIFICACO GNVC:</th>
                <td>{{ $peritaje->cierre->gnvc}}</td>
                
                
                     <th align="left"   bgcolor="#19ea6d">BLINDADO:</th>
                     <td> {{$peritaje->cierre->blindado}}</td>
               
                <th align="left"  bgcolor="#19ea6d">POLARIZADO:</th>
                <td> {{$peritaje->cierre->polarizado}}</td>
               </tr>
               
            </table>
            

        </div>
@endif
@endif
    <br>
   
  {{--inicio exteriores y parte baja--}}
    <table   style="font-size: x-small; width: 100%; margin: 0 auto;" >
      
        <tr>
        <th>



 @if(isset($peritaje->exteriorcontrol->piezasexteriores))
 <div class="col-10"   style="  border: 1px solid; margin: 1em;">
    <p style="font-size: small;"> REVISION DE EXTERIORES {{$peritaje->exteriorcontrol->nivelaprobado}}%</p>
 <table   style="font-size: x-small; margin: 0 auto;">
     <tr bgcolor="#19ea6d">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
     {{--    <th>TIPO</th>
         <th>OBSERVACION</th>--}}

     </tr>
     @foreach($peritaje->exteriorcontrol->piezasexteriores as $esterior)
     <tr>
         <td align="left" >{{ $esterior->exteriorpart->name }}</td>
         <td align="left" >{{ $esterior->estado }}</td>
      {{--  <td>{{ $esterior->tipo }}</td>
         <td>{{ $esterior->observaciones }}</td>--}}
          
     </tr>
     @endforeach
 </table>


  
    
    <textarea style="font-size: x-small;  width: 250px;"   readonly>{{$peritaje->exteriorcontrol->observacion}}</textarea>
   
 



            </div>
            @endif
        </th>
        <th>

           
 @if(isset($peritaje->bajacontrol->bajaparts))
 <div class="col-10"   style=" border: 1px solid; margin: 1em;">
    <p style="font-size: small;">PARTE BAJA {{$peritaje->bajacontrol->nivelaprobado}}%</p>
 <table style="font-size: x-small; margin: 0 auto;">
     <tr bgcolor="#19ea6d">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
         

     </tr>
     @foreach($peritaje->bajacontrol->bajaparts as $baja)
     <tr>
         <td align="left" >{{ $baja->bajapart->name }}</td>
         <td align="left" >{{ $baja->estado }}</td>
          
         
          
     </tr>
     @endforeach
      
 </table>
 <textarea style="font-size: x-small;  width: 250px;"   readonly>{{$peritaje->bajacontrol->observacion}}</textarea>
 

                </div> 
                @endif
            </th>
        </tr>
    </table> 
    <br>
    {{--FIN DE EXTERIOR Y COMPRESION--}}
   
    @if(isset($peritaje->fotocontrol->fotoparts))
    <div class="col-11"   style=" width: 100%; border: 1px solid;">

    
        <p style="font-size: small;"> REGISTRO FOTOGRAFICO</p>
    <table width="90%" class="table table-bordered" style="font-size: small; margin: 0 auto;" >
        <tr bgcolor="#19ea6d">
    
         {{--  <th>FOTO</th>  
            <th>IMAGEN</th>
           <th>OBSERVACION</th>
            <th>FOTO</th>  
            <th>IMAGEN</th>
           <th>OBSERVACION</th> --}} 
        </tr>
       
       {{-- @foreach($peritaje->fotocontrol->fotoparts as $foto) --}}
     @php  $foto=$peritaje->fotocontrol->fotoparts;
    $c=count($foto)-1; @endphp
   @if($c==0)
{{--   <td>{{ $foto[0]->fotopart->name }}</td> --}}
   <td>{{ $foto[0]->fotopart->name }}<br>
       <img class="cssimagen" src="{{ url('imagen/'.$foto[0]->imagen)}}"></td>
 {{-- <td>{{ $foto[0]->observacion }}</td> --}}
   @else
     @for($i=0;$i<$c;$i++)
    
     <tr>
              @if($i%2==0)  
       {{--     <td>{{ $foto[$i]->fotopart->name }}</td> --}}
            <td>{{ $foto[$i]->fotopart->name }}<br>
                   <img class="cssimagen" src="{{ url('imagen/'.$foto[$i]->imagen)}}" ></td>
         {{--  <td>{{ $foto[$i]->observacion }}</td> --}}
            @endif
          @if(($i+1)%2!=0)
        {{--    <td>{{ $foto[$i+1]->fotopart->name }}</td> --}}
            <td>{{ $foto[$i+1]->fotopart->name }}<br>
                   <img class="cssimagen" src="{{ url('imagen/'.$foto[$i+1]->imagen)}}" ></td>
          {{--  <td>{{ $foto[$i+1]->observacion }}</td> --}}
            @endif
             
        </tr>
        @endfor
        @if($c%2==0)
     {{--  <td>{{ $foto[$c]->fotopart->name }}</td> --}}
            <td>{{ $foto[$c]->fotopart->name }}<br>
                   <img class="cssimagen" src="{{ url('./imagen/'.$foto[$c]->imagen)}}" ></td>
         {{--  <td>{{ $foto[$c]->observacion }}</td> --}}
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
        <div class="col-11"   style=" width: 100%; border: 1px solid;">
    
        
            <p style="font-size: small;"> ESTRUCTURA {{$peritaje->estructuracontrol->nivelaprobado}}%</p>


<table   style="font-size: x-small;  margin: 0 auto;" >
      
    <tr>
    <th>

<br>

@if(isset($peritaje->estructuracontrol->estructuraparts))
<div class="col-10"   style="  width: 320px; margin:1em; border: 1px solid;">
    <p style="font-size: small;"> VISTA IZQUIERDA</p>
<table   style="font-size: x-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>ESTADO</th>
      

 </tr>
 @foreach($peritaje->estructuracontrol->estructuraparts as $estructura)
 @if($estructura->vista=="IZQUIERDA")
 <tr>
     <td align="left" >{{ $estructura->estructurapart->name }}</td>
     <td align="left" >{{ $estructura->estado }}</td>
     
      
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
<div class="col-10"   style="  width: 320px; margin:1em; border: 1px solid; ">
    <p style="font-size: small;"> VISTA DERECHA </p>
<table   style="font-size: x-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">
  
   <th>PIEZA</th>
   <th>ESTADO</th>
    

</tr>
@foreach($peritaje->estructuracontrol->estructuraparts as $estructura)
@if($estructura->vista=="DERECHA")
<tr>
   <td align="left" >{{ $estructura->estructurapart->name }}</td>
   <td align="left" >{{ $estructura->estado }}</td>
   
    
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
    <div class="col-10"   style="  width: 320px; margin:1em; border: 1px solid;">
        <p style="font-size: small;"> VISTA POSTERIOR</p>
    <table   style="font-size: x-small; margin: 0 auto;">
     <tr bgcolor="#19ea6d">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
          
    
     </tr>
     @foreach($peritaje->estructuracontrol->estructuraparts as $estructura)
     @if($estructura->vista=="POSTERIOR")
     <tr>
         <td align="left" >{{ $estructura->estructurapart->name }}</td>
         <td align="left" >{{ $estructura->estado }}</td>
         
          
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
    <div class="col-10"   style="  width: 320px; margin:1em; border: 1px solid;">
        <p style="font-size: small;"> VISTA FRONTAL </p>
    <table   style="font-size: x-small; margin: 0 auto;">
    <tr bgcolor="#19ea6d">
      
       <th>PIEZA</th>
       <th>ESTADO</th>
        
    
    </tr>
    @foreach($peritaje->estructuracontrol->estructuraparts as $estructura)
    @if($estructura->vista=="FRONTAL")
    <tr>
       <td align="left" >{{ $estructura->estructurapart->name }}</td>
       <td align="left" >{{ $estructura->estado }}</td>
       
        
    </tr>
    @endif
    @endforeach
    </table>
    
    
    
    
    
    
   
    
    
    
          </div>
                 
          @endif
            </th>
        </tr>
        
</table> 

<textarea style="font-size: x-small;  width: 550px;margin: 20px;"   readonly>{{$peritaje->estructuracontrol->observacion}}</textarea> 


         
        </div>
        @endif
<br>
        {{-- inicio de latoneria o carroceria--}}
        @if(isset($peritaje->latoneriacontrol))
        <div class="col-11"   style=" width: 100%; border: 1px solid;">
    
        
        <p>LATONERIA O CARROCERIA {{$peritaje->latoneriacontrol->nivelaprobado}}%</p>


<table   style="font-size: xx-small; margin: 0 auto;" >
      
    <tr>
    <th>
<br>


@if(isset($peritaje->latoneriacontrol->latoneriaparts))
<div class="col-10"   style=" width: 320px; border: 1px solid;">
<p > VISTA IZQUIERDA</p>
<table   style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
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
<tr bgcolor="#19ea6d">
  
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
     <tr bgcolor="#19ea6d">
        
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
    <tr bgcolor="#19ea6d">
      
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

        

<textarea style="font-size: xx-small;  width: 550px;margin: 20px;"   readonly>{{$peritaje->latoneriacontrol->observacion}}</textarea>
         
        </div>
        @endif



          {{--fin de latoneria y carroceria--}}
       <br>
       {{--inicio pintura--}}
       @if(isset($peritaje->pinturacontrol))
       <div class="col-11" style=" width: 100%;  border: 1px solid;">
   
       
       <p> PINTURA {{$peritaje->pinturacontrol->nivelaprobado}}%</p>


<table   style="font-size: xx-small; margin: 0 auto;" >
     
   <tr>
   <th>
<br>


@if(isset($peritaje->pinturacontrol->latoneriaparts))
<div class="col-10"   style=" width: 320px;  border: 1px solid;">
<p> VISTA IZQUIERDA</p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">
   
    <th>PIEZA</th>
    <th>ESTADO</th>
     

</tr>
@foreach($peritaje->pinturacontrol->latoneriaparts as $pintura)
@if($pintura->vista=="IZQUIERDA")
<tr>
    <td align="left">{{ $pintura->latoneriapart->name }}</td>
    <td align="left">{{ $pintura->estado }}</td>
    
     
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
<p> VISTA DERECHA </p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">
 
  <th>PIEZA</th>
  <th>ESTADO</th>
   

</tr>
@foreach($peritaje->pinturacontrol->latoneriaparts as $pintura)
@if($pintura->vista=="DERECHA")
<tr>
  <td align="left">{{ $pintura->latoneriapart->name }}</td>
  <td align="left">{{ $pintura->estado }}</td>
  
   
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
   <table   style="font-size: xx-small; margin: 0 auto;">
    <tr bgcolor="#19ea6d">
       
        <th>PIEZA</th>
        <th>ESTADO</th>
         
   
    </tr>
    @foreach($peritaje->pinturacontrol->latoneriaparts as $pintura)
    @if($pintura->vista=="POSTERIOR")
    <tr>
        <td align="left">{{ $pintura->latoneriapart->name }}</td>
        <td align="left">{{ $pintura->estado }}</td>
        
         
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
   <table   style="font-size: xx-small; margin: 0 auto;">
   <tr bgcolor="#19ea6d">
     
      <th>PIEZA</th>
      <th>ESTADO</th>
       
   
   </tr>
   @foreach($peritaje->pinturacontrol->latoneriaparts as $pintura)
   @if($pintura->vista=="FRONTAL")
   <tr>
      <td align="left">{{ $pintura->latoneriapart->name }}</td>
      <td align="left">{{ $pintura->estado }}</td>
      
       
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
       <table   style="font-size: xx-small; width: 100%; margin: 0 auto;" >
     
           <tr>
           <th>
   
   
   
    @if(isset($peritaje->vidriocontrol->vidrioparts))
    <div class="col-10"   style="  margin: 1em;  border: 1px solid;">
    <p> REVISION DE VIDRIOS {{$peritaje->vidriocontrol->nivelaprobado}}%</p>
    <table   style="font-size: xx-small; margin: 0 auto;">
        <tr bgcolor="#19ea6d">
           
            <th>PIEZA</th>
            <th>ESTADO</th>
        {{--    <th>TIPO</th>
            <th>OBSERVACION</th>--}}
   
        </tr>
        @foreach($peritaje->vidriocontrol->vidrioparts as $vidrio)
        <tr>
            <td align="left">{{ $vidrio->vidriopart->name }}</td>
            <td align="left">{{ $vidrio->estado }}</td>
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
    <div class="col-10"   style=" margin: 1em;  border: 1px solid;">
    <p>INTERIOR {{$peritaje->interiorcontrol->nivelaprobado}}%</p>
    <table style="font-size: xx-small; margin: 0 auto;">
        <tr bgcolor="#19ea6d">
           
            <th>PIEZA</th>
            <th>ESTADO</th>
           
            
   
        </tr>
        @foreach($peritaje->interiorcontrol->interiorparts as $interior)
        <tr>
            <td align="left">{{ $interior->interiorpart->name }}</td>
            <td align="left">{{ $interior->estado }}</td>
            
            
             
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


  <br>
  {{--inicio fuga de fluidos y niveles--}}
  <table   style="font-size: xx-small;width: 100%; margin: 0 auto;" >
     
   <tr>
   <th>



@if(isset($peritaje->fluidocontrol->fluidoparts))
<div class="col-10"   style="  margin: 1em; border: 1px solid;">
<p> FUGAS DE FLUIDOS {{$peritaje->fluidocontrol->nivelaprobado}}%</p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">
   
    <th>PIEZA</th>
    <th>ESTADO</th>
{{--    <th>TIPO</th>
    <th>OBSERVACION</th>--}}

</tr>
@foreach($peritaje->fluidocontrol->fluidoparts as $fluido)
<tr>
    <td align="left">{{ $fluido->fluidopart->name }}</td>
    <td align="left">{{ $fluido->estado }}</td>
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
<div class="col-10"   style="  margin: 1em; border: 1px solid;">
<p>NIVELES DE FLUIDOS {{$peritaje->nfluidocontrol->nivelaprobado}}%</p>
<table style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">
   
    <th>PIEZA</th>
    <th>ESTADO</th>
   
    

</tr>
@foreach($peritaje->nfluidocontrol->fluidoparts as $nfluido)
<tr>
    <td align="left">{{ $nfluido->fluidopart->name }}</td>
    <td align="left">{{ $nfluido->estado }}</td>
    
    
     
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
<table   style="font-size: xx-small;margin: 0 auto; width: 100%; " >
     
   <tr>
   <th>


        
@if(isset($peritaje->chasiscontrol->chasisparts))
<div class="col-10"   style="  margin: 1em;  border: 1px solid;">
<p> CHASIS {{$peritaje->chasiscontrol->nivelaprobado}}%</p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">
   
    <th>PIEZA</th>
    <th>ESTADO</th>
{{--    <th>TIPO</th>
    <th>OBSERVACION</th>--}}

</tr>
@foreach($peritaje->chasiscontrol->chasisparts as $chasis)
<tr>
    <td align="left">{{ $chasis->chasispart->name }}</td>
    <td align="left">{{ $chasis->estado }}</td>
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
<div class="col-10"   style="margin: 1em; border: 1px solid;">
<p>ESTADO DE LA SUSPENSION {{$peritaje->suspensioncontrol->nivelaprobado}}%</p>
<table style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">
   
    <th>PIEZA</th>
    <th>ESTADO</th>
   
    

</tr>
@foreach($peritaje->suspensioncontrol->suspensionparts as $suspension)
<tr>
    <td align="left">{{ $suspension->suspensionpart->name }}</td>
    <td align="left">{{ $suspension->estado }}</td>
     
     
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
<table   style="font-size: xx-small; width: 100%;  margin: 0 auto;" >
     
    <tr>
    <th>
 <br>
 
 
    @if(isset($peritaje->motorcontrol->piezasmotors))
    <div class="col-10"   style="margin: 1em;   border: 1px solid;">
 <p> PARTES DEL MOTOR {{$peritaje->motorcontrol->nivelaprobado}}%</p>
 <table   style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>ESTADO</th>
 {{--    <th>TIPO</th>
     <th>OBSERVACION</th>--}}
 
 </tr>
 @foreach($peritaje->motorcontrol->piezasmotors as $motor)
 <tr>
     <td  align="left">{{ $motor->motorpark->name }}</td>
     <td  align="left">{{ $motor->estado }}</td>
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
 <div class="col-10"   style=" margin: 1em;  border: 1px solid;">
 <p>ESTADO DE LAS LLANTAS {{$peritaje->llantacontrol->nivelaprobado}}%</p>
 <table style="font-size: xx-small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th>PIEZA</th>
     <th>PARA CAMBIO</th>
     <th>VIDA UTIL</th>
    
    
     
 
 </tr>
 @foreach($peritaje->llantacontrol->llantaparts as $llanta)
 <tr>
     <td  align="left">{{ $llanta->llantapart->name }}</td>
     <td  align="left">{{ $llanta->cambio }}</td>
     <td  align="left">{{ $llanta->vidautil }}</td>
      
     
     
      
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


<table   style="font-size: xx-small; margin: 0 auto;  width: 100%;" >
     
   <tr>
   <th>


      
@if(isset($peritaje->vlucescontrol->luzparts))
<div class="col-10"   style=" margin: 1em;  border: 1px solid;">
<p> LUCES {{$peritaje->vlucescontrol->nivelaprobado}}%</p>
<table   style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">
   
    <th>PIEZA</th>
    <th>ESTADO</th>
{{--    <th>TIPO</th>
    <th>OBSERVACION</th>--}}

</tr>
@foreach($peritaje->vlucescontrol->luzparts as $luces)
<tr>
    <td align="left">{{ $luces->luzpart->name }}</td>
    <td align="left">{{ $luces->estado }}</td>
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
   <div class="col-10"   style=" margin: 1em;  border: 1px solid;">
<p>EQUIPOS ELECTRICOS {{$peritaje->electricocontrol->nivelaprobado}}%</p>
<table style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">
   
    <th>PIEZA</th>
    <th>ESTADO</th>
   
    

</tr>
@foreach($peritaje->electricocontrol->piezaselectricas as $electrico)
<tr>
    <td align="left">{{ $electrico->electricalpart->name }}</td>
    <td align="left">{{ $electrico->estado }}</td>
    
    
     
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
<table   style="font-size: xx-small;  margin: 0 auto;" >  
    <tr>
    <th>

        <br>

       
        @if(isset($peritaje->luzcontrol->luzparts))
        <div class="col-10"   style=" margin: 1em;width: 370px;  border: 1px solid;">
        <p> RESULTADO DE LUCES {{$peritaje->luzcontrol->nivelaprobado}}%</p>
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
             <td align="left">{{ $luz->luzpart->name }}</td>
             <td align="left">{{ $luz->intensidad }}</td>
             <td align="left">{{ $luz->minimo }}</td>
             <td align="left">{{ $luz->unidad }}</td>
             <td align="left">{{ $luz->inclinacion }}</td>
             <td align="left">{{ $luz->rango }}</td>
        
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
        <div class="col-10"   style=" margin: 1em; width: 200px; border: 1px solid;">
@if(isset($peritaje->compresioncontrol->compresionparts))
<p>COMPRESION Y FUGAS DEL MOTOR {{$peritaje->compresioncontrol->nivelaprobado}}%</p>
<table style="font-size: xx-small; margin: 0 auto;">
<tr bgcolor="#19ea6d">

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
<textarea style="font-size: xx-small;  width: 150px;"   readonly>{{$peritaje->compresioncontrol->observacion}}</textarea>


        </div> 
        @endif
           

        </th>
    </tr>
</table> 
{{--fin de compresion y luces--}}


<br>
{{--  freno y simetria--}}
<p>
   <table   style="font-size: xx-small;margin: 0 auto;width: 100%;" >
     
       <tr>
       <th>
            
           @if(isset($peritaje->simetria)) 
           <div class="col-10"   style=" width: 300px;  border: 1px solid;">
           <p>SIMETRIA {{$peritaje->simetria->nivelaprobado}}%</p>
           
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
               height: 200px;"  src="{{ url('./iconos/chasis.jpg')}}"> </td>
           
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
<div class="col-10"   style=" width: 300px;  border: 1px solid;">
<p> PRUEBA DE FRENOS {{$peritaje->frenocontrol->nivelaprobado}}%</p>
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
{{--fin de semetria y frenos--}}


<br> 
   
       
@if(isset($peritaje->emisiongas))   
<div class="col-10"   style=" width: 620px;  border: 1px solid;">
<p>EMISION DE GASES</p>





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
{{---fin de gases --}}
{{--equipo y sofwware--}}
<table   style="font-size: xx-small;  margin: 0 auto; width: 100%;" >
     
    <tr>
    <th>
 
 
        
 @if(isset($peritaje->equipocontrol->equipoparts))
 <div class="col-10"   style="  margin: 1em; width: 350px;  border: 1px solid;">
 <p>EQUIPOS UTILIZADOS</p>
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
 <div class="col-10"   style="  margin: 1em; width: 250px;  border: 1px solid;">
 <p>SOFTWARE Y/O APLICATIVO UTILIZADO </p>
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

    <img  src="" alt="Firma del usuario" id="firma">

    <br>
    {{--<input style=" border: 0;" id="nombre" value="{{$nombre}}">--}}
  <label for="">Nombre:{{$vehiculo->solicitante}}</label><br>
  <label for="">{{$vehiculo->tipoidentificacion}}:{{$vehiculo->numeroidentificacion}}</label>
    <br> 
    <p class="text-justify">EN MI CALIDAD DE CLIENTE MANIFIESTO QUE HE SIDO INFORMADO DE LOS ALCANCES Y LIMITACIONES DEL SERVICIO PRESTADO.</p>
    <p class="text-justify">EL DOCUMENTO NO TENDRÁ VALOR SI FALTA ALGUNA DE SUS PÁGINAS, YA QUE ESTE ES INTEGRAL.</p>
    <script>
        if (window.opener) {
            document.querySelector("#firma").src = window.opener.obtenerImagen();
            // Imprimir documento. Si no quieres imprimir, remueve la siguiente línea
           // document.querySelector("#nombre").value ="";
            window.print();
        }
         
    </script>
</body>

</html>
 
