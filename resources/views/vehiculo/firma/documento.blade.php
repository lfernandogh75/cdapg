<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POLITICA TRATAMIENTOS DE DATOS</title>
    <style>
        img {
            display: block;
            margin-left: middle;
            margin-right: auto;
            width:100px;
             height:50px;
             
        }
    </style>
</head>

<body>
    <h1>TRATAMIENTOS DE DATOS</h1>
    <strong> Dando cumplimiento a lo dispuesto en la Ley 1581 de 2012, "Por el cual se dictan disposiciones
        generales para la protección de datos personales" y de conformidad con lo señalado en el Decreto
        1377 de 2013, con la firma de este documento manifiesto que he sido informado por el CDA parque del agua
         de lo siguiente: </p>
    <p> </p>
    <p> </p>
    <p> 
    </p>
    <p> 
       
    </p>
    <p> </p>
    <h2>A continuación la firma</h2>
    <img src="" alt="Firma del usuario" id="firma">
    <br>
    {{--<input style=" border: 0;" id="nombre" value="{{$nombre}}">--}}
  <label for="">Nombre:{{$vehiculo->solicitante}}</label><br>
  <label for="">{{$vehiculo->tipoidentificacion}}:{{$vehiculo->numeroidentificacion}}</label>
    <br> 
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
 
