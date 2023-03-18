@extends('layouts.plantillaperitaje')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')
<form action="{{route('simetrias.update',$simetria->id)}}" method="POST">
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
      margin-left:20px;">SIMETRIA {{$simetria->nivelaprobado}}%</p>
  
  <p>
  
  <p> 
  
  
  
  <table   style="font-size: small; margin: 0 auto;">
  <tr>
  
  <td><input id="sderecho" name="sderecho" value="{{$simetria->sderecho}}"   type="number"   step="0" min="0" max="1000000" style="width : 80px; heigth : 10px;font-size: x-small" required >mm</td>
  <td><input id="smedio" name="smedio" value="{{$simetria->smedio}}"  type="number"   step="0" min="0" max="1000000" style="width : 80px; heigth : 10px;font-size: x-small" required >mm</td>
  <td><input id="sizquierdo" name="sizquierdo" value="{{$simetria->sizquierdo}}"  type="number"   step="0" min="0" max="1000000" style="width : 80px; heigth : 10px;font-size: x-small" required >mm</td>
  
  
  
  </tr>
  
  <tr>
  <td COLSPAN=3> <img    src="{{ url('./iconos/chasis.png')}}"> </td>
  
  </tr>
  <tr>
  
  
  <td><input id="iderecho" name="iderecho" value="{{$simetria->iderecho}}"    type="number"   step="0" min="0" max="1000000"  style="width : 80px; heigth : 10px;font-size: x-small" required >mm</td>
  <td><input id="imedio" name="imedio" value="{{$simetria->imedio}}"  type="number"   step="0" min="0" max="1000000" style="width : 80px; heigth : 10px;font-size: x-small" required >mm</td>
  <td><input id="iizquierdo" name="iizquierdo" value="{{$simetria->iizquierdo}}"  type="number"   step="0" min="0" max="1000000" style="width : 80px; heigth : 10px;font-size: x-small" required >mm</td>
  
  </tr>
  
  </table>
  
  
  
                    
              
              
              <label style="font-size: small;">OBSERVACION</label><p>
              
              <textarea id="observacion"  name="observacion" style="font-size: small;  width: 600px;">{{$simetria->observacion}}</textarea>

<p>
  <label style="font-size: small;" class="form-label">NIVEL DE APROBACIÓN</label>
    <input id="nivelaprobado" name="nivelaprobado"  value="{{$simetria->nivelaprobado}}" type="number"  placeholder="0% a 100%" step="0" min="0" max="100"   class="form-control" tabindex="3" required>
  <P>


     <a href="/vehiculos?placa={{$simetria->peritaje->vehiculo->placa}}&vehiculoindex=1" class="btn btn-secondary" tabindex="5">Cancelar</a>
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

 