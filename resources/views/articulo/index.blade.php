@extends('layouts.plantillabase')

@section('css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection



@section('contenido')
 
<a href="articulos/create" class="btn btn-primary">Crear</a>
<table id="articulos" class="table table-dark table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Código</th>
      <th scope="col">Descripción</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($articulos as $articulo)
    <tr>
        <td>{{$articulo->id}}</td>
        <td>{{$articulo->codigo}}</td>
        <td>{{$articulo->descripcion}}</td>
        <td>{{$articulo->cantidad}}</td>
        <td>{{$articulo->precio}}</td>
        <td>
          
        <form action="{{ route('articulos.destroy',$articulo->id) }}" method="POST">
          <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-info">Editar</a>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
         </form>  

                   
        </td>        
    </tr>
    @endforeach
  </tbody>
</table>
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#articulos').DataTable();
});
</script>
@endsection


@endsection