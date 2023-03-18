@extends('layouts.plantillabase')

@section('css')
 <!-- this works OK -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<!-- this does not! -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
@endsection



@section('contenido')
<div class='input-group date' id='datetimepicker1'>
    <input type='text' class="form-control"/>
    <span class="input-group-addon\">  
      <span class="glyphicon glyphicon-calendar"></span>
    </span>
  </div>
  <form method="post" action="">
    Event: <input type="date" name="event_name" class="form-control">
     
    <input type="submit" name="submit" class="btn button btn-success" value="SUBMIT" />
</form>
 
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $(document).ready(function () {
    $(".date").datetimepicker({locale: "ru"});
     
    
});
</script>
 
@endsection


@endsection