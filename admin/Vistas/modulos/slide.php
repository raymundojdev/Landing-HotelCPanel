<?php
  
if($_SESSION["rol"] != "Administrador" && $_SESSION["rol"] =! "Editor de Contenido"){

  echo '<script>

  window.location = "suscriptores";
  </script>';

  return;

}

?>

 <!--Div principal de la cuadricula(wrapper)-->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<!--Nombre de en la cabecera de la ventana Usuarios-->
      <h1>
        Gestor de Slide
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <!--boton para crear Usuarios-->
          <!--Data-toggle=modal sirve para abrir el formulario clase modal-->
         <button class="btn btn-primary" data-toggle="modal" data-target="#CrearSlide">Crear Imagen</button>
        </div>
        <div class="box-body">
        <!--Creamos la tabla donde traera los registros de los Usuarios//// La clase TB se utilizara para borrar usuarios y su foto -->
        <table class="table table-bordered table-hover table-striped TB">
        		<!--Creamos los nmbres de la cabezera de la tabla--> 
        	<thead>        		
        		<tr>
        			<th>N°</th>
        			<th>Imagen</th>
        			<th>Titular</th>
        			<th>Descripción</th>
        			<th>Orden</th>
        			<th>Editar / Eliminar</th>
        		</tr>
        	</thead>
        	<!--Creamos el cuerpo de la tabla donde se visualizaran los registros de los usuarios-->
        	<tbody>
        	           
            <?php 

            $item = null;
            $valor = null;

            $verS = SlideC::VerSlideC($item, $valor);

            foreach ($verS as $key => $value) {
              
              echo '<tr>

              <td>'.($key+1).'</td>

              <td><img src="'.$value["imagen"].'" class="img-thumbnail" width="300px"></td>

              <td>'.$value["titular"].'</td>

              <td>'.$value["descripcion"].' </td>

              <td>'.$value["orden"].'</td>

              <td>
                <div class="btn-group">
              
              <button class="btn btn-success EditarSlide" Sid="'.$value["id"].'" data-toggle="modal" data-target="#EditarS"><i class="fa fa-pencil"></i></button>

              <button class="btn btn-danger BorrarSlide" Sid="'.$value["id"].'" imagenSlide="'.$value["imagen"].'"><i class="fa fa-times"></i></button>
              </div>
              </td>

            </tr>';
            }

             ?>

        			
        	</tbody>

        </table>
       </div>   
             
     </div>  
    </section>
   </div>


   <!--Crear Slide formulario -->

  <div class="modal fade" role="dialog" id="CrearSlide">
  	
  	<div class="modal-dialog">

  		<div class="modal-content"> 
  		<!--Aqui adentro ira el contenido-->			

  			<!--Creamos el formulario -->
  			<form method="post" role="form" enctype="multipart/form-data">

  				<!--Creamos la cabezera del modal-->
  				<div class="modal-header">
  					
  					<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>

  					<center><h3>Crear Titular:</h3></center>
  				</div>

  				<div class="modal-body">
  					
  					<div class="box-body">
  						
  						<div class="form-group">
  							
  							<h3>Titular:</h3>

  							<input type="text" class="form-control input-md" name="titularN" required>
  						</div>

  						<div class="form-group">
  							
  							<h3>Descripción:</h3>

                <textarea name="descripcionN">
                

                </textarea>

  							
  						</div>			

              <div class="form-group">
                
                <h3>Orden:</h3>

                <input type="text" class="form-control input-md" name="ordenN">
              </div>      			

  						<div class="form-group">
  							
  							<h3>Imagen:</h3>

  							<input type="file" name="imagenN">

  							<p class="help-block">peso maximo permitido 200 MB</p>

  						</div>

  					</div>
  				</div>

  				<div class="modal-footer">
  					
  					<button type="submit" class="btn btn-primary">Crear</button>

  					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
  				</div>

  				<?php 

          $crearS = new SlideC();
          $crearS -> CrearSlideC();

  				 ?>

  			</form>
  		</div>
  	</div>
  </div>

  <?php 

  //Llamaremos una funcion con la variable borrarU
  $borrarU = new UsuariosC();
  $borrarU -> BorrarUsuariosC();
   ?>


   <div class="modal fade" role="dialog" id="EditarS">
    
    <div class="modal-dialog">

      <div class="modal-content"> 
      <!--Aqui adentro ira el contenido-->      

        <!--Creamos el formulario -->
        <form method="post" role="form" enctype="multipart/form-data">

          <!--Creamos la cabezera del modal-->
          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>

            <center><h3>Editar Slide</h3></center>
          </div>

          <div class="modal-body">
            
            <div class="box-body">
              
              <div class="form-group">
                
                <h3>Titular:</h3>

                <input type="text" class="form-control input-md"  id="titularE" name="titularE" required>

                <input type="hidden" id="Sid" name="Sid">                
              </div>

              <div class="form-group">
                
                <h3>Descripción:</h3>

                <textarea id="descripcionE" name="descripcionE"></textarea>
                
              </div>

              <div class="form-group">
                
                <h3>Orden:</h3>

                <input type="text" class="form-control input-md"  id="ordenE" name="ordenE" required>

              </div>
    
              <div class="form-group">
                
                <h3>Imagen:</h3>

                <input type="file" id="imagenE" name="imagenE">

                <p class="help-block">peso maximo permitido 200 MB</p>

                <img src="Vistas/img/default.png" class="img-thumbnail visor" width="100px;">

                <input type="hidden" name="imagenActual" id="imagenActual">

              </div>

            </div>
          </div>

          <div class="modal-footer">
            
            <button type="submit" class="btn btn-success">Guardar Cambios</button>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>

          <?php 

          $actualizarS = new SlideC();
          $actualizarS -> ActualizarSlideC();

           ?>

        </form>
      </div>
    </div>
  </div>


  <?php 

  $borrarS = new SlideC();
  $borrarS -> BorrarSlideC();

 ?>