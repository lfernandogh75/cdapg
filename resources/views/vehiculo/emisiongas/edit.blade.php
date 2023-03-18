@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
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
<td><input id="conorma" name="conorma" value="{{$emisiongas->conorma}}" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="covlr" name="covlr" type="text" value="{{$emisiongas->covlr}}" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="codosvlr" name="codosnorma" value="{{$emisiongas->codosnorma}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required value="N/A" ></td>
<td><input id="codosvlr" name="codosvlr" value="{{$emisiongas->codosvlr}}" type="text" style="width : 60px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="oxnorma" name="oxnorma" value="{{$emisiongas->oxnorma}}" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="oxvlr" name="oxvlr" value="{{$emisiongas->oxvlr}}" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>

<td><input id="hcnorma" name="hcnorma" value="{{$emisiongas->hcnorma}}" style="width : 70px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="hcvlr" name="hcvlr" type="text" value="{{$emisiongas->hcvlr}}" style="width : 70px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="nonorma" name="nonorma" value="{{$emisiongas->nonorma}}" style="width : 50px; heigth : 10px;font-size: x-small" type="text" required ></td>
<td><input id="novlr" name="novlr" value="{{$emisiongas->novlr}}" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required ></td>
<td><input id="unidad" name="unidad" value="{{$emisiongas->unidad}}" type="text" style="width : 50px; heigth : 10px;font-size: x-small" required value="ppm" ></td>


</tr>

</table>


<label style="font-size: small;">OBSERVACION</label><p>

<textarea id="observacion" name="observacion" style="font-size: small;  width: 600px;">{{$emisiongas->observacion}}</textarea>

<p>
  


     <a href="/vehiculos?placa={{$emisiongas->peritaje->vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</div>
</form>


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

 