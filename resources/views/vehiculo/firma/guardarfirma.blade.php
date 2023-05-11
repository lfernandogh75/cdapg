 
<!doctype html>
<html>
 <head>
  <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"/>
    <style type="text/css">
        #canvas {
          border:solid black 1px;
        }
      </style>
       <script>
        var ongoingTouches = new Array;
        
        function colorForTouch(touch) {
          var id = touch.identifier;
          id = id.toString(16); // make it a hex digit
          return "#" + id + id + id;
        }
        
        function ongoingTouchIndexById(idToFind) {
          for (var i=0; i<ongoingTouches.length; i++) {
            var id = ongoingTouches[i].identifier;
            
            if (id == idToFind) {
              return i;
            }
          }
          return -1;    // not found
        }
        
        function handleStart(evt) {
          evt.preventDefault();
          var el = document.getElementById("canvas");
          var ctx = el.getContext("2d");
          var touches = evt.changedTouches;
                
          for (var i=0; i<touches.length; i++) {
            ongoingTouches.push(touches[i]);
            var color = colorForTouch(touches[i]);
            ctx.fillStyle = color;
            ctx.fillRect(touches[i].pageX-2, touches[i].pageY-2, 4, 4);
          }
        }
      
        function handleMove(evt) {
          evt.preventDefault();
          var el = document.getElementById("canvas");
          var ctx = el.getContext("2d");
          var touches = evt.changedTouches;
          
          ctx.lineWidth = 4;
                
          for (var i=0; i<touches.length; i++) {
            var color = colorForTouch(touches[i]);
            var idx = ongoingTouchIndexById(touches[i].identifier);
    
            ctx.fillStyle = color;
            ctx.beginPath();
            ctx.moveTo(ongoingTouches[idx].pageX, ongoingTouches[idx].pageY);
            ctx.lineTo(touches[i].pageX, touches[i].pageY);
            ctx.closePath();
            ctx.stroke();
            ongoingTouches.splice(idx, 1, touches[i]);  // swap in the new touch record
          }
        }
    
        function handleEnd(evt) {
          evt.preventDefault();
          var el = document.getElementById("canvas");
          var ctx = el.getContext("2d");
          var touches = evt.changedTouches;
          
          ctx.lineWidth = 4;
                
          for (var i=0; i<touches.length; i++) {
            var color = colorForTouch(touches[i]);
            var idx = ongoingTouchIndexById(touches[i].identifier);
            
            ctx.fillStyle = color;
            ctx.beginPath();
            ctx.moveTo(ongoingTouches[i].pageX, ongoingTouches[i].pageY);
            ctx.lineTo(touches[i].pageX, touches[i].pageY);
            ongoingTouches.splice(i, 1);  // remove it; we're done
          }
        }
        
        function handleCancel(evt) {
          evt.preventDefault();
          var touches = evt.changedTouches;
          
          for (var i=0; i<touches.length; i++) {
            ongoingTouches.splice(i, 1);  // remove it; we're done
          }
        }
    
      
        function startup() {
          var el = document.getElementById("canvas");
          el.addEventListener("touchstart", handleStart, false);
          el.addEventListener("touchend", handleEnd, false);
          el.addEventListener("touchcancel", handleCancel, false);
          el.addEventListener("touchleave", handleEnd, false);
          el.addEventListener("touchmove", handleMove, false);
        }
      </script>
 </head> 
 
  <br>
   
 <body onload="startup()">
  
  <form action="">
  <div class="col-10"   style=" 
 width: 540px;
border-top-width: 20px; 
border-right-width: thin;
 
border-bottom-width: thin; 
border-left-width: thin;  border-radius: 30px 30px 1px 1px;  border-color: rgba(239, 107, 19, 0.951);">

<p style="font-size: xx-small;
   font-size:10px;
    margin-top:-19px;
     margin-left:20px;">POLITICAS DE TRATAMIENTO</p>
<canvas id="canvas" name="canvas"  width="500" height="200"></canvas>
</div>
 </body>
<br>
<label for="">{{$vehiculo->solicitante}}</label>
<br>
<label for="">{{$vehiculo->tipoidentificacion}}{{$vehiculo->numeroidentificacion}}</label>
<br>

<div class="col-md-3"> 
  <input type="hidden"   class="form-control" id="vehiculoid" name="vehiculoid"  value="{{$vehiculo->id}}">
</div>
<button  class="btn btn-info" id="btnLimpiar">Limpiar</button>
 <button type="submit" class="btn btn-primary">firmar</button>
<br>

 
   
</form>
 
 
 
<script src="/js/script.js">

</script>

</html>
 
 
 
 