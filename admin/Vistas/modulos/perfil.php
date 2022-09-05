<?php 

 ?>
 <!--Div principal de la cuadricula(wrapper)-->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<!--Nombre de en la cabecera de la ventana Usuarios-->
      <h1>
        Gestor de Perfil
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        
        <div class="box-body">
        <!--Creamos la tabla donde traera los registros de los Usuarios//// La clase TB se utilizara para borrar usuarios y su foto -->
        <table class="table table-bordered table-hover table-striped TB">
        		<!--Creamos los nmbres de la cabezera de la tabla--> 
        	<thead>        		
        		<tr>
        			
        			<th>Nombre de Usuario</th>
        			<th>Contraseña</th>
        			<th>Foto</th>
        		  <th>Editar</th>
        		</tr>
        	</thead>
        	<!--Creamos el cuerpo de la tabla donde se visualizaran los registros de los usuarios-->
        	<tbody>
        		<!--Agregaremos los usuarios agregados ala base de datos-->
        		<?php 
        		
            $perfil = new UsuariosC();
            $perfil -> VerPerfilC();

        		 ?>
        		
        	</tbody>

        </table>
       </div>   
             
     </div>  
    </section>
   </div>


   <div class="modal fade" role="dialog" id="EditarU">
    
    <div class="modal-dialog">

      <div class="modal-content"> 
      <!--Aqui adentro ira el contenido-->      

        <!--Creamos el formulario -->
        <form method="post" role="form" enctype="multipart/form-data">

          <!--Creamos la cabezera del modal-->
          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>

            <center><h3>Editar Usuario</h3></center>
          </div>

          <div class="modal-body">
            
            <div class="box-body">
              
              <div class="form-group">
                
                <h3>Nombre de Usuario</h3>

                <input type="text" class="form-control input-md"  id="usuarioE" name="usuarioE" required>

                <input type="hidden" id="Uid" name="Uid">                
              </div>

              <div class="form-group">
                
                <h3>Contraseña</h3>

                <input type="text" class="form-control input-md" id="claveE" name="claveE" required>
              </div>

              <div class="form-group" style="display: none;">
                
                <h3>Seleccionar un Rol</h3>

                <select class="form-control input-md" name="rolE">

                  <option id="rolE"></option>

                  <option value="Administrador">Administrador</option>

                  <option value="Editor de Contenido">Editor de Contenido</option>

                  <option value="Marketing">Marketing</option>

              </select> 
              </div>

              <div class="form-group">
                
                <h3>Foto:</h3>

                <input type="file" id="fotoE" name="fotoE">

                <p class="help-block">peso maximo permitido 200 MB</p>

                <img src="Vistas/img/usuarios/defecto.png" class="img-thumbnail visor" width="100px;">

                <input type="hidden" name="FotoActual" id="FotoActual">

              </div>

            </div>
          </div>

          <div class="modal-footer">
            
            <button type="submit" class="btn btn-success">Guardar Cambios</button>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>

          <?php 

          $actualizarU = new UsuariosC();
          $actualizarU -> ActualizarUsuariosC();

           ?>

        </form>
      </div>
    </div>
  </div>