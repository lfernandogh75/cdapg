@extends('layouts.plantillaperitaje')

@section('css')
{{--<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">--}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('contenido')
<form action="/emisiongass" method="POST">
  @csrf
 
 {{--
  <div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> <div class="row">
      <div class="col-9"><label >MONOXICO DE CARBONO</label></div>
      <div class="col-12">  <label >NORMA</label></div>
      <div class="col-6">  <input id="conorma" name="conorma" type="text" required ></div>
    </div> </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> <div class="row">
      <div class="col-9"><label >C0</label></div>
      <div class="col-12">  <label >VLR</label></div>
      <div class="col-6">  <input id="covlr" name="covlr" type="text" required ></div>
    </div></div>
    </div>
 
   
  
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> <div class="row">
        <div class="col-9"><label >DIOXIDO DE CARBONO</label></div>
        <div class="col-12">  <label >NORMA</label></div>
        <div class="col-6">  <input id="codosnorma" name="codosnorma" type="text" required></div>
      </div> </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> <div class="row">
        <div class="col-9"><label >C02</label></div>
        <div class="col-12">  <label >VLR</label></div>
        <div class="col-6">  <input id="codosvlr" name="codosvlr" type="text" required ></div>
      </div></div>
      </div>
    
      
     
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> <div class="row">
          <div class="col-9"><label >OXIGENO</label></div>
          <div class="col-12">  <label >NORMA</label></div>
          <div class="col-6">  <input id="oxnorma" name="oxnorma" type="text" required></div>
        </div> </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> <div class="row">
          <div class="col-9"><label >02</label></div>
          <div class="col-12">  <label >VLR</label></div>
          <div class="col-6">  <input id="oxvlr" name="oxvlr" type="text" required ></div>
        </div></div>
        </div>
      
       
      
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> <div class="row">
            <div class="col-9"><label >HIDROCARBUROS</label></div>
            <div class="col-12">  <label >NORMA</label></div>
            <div class="col-6">  <input id="hcnorma" name="hcnorma" type="text" required></div>
          </div> </div>
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> <div class="row">
            <div class="col-9"><label >HC</label></div>
            <div class="col-12">  <label >VLR</label></div>
            <div class="col-6">  <input id="hcvlr" name="hcvlr" type="text" required ></div>
          </div></div>
          </div>
       
          <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> <div class="row">
              <div class="col-9"><label >OXIDO NITROSO</label></div>
              <div class="col-12">  <label >NORMA</label></div>
              <div class="col-6">  <input id="nonorma" name="nonorma" type="text" required></div>
            </div> </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> <div class="row">
              <div class="col-9"><label >NO</label></div>
              <div class="col-12">  <label >VLR</label></div>
              <div class="col-6">  <input id="novlr" name="novlr" type="text" required ></div>
            </div></div>
            </div>
         
      <p><p>
  
                      <div class="row">
                        <div class="col-md-3">
                          <label for="conorma" class="form-label">UNIDAD</label>
                         
                        </div> 
                        <div class="col-md-3">
                         
                          <input id="unidad" name="unidad" type="text" required >
                        </div></div>


                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">OBSERVACIÓN GENERAL</label>
                          <textarea class="form-control" name="observacion" id="observacion" rows="3" required >N/A</textarea>
                        </div>
 
    
    <div class="col-md-3"> 
      <input type="hidden"   class="form-control" id="peritaje_id" name="peritaje_id"  value="{{$vehiculo->peritaje->id}}">
  </div>
     <a href="/vehiculos?placa={{$vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>--}}


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
     <td><input id="conorma" name="conorma" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
     <td><input id="covlr" name="covlr" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="codosvlr" name="codosnorma" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required value="N/A" ></td>
     <td><input id="codosvlr" name="codosvlr" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="oxnorma" name="oxnorma" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
     <td><input id="oxvlr" name="oxvlr" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     
     <td><input id="hcnorma" name="hcnorma" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
     <td><input id="hcvlr" name="hcvlr" type="text" style="width : 70px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="nonorma" name="nonorma" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
     <td><input id="novlr" name="novlr" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
     <td><input id="unidad" name="unidad" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required value="ppm" ></td>
     
      
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

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script src="/js/marca_lineas.js">

</script>
@endsection
@endsection

 