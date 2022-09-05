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
        Gestor de la Galería
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <!--boton para crear Usuarios-->
          <!--Data-toggle=modal sirve para abrir el formulario clase modal-->
         <button class="btn btn-primary" data-toggle="modal" data-target="#CrearImagen">Crear Imagen</button>
        </div>
        <div class="box-body">
        <!--Creamos la tabla donde traera los registros de los Usuarios//// La clase TB se utilizara para borrar usuarios y su foto -->
        <table class="table table-bordered table-hover table-striped TB">
        		<!--Creamos los nmbres de la cabezera de la tabla--> 
        	<thead>        		
        		<tr>
        			<th>N°</th>
        			<th>Imagen</th>
        			<th>Titulo</th>
              <th>Subtitulo</th>
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

              $verG = GaleriaC::VerGaleriaC($item, $valor);

              foreach ($verG as $key => $value) {
                
                echo '<tr>
              
                          <td>'.($key+1).'</td>
                          <td><img src="'.$value["imagen"].'" class="img-thumbnail" width="200px"></td>
                          <td>'.$value["titulo"].'</td>
                          <td>'.$value["subtitulo"].'</td>
                          <td>'.$value["descripcion"].'</td>

                          <td>'.$value["orden"].'</td>

                          <td>
                          <div class="btn-group">
                              
                              <button class="btn btn-success EditarGaleria" Gid="'.$value["id"].'" data-toggle="modal" data-target="#EditarGaleria"><i class="fa fa-pencil"></i></button>

                              <button class="btn btn-danger BorrarGaleria" Gid="'.$value["id"].'" Gimagen="'.$value["imagen"].'"><i class="fa fa-times"></i></button>
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

  <!-- Crear Slide -->
  <div class="modal fade" role="dialog" id="CrearImagen">
    
    <div class="modal-dialog">
      
      <div class="modal-content">
        
        <form method="post" role="form" enctype="multipart/form-data">


          
          <div class="modal-body">
            
            <center><h3>Crear Galeria</h3></center>
            <hr>

           <div class="box-body">
             
            <div class="form-group">
              
              <h2>Título:</h2>

              <input type="text" class="form-control input-md" name="tituloN" required>

            </div>

            <div class="form-group">
              
              <h2>Subtítulo:</h2>

              <input type="text" class="form-control input-md" name="subtituloN" required>

            </div>

            <div class="form-group">
              
              <h2>Descripción:</h2>

              <textarea name="descripcionN">
                
              </textarea>

            </div>


             <div class="form-group">
              
              <h2>Orden:</h2>

              <input type="text" class="form-control input-md" name="ordenN">

            </div>

            <div class="form-group">
              
              <h2>Imagen:</h2>

              <input type="file" name="imagenN">

              <p class="help-block">peso máximo permitido 200 MB</p>

            </div>

           </div> 

          </div>


          <div class="modal-footer">
            
            <button type="submit" class="btn btn-primary">Crear</button>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

          </div>

          <?php

          $crearG = new GaleriaC();
          $crearG -> CrearGaleriaC();

          ?>

        </form>

      </div>

    </div>

  </div>

  <!-- MODAL DE EDITAR GALERIA -->

   <div class="modal fade" role="dialog" id="EditarGaleria">
    
    <div class="modal-dialog">

      <div class="modal-content"> 
      <!--Aqui adentro ira el contenido-->      

        <!--Creamos el formulario -->
        <form method="post" role="form" enctype="multipart/form-data">

          <!--Creamos la cabezera del modal-->
          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>

            <center><h3>Editar Galeria</h3></center>
            <hr>
          </div>

          <div class="modal-body">
            
            <div class="box-body">
              
              <div class="form-group">
                
                <h3>Titulo:</h3>

                <input type="text" class="form-control input-md"  id="tituloE" name="tituloE" required>

                <input type="hidden" id="Gid" name="Gid">                
              </div>

              <div class="form-group">
              
              <h2>Subtítulo:</h2>

              <input type="text" class="form-control input-md" id="subtituloE" name="subtituloE" required>

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

                <img src="Vistas/img/usuarios/default.png" class="img-thumbnail visor" width="200px;">

                <input type="hidden" name="imagenActual" id="imagenActual">

              </div>

            </div>
          </div>

          <div class="modal-footer">
            
            <button type="submit" class="btn btn-success">Guardar Cambios</button>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>

          <?php 

          $actualizarG = new GaleriaC();
          $actualizarG -> ActualizarGaleriaC();

           ?>

        </form>
      </div>
    </div>
  </div>


  <?php 

  $borrarG = new GaleriaC();
  $borrarG -> BorrarGaleriaC();
  
 ?>