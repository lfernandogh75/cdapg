@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')


{{--
<div class="row">
  <div class="col-md-3">
    <label for="conorma" class="form-label">MONOXICO DE CARBONO C0</label>
  </div></div>

  <div class="row">
  <div class="col-md-3">
    <label for="conorma" class="form-label">NORMA</label>
  </div> 
  <div class="col-md-3">
    <label for="conorma" class="form-label">{{$emisiongas->conorma}}</label>
  </div>
  <div class="col-md-3">
 <label for="covlr" class="form-label">VLR</label>
  </div>
 <div class="col-md-3">
  <label for="covlr" class="form-label">{{$emisiongas->covlr}}</label>
  </div>
    </div>

    <div class="row">
      <div class="col-md-3">
        <label for="codosnorma" class="form-label">DIOXIDO DE CARBONO C02</label>
      </div></div>
    
      <div class="row">
      <div class="col-md-3">
        <label for="codosnorma" class="form-label">NORMA</label>
      </div> 
      <div class="col-md-3">
        <label for="conorma" class="form-label">{{$emisiongas->codosnorma}}</label>
      </div>
      <div class="col-md-3">
     <label for="codosvlr" class="form-label">VLR</label>
      </div>
     <div class="col-md-3">
      <label for="codosvlr" class="form-label">{{$emisiongas->codosvlr}}</label>
      </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <label for="oxnorma" class="form-label">OXIGENO O2</label>
          </div></div>
        
          <div class="row">
          <div class="col-md-3">
            <label for="oxnorma" class="form-label">NORMA</label>
          </div> 
          <div class="col-md-3">
            <label for="oxnorma" class="form-label">{{$emisiongas->oxnorma}}</label>
          </div>
          <div class="col-md-3">
         <label for="covlr" class="form-label">VLR</label>
          </div>
         <div class="col-md-3">
          <label for="oxvlr" class="form-label">{{$emisiongas->oxvlr}}</label>
          </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <label for="conorma" class="form-label">HIDROCARBUROS HC</label>
              </div></div>
            
              <div class="row">
              <div class="col-md-3">
                <label for="hcnorma" class="form-label">NORMA</label>
              </div> 
              <div class="col-md-3">
                <label for="hcnorma" class="form-label">{{$emisiongas->hcnorma}}</label>
              </div>
              <div class="col-md-3">
             <label for="hcvlr" class="form-label">VLR</label>
              </div>
             <div class="col-md-3">
              <label for="hcvlr" class="form-label">{{$emisiongas->hcvlr}}</label>
              </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <label for="conorma" class="form-label">OXIDO NITROSO NO</label>
                  </div></div>
                
                  <div class="row">
                  <div class="col-md-3">
                    <label for="conorma" class="form-label">NORMA</label>
                  </div> 
                  <div class="col-md-3">
                    <label for="nonorma" class="form-label">{{$emisiongas->nonorma}}</label>
                  </div>
                  <div class="col-md-3">
                 <label for="novlr" class="form-label">VLR</label>
                  </div>
                 <div class="col-md-3">
                  <label for="novlr" class="form-label">{{$emisiongas->novlr}}</label>
                  </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <label for="conorma" class="form-label">UNIDAD</label>
                      </div> 
                      <div class="col-md-3">
                        <label for="nonorma" class="form-label">{{$emisiongas->unidad}}</label>
                      </div></div>--}}


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
             <tr>
                 <td> {{$emisiongas->conorma}}</td>
                 <td> {{$emisiongas->covlr}}</td>
                 <td> {{$emisiongas->codosnorma}}</td>
                 <td> {{$emisiongas->codosvlr}}</td>
                 <td> {{$emisiongas->oxnorma}}</td>
                 <td> {{$emisiongas->oxvlr}}</td>
                 
                 <td> {{$emisiongas->hcnorma}}</td>
                 <td> {{$emisiongas->hcvlr}}</td>
                 <td> {{$emisiongas->nonorma}}</td>
                 <td> {{$emisiongas->novlr}}</td>
                 <td> {{$emisiongas->unidad}}</td>
                 
                  
             </tr>
             
            </table>
            
            
            <label style="font-size: small;">OBSERVACION</label><p>
            
            <textarea id="observacion" readonly name="observacion" style="font-size: small;  width: 600px;">N/A</textarea>
            
                               
    
<p>
     <a href="/vehiculos?placa={{$emisiongas->peritaje->vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
    </div>  

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

 
@endsection
@endsection

 