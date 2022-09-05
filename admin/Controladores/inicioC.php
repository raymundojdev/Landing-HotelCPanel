<?php

class InicioC{

   //Ver Ajustes Generales
   public function VerGeneralesC(){

      $tablaBD = "generales";

      $respuesta = InicioM::VerGeneralesM($tablaBD);

      echo '   <h2>Favicon:</h2>';

            //condicion si la variable respuesta favicon es diferente a vacio entonces con un eco nos muestre la imagen y adentro concatenamos la variable respuesta en favicon
            if($respuesta["favicon"] != ""){

               echo '<img src="'.$respuesta["favicon"].'" class="img-responsive" width="50px">';
            //si no mostramos la imagen por defecto
            }else{

               echo '<img src="Vistas/img/usuarios/default.png" class="img-responsive" width="50px">';

            }               
               echo '<hr>

               <h2>Titular:</h2>

               <h4>'.$respuesta["titular"].'</h4>

               <hr>

               <h2>Logotipo:</h2>';

               if($respuesta["logotipo"] != ""){

                  echo '<img src="'.$respuesta["logotipo"].'" class="img-responsive">';

               }else{

                  echo '<img src="Vistas/img/default.png" class="img-responsive">';

               }               

   }

   //Editar Ajustes Generales
   public function EditarGeneralesC(){

      $tablaBD = "generales";

      $id = "1";

      $respuesta = InicioM::EditarGeneralesM($tablaBD, $id);

      echo '  <div class="modal-body">
          
                <div class="box-body">
                  
                  <div class="form-group">
                    
                    <h2>Favicon:</h2>

                    <input type="file" name="faviconE">';

                    if($respuesta["favicon"] != ""){

                     echo '<img src="'.$respuesta["favicon"].'" class="img-responsive" width="50px">';

                    }else{
                     echo '<img src="Vistas/img/usuarios/default.png" class="img-responsive" width="50px">';

                    }                   
                    echo '<input type="hidden" name="faviconActual" value="'.$respuesta["favicon"].'">

                  </div>

                  <div class="form-group">
                    
                    <h2>Titular:</h2>
                    <input type="text" class="form-control input-lg" name="titularE" value="'.$respuesta["titular"].'">

                    <input type="hidden" name="Gid" value="'.$respuesta["id"].'">

                  </div>

                  <div class="form-group">
                    
                    <h2>Logotipo:</h2>
                    <input type="file" name="logotipoE">';


                    if($respuesta["logotipo"] != ""){

                     echo '<img src="'.$respuesta["logotipo"].'" class="img-responsive">';

                    }else{
                     echo '<img src="Vistas/img/default.png" class="img-responsive">';

                    }                
                    echo '<input type="hidden" name="logotipoActual" value="'.$respuesta["logotipo"].'">

                  </div>

                </div>

              </div>

              <div class="modal-footer">
                
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

              </div>';

   }

   //Actualizar los Ajustes Generales
   public function ActualizarGeneralesC(){

      if(isset($_POST["titularE"])){
         
         $rutaFavicon = $_POST["faviconActual"];
         if(isset($_FILES["faviconE"]["tmp_name"]) && !empty($_FILES["faviconE"]["tmp_name"])){
            //vemos si no hay imagen en la base de datos
            if(!empty($_POST["faviconActual"])){
               unlink($_POST["faviconActual"]);

            }

            if($_FILES["faviconE"]["type"] == "image/jpeg"){
               $nombre = mt_rand(10, 999);
               $rutaFavicon = "Vistas/img/Generales/".$nombre.".jpg";
               $imagen = imagecreatefromjpeg($_FILES["faviconE"]["tmp_name"]);
               imagejpeg($imagen, $rutaFavicon);

            }

            if($_FILES["faviconE"]["type"] == "image/png"){
               $nombre = mt_rand(10, 999);
               $rutaFavicon = "Vistas/img/Generales/".$nombre.".png";
               $imagen = imagecreatefrompng($_FILES["faviconE"]["tmp_name"]);
               imagepng($imagen, $rutaFavicon);

            }

         }

         $rutaLogotipo = $_POST["logotipoActual"];
         if(isset($_FILES["logotipoE"]["tmp_name"]) && !empty($_FILES["logotipoE"]["tmp_name"])){
            if(!empty($_POST["logotipoActual"])){
               unlink($_POST["logotipoActual"]);

            }

            if($_FILES["logotipoE"]["type"] == "image/jpeg"){
               $nombre = mt_rand(10, 999);
               $rutaLogotipo = "Vistas/img/Generales/".$nombre.".jpg";
               $imagen = imagecreatefromjpeg($_FILES["logotipoE"]["tmp_name"]);
               imagejpeg($imagen, $rutaLogotipo);

            }

            if($_FILES["logotipoE"]["type"] == "image/png"){
               $nombre = mt_rand(10, 999);
               $rutaLogotipo = "Vistas/img/Generales/L".$nombre.".png";
               $imagen = imagecreatefrompng($_FILES["logotipoE"]["tmp_name"]);
               imagepng($imagen, $rutaLogotipo);

            }

         }

         $tablaBD = "generales";

         $datosC = array("id"=>$_POST["Gid"], "favicon"=>$rutaFavicon, "titular"=>$_POST["titularE"], "logotipo"=>$rutaLogotipo);

         $respuesta = InicioM::ActualizarGeneralesM($tablaBD, $datosC);
         if($respuesta == true){
            echo '<script>
            window.location = "inicio";
            </script>';

         }

      }

   }

   //Ver Contactos

   public function VerContactosC(){

      $tablaBD = "contacto";
      $respuesta = InicioM::VerContactosM($tablaBD);

      echo '<h2>Ubicación:</h2>
            <h4>'.$respuesta["ubicacion"].'</h4>

            <hr>

            <h2>Teléfono:</h2>
            <h4>'.$respuesta["telefono"].'</h4>
            <hr>

            <h2>Correo:</h2>
            <h4>'.$respuesta["correo"].'</h4>';
   }


   public function EditarContactosC(){

      $tablaBD = "contacto";
      $id = "1";
      $respuesta = InicioM::EditarContactosM($tablaBD, $id);

      echo '<div class="modal-body">
          
          <div class="box-body">
            
            <div class="form-group">
              
              <h2>Ubicación:</h2>

              <input type="text" class="form-control input-md" name="ubicacionE" value="'.$respuesta["ubicacion"].'">
              <input type="hidden" name="Cid" value="'.$respuesta["id"].'">

            </div>

            <div class="form-group">
              
              <h2>Teléfono:</h2> 
              <input type="text" class="form-control input-md" name="telefonoE" value="'.$respuesta["telefono"].'">

            </div>
            <div class="form-group">
              
              <h2>Correo:</h2> 
              <input type="text" class="form-control input-md" name="correoE" value="'.$respuesta["correo"].'">

            </div>

          </div>

        </div>

        <div class="modal-footer">
          
          <button type="submit" class="btn btn-success">Guardar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

        </div>';
   }

   //ACTUALIZAR CONTACTOS

   public function ActualizarContactosC(){

      if (isset($_POST["ubicacionE"])) {         

         $tablaBD = "contacto";
         $datosC = array("id"=>$_POST["Cid"], "ubicacion"=>$_POST["ubicacionE"], "telefono"=>$_POST["telefonoE"], "correo"=>$_POST["correoE"]);

         $respuesta = InicioM::ActualizarContactosM($tablaBD,$datosC);
         if ($respuesta == true) {            
            echo '<script>
            window.location = "inicio";            
            </script>';
         }
      }
   }

   static public function VerRedesC($item, $valor){

      $tablaBD = "redes";
      $respuesta = InicioM::VerRedesM($tablaBD,$item, $valor);
      return $respuesta;
      foreach ($respuesta as $key => $value) {        
         echo '<li class="mx-2"><a href="'.$value["url"].'"><span class="fab fa-'.$value["icono"].'"></span></a></li>';

      }
   }

      public function ActualizarRedesC(){

         if(isset($_POST["iconoE"])) {            
            $tablaBD = "redes";
            $datosC = array("id"=>$_POST["Rid"], "icono"=>$_POST["iconoE"], "url"=>$_POST["urlE"]);
            $respuesta = InicioM::ActualizarRedesM($tablaBD, $datosC);
            if($respuesta == true) {               
               echo '<script>
            window.location = "inicio";            
            </script>';
            }
         }
      }
}