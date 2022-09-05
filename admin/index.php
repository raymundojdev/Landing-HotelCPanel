<?php 	

require_once "Controladores/plantillaC.php";

require_once "Controladores/usuariosC.php";
require_once "Modelos/usuariosM.php";

require_once "Controladores/slideC.php";
require_once "Modelos/slideM.php";

require_once "Controladores/nosotrosC.php";
require_once "Modelos/nosotrosM.php";

require_once "Controladores/serviciosC.php";
require_once "Modelos/serviciosM.php";

require_once "Controladores/galeriaC.php";
require_once "Modelos/galeriaM.php";

require_once "Controladores/hsimpleC.php";
require_once "Modelos/hsimpleM.php";

require_once "Controladores/mensajesC.php";
require_once "Modelos/mensajesM.php";

require_once "Controladores/suscriptoresC.php";
require_once "Modelos/suscriptoresM.php";

require_once "Controladores/inicioC.php";
require_once "Modelos/inicioM.php";


$plantilla = new PlantillaC();
$plantilla -> LlamarPlantilla();


 ?>