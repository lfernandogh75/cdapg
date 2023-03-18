<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('AGREGAR EQUIPO') }}
        </h2>
    </x-slot>

    <p><p>
            
                 
            <form action="{{route('equipopart.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
           
          <table>
            <tr>
              <td> <div class="mb-3">
                <label  class="form-label" >NOMBRE</label>
              </td>
              <td>
                <div class="mb-3">
                <input class="form-control" type="text" name="name" id="name"    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>   
          </div></td>
          <td>
            <div class="mb-3">
              <label for="" class="form-label">BANCO</label>
            </td>
            <td>
              <div class="mb-3">
              <input id="banco" name="banco" type="text" value="N/A"  class="form-control" tabindex="3" value="N/A" required>
            </div>
          </td>
            </tr>
             
         <tr> 
          
         <td>     <div class="mb-3">
                <label for="" class="form-label">MARCA</label>
              </td>
              <td>
                <div class="mb-3">
                <input id="marca" name="marca" type="text" value="N/A"  class="form-control" tabindex="3" value="N/A" required>
            </div>
         </td>
         <td>
              <div class="mb-3">
                <label for="" class="form-label">SERIAL</label>
              </td>
              <td>
                <div class="mb-3">
                <input id="serial" name="serial" type="text" value="N/A"  class="form-control" tabindex="3" value="N/A" required>
              </div>
         </td>
         </tr>
        
             <tr>
              <td>
              <div class="mb-3">
                <label for="" class="form-label">PEF</label>
              </td>
              <td>
                <div class="mb-3">
               
                <input id="pef" name="pef" type="text" value="N/A"  class="form-control" tabindex="3" value="N/A" required>
              </div>
              </td>
              <td>
              <div class="mb-3">
                <label for="" class="form-label">LTOE</label>
              </td>
              <td>
                <div class="mb-3">
                <input id="ltoe" name="ltoe" type="text" value="N/A"  class="form-control" tabindex="3" value="N/A" required>
              </div>
              </td>
             </tr>
            <tr> 
              <td>
              </td>
              <td>
              <div class="col-md-3">
                <select id ="tipo_vehiculo" name="tipo_vehiculo"  class="form-select">
                   <option value="Automóvil">Automóvil</option>
                   <option value="Camioneta">Camioneta</option>
                   <option value="Motocicleta">Motocicleta</option>
                   <option value="Cabezote">Cabezote</option>
                   <option value="Pesados">Pesados</option>
                 </select>
                   </div>
              </td>
              <td>  <a href="{{route('equipopart.index') }}" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancelar</a></td>
              <td>   <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button></td>
            </tr>
            </table> 

           

             
          
          
          
       
          
        
      </form>


 
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
