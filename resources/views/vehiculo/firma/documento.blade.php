<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1></h1>
  
   
 @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        img {
            display: block;
            margin-left: middle;
            margin-right: auto;
            width:100px;
             height:50px;
             
        }
        .text-justify {
  text-align: justify;
}
    </style>
     <title>INSPECCIÓN Nº  {{ $vehiculo->peritaje_id }}
      

    
    </title>
 
</head>

<body>
    @if(isset($vehiculo->placa))
    <div   style=" border-top-width: 5px;
     border-right-width: 5px;
     border-bottom-width: 5px;
     width: 100px;
   height: 40px; 
   font-weight: bold;
   background-color: #eafe39;
     border-left-width: 5px;  border-radius: 5px 5px 5px 5px;  border-color: rgba(11, 5, 0, 0.951); text-align:center;">
      
    
      {{ $vehiculo->placa }}</div>
      @endif 

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
    <img src="" alt="Firma del usuario" id="firma">
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
 
