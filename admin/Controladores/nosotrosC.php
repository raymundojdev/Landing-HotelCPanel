<?php 

class NosotrosC{

	//VER NOSOTROS
	public function VerNosotrosC()
	{
		$tablaBD = "nosotros";

		$respuesta = NosotrosM::VerNosotrosM($tablaBD);

		echo ' <h3>Titulo</h3>
          <h4>'.$respuesta["titulo"].'</h4>
          <hr>

          <h3>Introducción</h3>
          <h4>'.$respuesta["introduccion"].'</h4>
          <hr>

          <h3>Descripción</h3>
          <h4>'.$respuesta["descripcion"].'</h4>
          <hr>

          <h3>Imagen:</h3>';

          if ($respuesta["imagen"] !="") {

          	echo '<img src="'.$respuesta["imagen"].'" class="img-thumbnail" width="250px;">';

          }else{

          	echo '<img src="Vistas/img/usuarios/default.png" class="img-thumbnail" width="250px;">';

          }

          
	}

	//TRAER DATOS PARA EDITAR NOSOTROS

	public function EditarNosotrosC(){

		$tablaBD = "nosotros";
		$id = "1";

		$respuesta = NosotrosM::EditarNosotrosM($tablaBD, $id);

		echo '<div class="modal-body">
            
            <div class="box-body">
              
              <div class="form-group">
                
                <h2>Título:</h2>
                <input type="text" class="form-control input-lg" name="tituloE" required="" value="'.$respuesta["titulo"].'">

                <input type="hidden" name="Nid" value="'.$respuesta["id"].'">

              </div>

               <div class="form-group">
                
                <h2>Introducción:</h2>
                <textarea class="form-control" name="introduccionE" required>

               '.$respuesta["introduccion"].'

                </textarea>

              </div>

               <div class="form-group">
                
                <h2>Descripción:</h2>
                <textarea class="form-control" name="descripcionE" required>

                '.$respuesta["descripcion"].'

                </textarea>

              </div>

              <div class="form-group">
                
                <h2>Imagen:</h2>

                <input type="file" name="imagenE">';

                if ($respuesta["imagen"] != "") {
                	
                	echo '<img src="'.$respuesta["imagen"].'" class="img-thumbnail visor" width="270px">';
                }else{

                	echo '<img src="Vistas/img/usuarios/default.png" class="img-thumbnail visor" width="270px">';
                }
                
             echo' <input type="hidden" name="imagenActual" value="'.$respuesta["imagen"].'"> 



             </div>
             <br>
             <div class="box-footer">
                 
             <button class="btn btn-success btn-md" data-toggle="modal" data-target="#EditarNosotros"><i class="fa fa-pencil"></i> Editar</button>

        </div>

            </div>

          </div>

          ';

	}

  //ACTUALIZAR REGISTROS NOSOTROS

  public function ActualizarNosotrosC()
  {
    
    if (isset($_POST["tituloE"])) {
      
      $rutaImg = $_POST["imagenActual"];

      if (isset($_FILES["imagenE"]["tmp_name"]) && !empty($_FILES["imagenE"]["tmp_name"])) {
          
          if (!empty($_POST["imagenActual"])) {
            
              unlink($_POST["imagenActual"]);

          }else{
              mkdir($direct, 0755);
          }

          if ($_FILES["imagenE"]["type"] == "image/jpeg") {
          
          $nombre = mt_rand(10,999);

          $rutaImg = "Vistas/img/nosotros/N".$nombre.".jpeg";

          $imagen = imagecreatefromjpeg($_FILES["imagenE"]["tmp_name"]);

          imagejpeg($imagen, $rutaImg);
        }

        if ($_FILES["imagenE"]["type"] == "image/png") {
          
          $nombre = mt_rand(10,999);

          $rutaImg = "Vistas/img/nosotros/N".$nombre.".png";

          $imagen = imagecreatefrompng($_FILES["imagenE"]["tmp_name"]);

          imagepng($imagen, $rutaImg);
        }
      }

      $tablaBD = "nosotros";

      $datosC = array("id"=>$_POST["Nid"], "titulo"=>$_POST["tituloE"], "introduccion"=>$_POST["introduccionE"],"descripcion"=>$_POST["descripcionE"], "imagen"=> $rutaImg);

      $respuesta = NosotrosM::ActualizarNosotrosM($tablaBD, $datosC);

      if ($respuesta == true) {
        
        echo '<script>

        window.location = "nosotros";

        </script>';
      }
    }
  }
}