@extends('layouts.plantillaperitaje')

@section('css')
{{--<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">--}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('contenido')

@if($vehiculo->clase_vehiculo=="Motocicleta")
<form action="/emisiongass" method="POST">
  @csrf
<div class="col-10"   style=" 
          width: 900px;
        border-top-width: 30px; 
       border-right-width: thin;
      
        border-bottom-width: thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
 
<p style="font-size: small;
            font-size:10px;
             margin-top:-19px;
              margin-left:20px;">EMISION DE GASES</p>
<table   style="font-size: small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th COLSPAN=3>MONOXICO DE CARBONO CO</th>
     <th COLSPAN=3>DIOXIDO DE CARBONO CO2</th>
     <th COLSPAN=3>OXIGENO O2</th>
     <th COLSPAN=3>HIDROCARBUROS HC</th>
     <th COLSPAN=3>OXIDO NITROSO NO</th>
    
     

 </tr>
  
 <tr>
     <td>NORMA </td>
     <td>VALOR</td>
     <th>UNIDAD</th>
     <td>NORMA </td>
     <td>VALOR</td>
     <th>UNIDAD</th>
     <td>NORMA </td>
     <td>VALOR</td>
     <th>UNIDAD</th>
     <td>NORMA </td>
     <td>VALOR</td>
     <th>UNIDAD</th>
     <td>NORMA </td>
     <td>VALOR</td>
     <th>UNIDAD</th>
 </tr>
 <tr>
     <td><input id="conorma" name="conorma" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
     <td><input id="covlr" name="covlr" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="counidad" name="counidad" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="codosvlr" name="codosnorma" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required value="N/A" ></td>
     <td><input id="codosvlr" name="codosvlr" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="codosunidad" name="codosunidad" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="oxnorma" name="oxnorma" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
     <td><input id="oxvlr" name="oxvlr" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="oxunidad" name="oxunidad" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="hcnorma" name="hcnorma" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
     <td><input id="hcvlr" name="hcvlr" type="text" style="width : 70px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="hcunidad" name="hcunidad" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="nonorma" name="nonorma" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
     <td><input id="novlr" name="novlr" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="nounidad" name="nounidad" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     
      
 </tr>
 
</table>


<label style="font-size: small;">OBSERVACION</label><p>

<textarea id="observacion" name="observacion" style="font-size: small;  width: 600px;">N/A</textarea>

       <p>

        <div class="col-md-3"> 
          <input type="hidden"   class="form-control" id="peritaje_id" name="peritaje_id"  value="{{$vehiculo->peritaje->id}}">
      </div>
         <a href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>  
  </div>    
@endif



@if($vehiculo->peritaje->tarjeta->combustible->nombre=="DIESEL")
<form action="/emisiongass" method="POST">
  @csrf
<div class="col-10"   style=" 
          width: 700px;
        border-top-width: 30px; 
       border-right-width: thin;
      
        border-bottom-width: thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
 
<p style="font-size: small;
            font-size:10px;
             margin-top:-19px;
              margin-left:20px;">EMISION DE GASES</p>
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
 <tr> <td><p   style="width : 60px; heigth : 10px;font-size: x-small">OPACIDAD</p></td>
  <td><input id="opacidadcuno" name="opacidadcuno" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input id="opacidadcunou" name="opacidadcunou" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required  value="%"></td>
  <td><input id="opacidadcdos" name="opacidadcdos" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required   ></td>
  <td><input id="opacidadcdosu" name="opacidadcdosu" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required  value="%" ></td>
  <td><input id="opacidadctres" name="opacidadctres" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input id="opacidadctresu" name="opacidadctresu" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required  value="%" ></td>
  <td><input id="opacidadccuatro" name="opacidadccuatro" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input id="opacidadccuatrou" name="opacidadccuatrou" type="text" style="width : 70px; heigth : 10px;font-size: x-small" required   value="%"></td>
     
     
      
 </tr>
 <tr> <td><p   style="width : 60px; heigth : 10px;font-size: x-small">Gobernada</p></td>
  <td><input id="gobernadacuno" name="gobernadacuno" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input id="gobernadacunou" name="gobernadacunou" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required  value="rpm"></td>
  <td><input id="gobernadacdos" name="gobernadacdos" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required   ></td>
  <td><input id="gobernadacdosu" name="gobernadacdosu" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required  value="rpm" ></td>
  <td><input id="gobernadactres" name="gobernadactres" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input id="gobernadactresu" name="gobernadactresu" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required  value="rpm" ></td>
  <td><input id="gobernadaccuatro" name="gobernadaccuatro" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input id="gobernadaccuatrou" name="gobernadaccuatrou" type="text" style="width : 70px; heigth : 10px;font-size: x-small" required   value="rpm"></td>
  
  
   
</tr>
</tr>
<tr> <td><p   style="width : 60px; heigth : 10px;font-size: x-small">Valor:</p></td>
 <td><input id="resultado" name="resultado" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
 <td><p   style="width : 60px; heigth : 10px;font-size: x-small">Norma:</p></td>
 <td><input id="norma" name="norma" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
 <td><p   style="width : 60px; heigth : 10px;font-size: x-small">Unidad:</p></td>
 <td><input id="unidad" name="unidad" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required  value="%" ></td>
  
 
  
 
 
  
</tr>
 
</table>


<label style="font-size: small;">OBSERVACION</label><p>

<textarea id="observacion" name="observacion" style="font-size: small;  width: 600px;">N/A</textarea>

       <p>

        <div class="col-md-3"> 
          <input type="hidden"   class="form-control" id="peritaje_id" name="peritaje_id"  value="{{$vehiculo->peritaje->id}}">
      </div>
         <a href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>  
  </div>    
@endif


@if($vehiculo->clase_vehiculo!="Motocicleta" || $vehiculo->peritaje->tarjeta->combustible->nombre!="DIESEL")
<form action="/emisiongass" method="POST">
  @csrf
<div class="col-10"   style=" 
          width: 900px;
        border-top-width: 30px; 
       border-right-width: thin;
      
        border-bottom-width: thin; 
        border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">
 
<p style="font-size: small;
            font-size:10px;
             margin-top:-19px;
              margin-left:20px;">EMISION DE GASES</p>
<table   style="font-size: small; margin: 0 auto;">
 <tr bgcolor="#19ea6d">
    
     <th COLSPAN=3>MONOXICO DE CARBONO CO</th>
     <th COLSPAN=3>DIOXIDO DE CARBONO CO2</th>
     <th COLSPAN=3>OXIGENO O2</th>
     <th COLSPAN=3>HIDROCARBUROS HC</th>
     <th COLSPAN=3>OXIDO NITROSO NO</th>
    
     

 </tr>
  
 <tr>
  <td></td>
     <td>NORMA </td>
     <td>VALOR</td>
     <th>UNIDAD</th>
     <td>NORMA </td>
     <td>VALOR</td>
     <th>UNIDAD</th>
     <td>NORMA </td>
     <td>VALOR</td>
     <th>UNIDAD</th>
     <td>NORMA </td>
     <td>VALOR</td>
     <th>UNIDAD</th>
     <td>NORMA </td>
     <td>VALOR</td>
     <th>UNIDAD</th>
 </tr>
 <tr>
  <td><p   style="width : 45px; heigth : 10px;font-size: x-small">Relenti</p></td>
     <td><input id="conorma" name="conorma" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
     <td><input id="covlr" name="covlr" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="counidad" name="counidad" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="codosvlr" name="codosnorma" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required value="N/A" ></td>
     <td><input id="codosvlr" name="codosvlr" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="codosunidad" name="codosunidad" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="oxnorma" name="oxnorma" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
     <td><input id="oxvlr" name="oxvlr" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="oxunidad" name="oxunidad" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="hcnorma" name="hcnorma" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
     <td><input id="hcvlr" name="hcvlr" type="text" style="width : 70px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="hcunidad" name="hcunidad" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="nonorma" name="nonorma" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
     <td><input id="novlr" name="novlr" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="nounidad" name="nounidad" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     
      
 </tr>
 <tr>
  <td><p   style="width : 45px; heigth : 10px;font-size: x-small">Crucero</p></td>
  <td><input id="conormac" name="conormac" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input id="covlrc" name="covlrc" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
  <td><input id="counidadc" name="counidadc" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
  <td><input id="codosvlrc" name="codosnormac" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required value="N/A" ></td>
  <td><input id="codosvlrc" name="codosvlrc" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required ></td>
  <td><input id="codosunidadc" name="codosunidadc" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
  <td><input id="oxnormac" name="oxnormac" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input id="oxvlrc" name="oxvlrc" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
  <td><input id="oxunidadc" name="oxunidadc" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
  <td><input id="hcnormac" name="hcnormac" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input id="hcvlrc" name="hcvlrc" type="text" style="width : 70px; heigth : 10px;font-size: x-small" required ></td>
  <td><input id="hcunidadc" name="hcunidadc" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
  <td><input id="nonormac" name="nonormac" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input id="novlrc" name="novlrc" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
  <td><input id="nounidadc" name="nounidadc" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
  
   
</tr>
 
</table>


<label style="font-size: small;">OBSERVACION</label><p>

<textarea id="observacion" name="observacion" style="font-size: small;  width: 600px;">N/A</textarea>

       <p>

        <div class="col-md-3"> 
          <input type="hidden"   class="form-control" id="peritaje_id" name="peritaje_id"  value="{{$vehiculo->peritaje->id}}">
      </div>
         <a href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>  
  </div>    
@endif




@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script src="/js/marca_lineas.js">

</script>
@endsection
@endsection

 