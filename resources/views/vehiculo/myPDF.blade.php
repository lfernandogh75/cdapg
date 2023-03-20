@extends('layouts.plantillaperitaje')
@section('contenido')
 
<!DOCTYPE html>
<html>
<head>
    <title> Generate PDF  </title>
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
      <p>
        <table     style="font-size: xx-small; margin: 0 auto;"  >
            <tr>
               
                <th bgcolor ="#19ea6d">FECHA</th>
                 <td>{{ $peritaje->created_at}}</td>
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
    
</body>
</html>
@endsection