@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')

@if($emisiongas->peritaje->vehiculo->clase_vehiculo=="Motocicleta")
<form action="{{route('emisiongass.update',$emisiongas->id)}}" method="POST">
  @csrf
  @method('PUT')

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
<td><input id="conorma" name="conorma" value="{{$emisiongas->conorma}}" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="covlr" name="covlr" type="text" value="{{$emisiongas->covlr}}" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="counidad" name="counidad" value="{{$emisiongas->counidad}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
<td><input id="codosvlr" name="codosnorma" value="{{$emisiongas->codosnorma}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required  ></td>
<td><input id="codosvlr" name="codosvlr" value="{{$emisiongas->codosvlr}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="codosunidad" name="codosunidad" value="{{$emisiongas->codosunidad}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
<td><input id="oxnorma" name="oxnorma" value="{{$emisiongas->oxnorma}}" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="oxvlr" name="oxvlr" value="{{$emisiongas->oxvlr}}" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="oxunidad" name="oxunidad" value="{{$emisiongas->oxunidad}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
<td><input id="hcnorma" name="hcnorma" value="{{$emisiongas->hcnorma}}" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="hcvlr" name="hcvlr" type="text" value="{{$emisiongas->hcvlr}}" style="width : 70px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="hcunidad" name="hcunidad" value="{{$emisiongas->hcunidad}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
<td><input id="nonorma" name="nonorma" value="{{$emisiongas->nonorma}}" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="novlr" name="novlr" value="{{$emisiongas->novlr}}" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="nounidad" name="nounidad" value="{{$emisiongas->nounidad}}" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required value="ppm" ></td>


</tr>

</table>


<label style="font-size: small;">OBSERVACION</label><p>

<textarea id="observacion" name="observacion" style="font-size: small;  width: 600px;">{{$emisiongas->observacion}}</textarea>

<p>
  


     <a href="/vehiculos?placa={{$emisiongas->peritaje->vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</div>
</form>
@endif


@if($emisiongas->peritaje->vehiculo->clase_vehiculo!="Motocicleta" && $emisiongas->peritaje->vehiculo->peritaje->tarjeta->combustible->nombre!="DIESEL")
<form action="{{route('emisiongass.update',$emisiongas->id)}}" method="POST">
  @csrf
  @method('PUT')

  <div class="col-10"   style=" 
  width: 950px;
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
<th></th>
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
<td><input id="conorma" name="conorma" value="{{$emisiongas->conorma}}" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="covlr" name="covlr" type="text" value="{{$emisiongas->covlr}}" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="counidad" name="counidad" value="{{$emisiongas->counidad}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
<td><input id="codosvlr" name="codosnorma" value="{{$emisiongas->codosnorma}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required  ></td>
<td><input id="codosvlr" name="codosvlr" value="{{$emisiongas->codosvlr}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="codosunidad" name="codosunidad" value="{{$emisiongas->codosunidad}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
<td><input id="oxnorma" name="oxnorma" value="{{$emisiongas->oxnorma}}" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="oxvlr" name="oxvlr" value="{{$emisiongas->oxvlr}}" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="oxunidad" name="oxunidad" value="{{$emisiongas->oxunidad}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
<td><input id="hcnorma" name="hcnorma" value="{{$emisiongas->hcnorma}}" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="hcvlr" name="hcvlr" type="text" value="{{$emisiongas->hcvlr}}" style="width : 70px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="hcunidad" name="hcunidad" value="{{$emisiongas->hcunidad}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
<td><input id="nonorma" name="nonorma" value="{{$emisiongas->nonorma}}" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="novlr" name="novlr" value="{{$emisiongas->novlr}}" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="nounidad" name="nounidad" value="{{$emisiongas->nounidad}}" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required value="ppm" ></td>


</tr>
</tr>
<tr>
  <td><p   style="width : 45px; heigth : 10px;font-size: x-small">Crucero</p></td>
<td><input id="conormac" name="conormac" value="{{$emisiongas->conormac}}" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="covlrc" name="covlrc" type="text" value="{{$emisiongas->covlrc}}" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="counidadc" name="counidadc" value="{{$emisiongas->counidadc}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
<td><input id="codosvlrc" name="codosnormac" value="{{$emisiongas->codosnormac}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required  ></td>
<td><input id="codosvlrc" name="codosvlrc" value="{{$emisiongas->codosvlrc}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="codosunidadc" name="codosunidadc" value="{{$emisiongas->codosunidadc}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
<td><input id="oxnormac" name="oxnormac" value="{{$emisiongas->oxnormac}}" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="oxvlrc" name="oxvlrc" value="{{$emisiongas->oxvlrc}}" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="oxunidadc" name="oxunidadc" value="{{$emisiongas->oxunidadc}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
<td><input id="hcnormac" name="hcnormac" value="{{$emisiongas->hcnormac}}" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="hcvlrc" name="hcvlrc" type="text" value="{{$emisiongas->hcvlrc}}" style="width : 70px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="hcunidadc" name="hcunidadc" value="{{$emisiongas->hcunidadc}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
<td><input id="nonormac" name="nonormac" value="{{$emisiongas->nonormac}}" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="novlrc" name="novlrc" value="{{$emisiongas->novlrc}}" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="nounidadc" name="nounidadc" value="{{$emisiongas->nounidadc}}" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required value="ppm" ></td>


</tr>

</table>


<label style="font-size: small;">OBSERVACION</label><p>

<textarea id="observacion" name="observacion" style="font-size: small;  width: 600px;">{{$emisiongas->observacion}}</textarea>

<p>
  


     <a href="/vehiculos?placa={{$emisiongas->peritaje->vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</div>
</form>
@endif



@if($emisiongas->peritaje->vehiculo->peritaje->tarjeta->combustible->nombre=="DIESEL")
<form action="{{route('emisiongass.update',$emisiongas->id)}}" method="POST">
  @csrf
  @method('PUT')
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
  <td><input value="{{$emisiongas->opacidadcuno}}" id="opacidadcuno" name="opacidadcuno" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input value="{{$emisiongas->opacidadcunou}}"  id="opacidadcunou" name="opacidadcunou" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required  value="%"></td>
  <td><input value="{{$emisiongas->opacidadcdos}}" id="opacidadcdos" name="opacidadcdos" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required   ></td>
  <td><input value="{{$emisiongas->opacidadcdosu}}" id="opacidadcdosu" name="opacidadcdosu" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required  value="%" ></td>
  <td><input value="{{$emisiongas->opacidadctres}}" id="opacidadctres" name="opacidadctres" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input value="{{$emisiongas->opacidadctresu}}" id="opacidadctresu" name="opacidadctresu" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required  value="%" ></td>
  <td><input value="{{$emisiongas->opacidadccuatro}}" id="opacidadccuatro" name="opacidadccuatro" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input value="{{$emisiongas->opacidadccuatrou}}" id="opacidadccuatrou" name="opacidadccuatrou" type="text" style="width : 70px; heigth : 10px;font-size: x-small" required   value="%"></td>
     
     
      
 </tr>
 <tr> <td><p   style="width : 60px; heigth : 10px;font-size: x-small">Gobernada</p></td>
  <td><input value="{{$emisiongas->gobernadacuno}}" id="gobernada" name="gobernadacuno" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input value="{{$emisiongas->gobernadau}}" id="gobernadacunou" name="gobernadacunou" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required  value="rpm"></td>
  <td><input value="{{$emisiongas->gobernadacdos}}" id="gobernadacdos" name="gobernadacdos" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required   ></td>
  <td><input value="{{$emisiongas->gobernadacdosu}}" id="gobernadacdosu" name="gobernadacdosu" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required  value="rpm" ></td>
  <td><input value="{{$emisiongas->gobernadactres}}" id="gobernadactres" name="gobernadactres" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input value="{{$emisiongas->gobernadactresu}}"  id="gobernadactresu" name="gobernadactresu" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required  value="rpm" ></td>
  <td><input value="{{$emisiongas->gobernadaccuatro}}"  id="gobernadaccuatro" name="gobernadaccuatro" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
  <td><input  value="{{$emisiongas->gobernadaccuatrou}}" id="gobernadaccuatrou" name="gobernadaccuatrou" type="text" style="width : 70px; heigth : 10px;font-size: x-small" required   value="rpm"></td>
  
  
   
</tr>
</tr>
<tr> <td><p   style="width : 60px; heigth : 10px;font-size: x-small">Valor:</p></td>
 <td><input  value="{{$emisiongas->resultado}}" id="resultado" name="resultado" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
 <td><p   style="width : 60px; heigth : 10px;font-size: x-small">Norma:</p></td>
 <td><input  value="{{$emisiongas->norma}}" id="norma" name="norma" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required></td>
 <td><p   style="width : 60px; heigth : 10px;font-size: x-small">Unidad:</p></td>
 <td><input  value="{{$emisiongas->unidad}}" id="unidad" name="unidad" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required    ></td>
  
 
  
 
 
  
</tr>
 
</table>


<label style="font-size: small;">OBSERVACION</label><p>

<textarea id="observacion" name="observacion" style="font-size: small;  width: 600px;">N/A</textarea>

       <p>

        
        <a href="/vehiculos?placa={{$emisiongas->peritaje->vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
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
<script src="/js/marca_lineas_edit.js">
</script>
@endsection
@endsection

 