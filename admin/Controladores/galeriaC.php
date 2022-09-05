<?php 

class GaleriaC{

	public function CrearGaleriaC(){

		if (isset($_POST["tituloN"])) {
			
			$rutaImg = "";

			if(isset($_FILES["imagenN"]["tmp_name"]) && !empty($_FILES["imagenN"]["tmp_name"])) {
				
				if ($_FILES["imagenN"]["type"] == "image/png"){
					
					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/galeria/Gal".$nombre.".png";

					$imagen = imagecreatefrompng($_FILES["imagenN"]["tmp_name"]);

					imagepng($imagen, $rutaImg);
				}

				if ($_FILES["imagenN"]["type"] == "image/jpeg"){
					
					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/galeria/Gal".$nombre.".jpeg";

					$imagen = imagecreatefromjpeg($_FILES["imagenN"]["tmp_name"]);

					imagejpeg($imagen, $rutaImg);
				}
			}

			$tablaBD = "galeria";

			$datosC = array("titulo"=>$_POST["tituloN"], "subtitulo"=>$_POST["subtituloN"],"descripcion"=>$_POST["descripcionN"], "orden"=>$_POST["ordenN"], "imagen"=>$rutaImg);

			$respuesta = GaleriaM::CrearGaleriaM($tablaBD,$datosC);

			if ($respuesta == true) {
				
				echo '<script>

				window.location = "galeria";

				</script>';
			}else{

				echo 'ERROR AL CREAR IMAGEN';
			}
		}
	}

	//VER GALERIA
	static public function VerGaleriaC($item, $valor){

		$respuesta = GaleriaM::VerGaleriaM("galeria", $item, $valor);

		return $respuesta;

	}

	public function BorrarGaleriaC(){

		if(isset($_GET["Gid"])) {
			
			$tablaBD = "galeria";
			$id = $_GET["Gid"];


			if($_GET["Gimagen"] != "") {
				
				unlink($_GET["Gimagen"]);
			}

			$respuesta = GaleriaM::BorrarGaleriaM($tablaBD,$id);

			if($respuesta == true) {
				
				echo '<script>

				window.location = "galeria";

				</script>';
			}else{

				echo 'ERROR AL ELIMINAR IMAGEN';
			}
		}
	}

	//ACTUALIZAR GALERIA

	public function ActualizarGaleriaC(){

		if(isset($_POST["Gid"])) {
			
			$rutaImg = $_POST["imagenActual"];

			if(isset($_FILES["imagenE"]["tmp_name"])  && !empty($_FILES["imagenE"]["tmp_name"])) {
				
				if(!empty($_POST["imagenActual"])) {
					
					unlink($_POST["imagenActual"]);
				}else{

					mkdir($direc, 0755);

				}

				if ($_FILES["imagenE"]["type"]  == "image/jpeg") {
					
					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/galeria/Gal".$nombre.".jpeg";

					$imagen = imagecreatefromjpeg($_FILES["imagenE"]["tmp_name"]);

					imagejpeg($imagen,$rutaImg);
				}

				if ($_FILES["imagenE"]["type"]  == "image/png") {
					
					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/galeria/Gal".$nombre.".png";

					$imagen = imagecreatefrompng($_FILES["imagenE"]["tmp_name"]);

					imagejpeg($imagen,$rutaImg);
				}
			}

			$tablaBD = "galeria";

			$datosC = array("id"=>$_POST["Gid"], "titulo"=>$_POST["tituloE"],"subtitulo"=>$_POST["subtituloE"],"descripcion"=>$_POST["descripcionE"], "orden"=>$_POST["ordenE"],"imagen"=>$rutaImg);

			$respuesta = GaleriaM::ActualizarGaleriaM($tablaBD,$datosC);

			if($respuesta == true) {
				
				echo '<script>

				window.location = "galeria";

				</script>';
			}else{

				echo 'ERROR AL EDITAR IMAGEN';
			}
		}
	}
}