@extends('layouts.plantillaperitaje')
@section('contenido')
 
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Generate PDF  </title>
 {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"/>
 
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
        background-color: #19ea6d;
        color: white;
        text-align: center;
        line-height: 30px;
    }

    footer {
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 2cm;
        background-color: #19ea6d;
        color: white;
        text-align: center;
        line-height: 35px;
       
    }
    
        

</style>
<body>
  {{--  <header>
        <h1>CDA PARQUE DEL AGUA</h1>
    </header>--}}
    
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
    
    
    
     <table   style="font-size: xx-small" width="100%">
      
        <tr>
        <th> 
            <div   style=" 
              width: 300px;
            border-top-width: 25px;
            border-right-width:  thin;
            border-bottom-width:  thin; 
            border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
                
             
                @if(isset($peritaje->vehiculo))

   
                <p style="font-size: x-small;
                 font-size:10px;
                 margin-top:-19px;
                  margin-left:20px;
                "> <img    src="{{ url('./iconos/directions_car.png')}}">DATOS DEL PERITAJE</p>
                  
                  {{-- <img    src="{{ url('./iconos/directions_car.png')}}">--}}
                    
                   
                <table     style="font-size: xx-small"  >
                    <tr>
                       
                        <th bgcolor ="#19ea6d">FECHA</th>
                         <td>{{ $peritaje->created_at}}</td>
                        <th bgcolor ="#19ea6d">TIPO</th>
                         <td>{{ $peritaje->tipo }}</td>
                    </tr>
                    
                    <tr>
                       <th bgcolor ="#19ea6d">VEHICULO</th>
                       <td>{{ $peritaje->vehiculo->clase_vehiculo }}</td>
                       <th bgcolor ="#19ea6d">KILOMETRAJE</th>
                       <td>{{ $peritaje->vehiculo->km }}Km</td>
                    </tr>
                    
                     <tr>
                        <th bgcolor ="#19ea6d">SOLICITANTE</th>
                        <td>{{ $peritaje->vehiculo->solicitante}}</td>
                         <th bgcolor ="#19ea6d">{{$peritaje->vehiculo->tipoidentificacion }}</th>
                        <td>{{ $peritaje->vehiculo->numeroidentificacion}}</td>
                    </tr>
                   
                </table>
               
                
               @endif
        </div>
    </th> 
    <th>
            <div    style=" 
              width: 300px;
            border-top-width: 20px;
            border-right-width: thin;
            border-bottom-width: thick; 
            border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
                
             
                @if(isset($peritaje->tarjeta))
                <p style="font-size: x-small
                  font-size:10px;
                 margin-top:-19px;
                  margin-left:20px;
                ">DATOS DEL VEHICULO</p>
               <table    style="font-size: xx-small"  >
                   <tr> 
                       <th   bgcolor="#19ea6d">MODELO</th>
                       <td>{{ $peritaje->tarjeta->modelo}}</td>
                       <th bgcolor="#19ea6d">MARCA</th>
                       <td> {{$peritaje->tarjeta->marca->nombre}}</td>
                     
                   </tr>
                   <tr> 
                       <th  bgcolor="#19ea6d">CILINDRADA CC</th>
                       <td>{{ $peritaje->tarjeta->cilindrada}}</td>
                       <th bgcolor="#19ea6d">COLOR</th>
                       <td> {{$peritaje->tarjeta->color->nombre}}</td>
                       
                   </tr>
                   <tr>
                    <th  bgcolor="#19ea6d">LINEA</th>
                    <td> {{$peritaje->tarjeta->linea->nombre}}</td>
                    <th bgcolor="#19ea6d">SERVICIO</th>
                    <td> {{$peritaje->tarjeta->servicio->nombre}}</td>
                   </tr>
                   <tr>
                    <th  bgcolor="#19ea6d">COMBUSTIBLE</th>
                    <td> {{$peritaje->tarjeta->combustible->nombre}}</td>
                    <th  bgcolor="#19ea6d">CAPACIDAD</th>
                    <td> {{$peritaje->tarjeta->capacidad}}</td>
                   </tr>
                   <tr>
                    <th  bgcolor="#19ea6d">N MOTOR</th>
                    <td> {{$peritaje->tarjeta->numero_motor}}</td>
                    <th bgcolor="#19ea6d">N SERIE</th>
                    <td> {{$peritaje->tarjeta->numero_serie}}</td>
                   </tr>
                   <tr>
                    <th bgcolor="#19ea6d">N VIN</th>
                    <td> {{$peritaje->tarjeta->numero_vin}}</td>
                    <th bgcolor="#19ea6d">N CHASIS</th>
                    <td> {{$peritaje->tarjeta->numero_chasis}}</td>
                   </tr>
                   
                   
                  
               </table>
           
               @endif
    </div>
</th>
        </tr>
    </table> 
  
    <table   style="font-size: xx-small" width="100%">
      
        <tr>
        <th>


<div class="col-9"   style=" 
              width: 300px;
            border-top-width: 20px; 
           border-right-width: thin;
          
            border-bottom-width: thin; 
            border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
 @if(isset($peritaje->exteriorcontrol->piezasexteriores))
 <p style="font-size: xx-small;
                font-size:10px;
                 margin-top:-19px;
                  margin-left:20px;"> REVISION DE EXTERIORES</p>
 <table   style="font-size: xx-small;">
     <tr bgcolor="#19ea6d">
        
         <th>PIEZA</th>
         <th>ESTADO</th>
         <th>TIPO</th>
         <th>OBSERVACION</th>

     </tr>
     @foreach($peritaje->exteriorcontrol->piezasexteriores as $esterior)
     <tr>
         <td>{{ $esterior->exteriorpart->name }}</td>
         <td>{{ $esterior->estado }}</td>
         <td>{{ $esterior->tipo }}</td>
         <td>{{ $esterior->observaciones }}</td>
          
     </tr>
     @endforeach
 </table>
 @endif



            </div>
        </th>
        <th>

                <div class="col-10"   style="
                  width: 300px;
                border-top-width: 20px;
                border-right-width: thin;
                border-bottom-width: thin;
                border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
 @if(isset($peritaje->compresioncontrol->compresionparts))
 <p style="font-size: xx-small;
 font-size:10px;
  margin-top:-19px;
   margin-left:20px;">COMPRESION Y FUGAS DEL MOTOR</p>
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
 @endif
                </div> 

            </th>
        </tr>
    </table> 
   
   
    <div style=" border-top-width: 20px;
    border-right-width: 1em;
    border-bottom-width: thick; 
    border-left-width: thin;  border-radius: 5px 30px 5px 5px;  border-color: rgba(239, 107, 19, 0.951);">

    @if(isset($peritaje->fotocontrol->fotoparts))
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
   <td>   <img src="{{ url('./imagen/'.$foto[0]->imagen)}}" width="50%"></td>
   <td>{{ $foto[0]->observacion }}</td>
   @else
     @for($i=0;$i<$c;$i++)
    
     <tr>
              @if($i%2==0)  
            <td>{{ $foto[$i]->fotopart->name }}</td>
            <td>   <img src="{{ url('./imagen/'.$foto[$i]->imagen)}}" width="50%"></td>
            <td>{{ $foto[$i]->observacion }}</td>
            @endif
          @if(($i+1)%2!=0)
            <td>{{ $foto[$i+1]->fotopart->name }}</td>
            <td>   <img src="{{ url('./imagen/'.$foto[$i+1]->imagen)}}" width="50%"></td>
            <td>{{ $foto[$i+1]->observacion }}</td>
            @endif
             
        </tr>
        @endfor
        @if($c%2==0)
        <td>{{ $foto[$c]->fotopart->name }}</td>
            <td>   <img src="{{ url('./imagen/'.$foto[$c]->imagen)}}" width="50%"></td>
            <td>{{ $foto[$c]->observacion }}</td>
            @endif
      @endif
      {{-- @endforeach--}} 
    </table>
    @endif
    </div>
 {{--   <footer>
        <h1>CDA PARQUE DEL AGUA</h1>
    </footer>--}}
</body>
</html>
@endsection