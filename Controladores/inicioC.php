<?php

class InicioC{

    public function VerGenerales1C(){

        $tablaBD = "generales";

        $respuesta = InicioM::VerGenerales1M($tablaBD);

        echo '<link rel="icon" href="admin/'.$respuesta["favicon"].'">

            <title>'.$respuesta["titular"].'</title>';

    }

    public function VerGenerales2C(){

        $tablaBD = "generales";

        $respuesta = InicioM::VerGenerales2M($tablaBD);

        echo '<a class="navbar-brand text-uppercase" href="index.html"><img src="admin/'.$respuesta["logotipo"].'"></a>
';

    }


    public function VerContactosC(){

        $tablaBD = "contacto";

        $respuesta = InicioM::VerContactosM($tablaBD);

        echo ' <div class="address-gried">
                     <p><span>'.$respuesta["ubicacion"].'</span></p>
                  </div>

                  <div class="clearfix"> </div>
               </div>

               <div class="col-md-4 col-sm-4 col-xs-4 footer_grid_left">
                  <div class="icon_grid_left">
                     <span class="fas fa-phone" aria-hidden="true"></span>
                  </div>

                  <div class="address-gried">
                     <p><span>'.$respuesta["telefono"].'</span></p>
                  </div>

                  <div class="clearfix"> </div>
               </div>

               <div class="col-md-4 col-sm-4 col-xs-4 footer_grid_left">
                  <div class="icon_grid_left">
                     <span class="fas fa-envelope-open" aria-hidden="true"></span>
                  </div>

                  <div class="address-gried">
                     <p>
                        <span><a href="mailto:'.$respuesta["correo"].'">'.$respuesta["correo"].'</a></span>
                     </p>
                  </div>';

    }


   public function VerRedesC(){

      $tablaBD = "redes";

      $respuesta = InicioM::VerRedesM($tablaBD);

      foreach ($respuesta as $key => $value) {
        
         echo '<li class="mx-2"><a href="'.$value["url"].'"><span class="fab fa-'.$value["icono"].'"></span></a></li>';

      }

   }


}