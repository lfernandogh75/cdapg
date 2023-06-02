@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')

@if($emisiongas->peritaje->vehiculo->clase_vehiculo=="Motocicleta")
 


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
          
          <p>
            <div class="row">
              <div class="col-md-3">
                <label for="modelo" class="form-label">ENCARGADO : </label>
              </div>
              <div class="col-md-3">
                <label for="modelo" class="form-label">{{$emisiongas->user->name}}</label>
              </div>
            </div>
           <p> 
          
          
          
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
                 <td> {{$emisiongas->conorma}}</td>
                 <td> {{$emisiongas->covlr}}</td>
                 <td> {{$emisiongas->counidad}}</td>
                 <td> {{$emisiongas->codosnorma}}</td>
                 <td> {{$emisiongas->codosvlr}}</td>
                 <td> {{$emisiongas->codosunidad}}</td>
                 <td> {{$emisiongas->oxnorma}}</td>
                 <td> {{$emisiongas->oxvlr}}</td>
                 <td> {{$emisiongas->oxunidad}}</td>
                 
                 <td> {{$emisiongas->hcnorma}}</td>
                 <td> {{$emisiongas->hcvlr}}</td>
                 <td> {{$emisiongas->hcunidad}}</td>
                 <td> {{$emisiongas->nonorma}}</td>
                 <td> {{$emisiongas->novlr}}</td>
                 <td> {{$emisiongas->nounidad}}</td>
                 
                  
             </tr>
             
            </table>
            
            
            <label style="font-size: small;">OBSERVACION</label><p>
            
            <textarea id="observacion" readonly name="observacion" style="font-size: small;  width: 600px;">N/A</textarea>
            
                               
    
<p>
     <a href="/vehiculos?placa={{$emisiongas->peritaje->vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
    </div> 
    @endif 


    @if($emisiongas->peritaje->vehiculo->clase_vehiculo!="Motocicleta" && $emisiongas->peritaje->vehiculo->peritaje->tarjeta->combustible->nombre!="DIESEL" )
 


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
          
          <p>
            <div class="row">
              <div class="col-md-3">
                <label for="modelo" class="form-label">ENCARGADO : </label>
              </div>
              <div class="col-md-3">
                <label for="modelo" class="form-label">{{$emisiongas->user->name}}</label>
              </div>
            </div>
           <p> 
          
          
          
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
                 <td> {{$emisiongas->conorma}}</td>
                 <td> {{$emisiongas->covlr}}</td>
                 <td> {{$emisiongas->counidad}}</td>
                 <td> {{$emisiongas->codosnorma}}</td>
                 <td> {{$emisiongas->codosvlr}}</td>
                 <td> {{$emisiongas->codosunidad}}</td>
                 <td> {{$emisiongas->oxnorma}}</td>
                 <td> {{$emisiongas->oxvlr}}</td>
                 <td> {{$emisiongas->oxunidad}}</td>
                 
                 <td> {{$emisiongas->hcnorma}}</td>
                 <td> {{$emisiongas->hcvlr}}</td>
                 <td> {{$emisiongas->hcunidad}}</td>
                 <td> {{$emisiongas->nonorma}}</td>
                 <td> {{$emisiongas->novlr}}</td>
                 <td> {{$emisiongas->nounidad}}</td>
                 
                  
             </tr>
             <tr>
              <td><p   style="width : 45px; heigth : 10px;font-size: x-small">Crucero</p></td>
              <td> {{$emisiongas->conormac}}</td>
              <td> {{$emisiongas->covlrc}}</td>
              <td> {{$emisiongas->counidadc}}</td>
              <td> {{$emisiongas->codosnormac}}</td>
              <td> {{$emisiongas->codosvlrc}}</td>
              <td> {{$emisiongas->codosunidadc}}</td>
              <td> {{$emisiongas->oxnormac}}</td>
              <td> {{$emisiongas->oxvlrc}}</td>
              <td> {{$emisiongas->oxunidadc}}</td>
              
              <td> {{$emisiongas->hcnormac}}</td>
              <td> {{$emisiongas->hcvlrc}}</td>
              <td> {{$emisiongas->hcunidadc}}</td>
              <td> {{$emisiongas->nonormac}}</td>
              <td> {{$emisiongas->novlrc}}</td>
              <td> {{$emisiongas->nounidadc}}</td>
              
               
          </tr>
             
            </table>
            
            
            <label style="font-size: small;">OBSERVACION</label><p>
            
            <textarea id="observacion" readonly name="observacion" style="font-size: small;  width: 600px;">N/A</textarea>
            
                               
    
<p>
     <a href="/vehiculos?placa={{$emisiongas->peritaje->vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
    </div> 
    @endif 


    @if(($emisiongas->peritaje->vehiculo->clase_vehiculo=="Pesados"||$emisiongas->peritaje->vehiculo->clase_vehiculo=="Automóvil")&&($emisiongas->peritaje->vehiculo->peritaje->tarjeta->combustible->nombre=="DIESEL"))
     
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
     <tr> <td><p   style="width : 60px; heigth : 10px;font-size: x-small">GOBERNADA</p></td>
      <td><input value="{{$emisiongas->gobernadacuno}}" id="gobernadacuno" name="gobernadacunocuno" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
      <td><input value="{{$emisiongas->gobernadacunou}}" id="gobernadacunocunou" name="gobernadacunocunou" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required  value="rpm"></td>
      <td><input value="{{$emisiongas->gobernadacdos}}" id="gobernadacdos" name="gobernadacunocdos" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required   ></td>
      <td><input value="{{$emisiongas->gobernadacdosu}}" id="gobernadacdosu" name="gobernadacunocdosu" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required  value="rpm" ></td>
      <td><input value="{{$emisiongas->gobernadactres}}" id="gobernadactres" name="gobernadacunoctres" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
      <td><input value="{{$emisiongas->gobernadactresu}}"  id="gobernadactresu" name="gobernadacunoctresu" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required  value="rpm" ></td>
      <td><input value="{{$emisiongas->gobernadaccuatro}}"  id="gobernadaccuatro" name="gobernadacunoccuatro" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
      <td><input  value="{{$emisiongas->gobernadaccuatrou}}" id="gobernadaccuatrou" name="gobernadacunoccuatrou" type="text" style="width : 70px; heigth : 10px;font-size: x-small" required   value="rpm"></td>
      
      
       
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
      </div>    
    @endif
    



@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

 
@endsection
@endsection

 