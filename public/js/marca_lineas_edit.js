$(function() {
   
   
   var marca_id=$('#select-marca').val();
   var lineaid=$('#lineaid').val();
   var lineanombre=$('#lineanombre').val();

  // if(! marca_id){
    //$('#select-linea').html('<option value="">Seleccionar línea</option>');
  // return;// terminamos el script 
//}
 // alert(marca_id);
  
  $.get('/api/marca/'+marca_id+'/lineas',function(data){
    //console.log(data);
   
    var html_select='<option value="'+lineaid+'">'+lineanombre+'</option>';
    for(var i=0; i<data.length; i++){
        //alert(data[i].nombre);
    html_select+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
  
    }
    
    $('#select-linea').html(html_select);
  });
});


 