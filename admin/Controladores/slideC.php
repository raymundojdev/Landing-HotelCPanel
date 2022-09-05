<?php  


class SlideC{

 public function CrearSlideC()
	{
		//preguntaremos si viene con informacion lo que venga en la variable post
		if (isset($_POST["titularN"])) {
			
			$rutaImg= "";

			if (isset($_FILES["imagenN"]["tmp_name"]) && !empty($_FILES["imagenN"]["tmp_name"])) {
				
				if ($_FILES["imagenN"]["type"] == "image/jpeg") {
					
					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/slide/S".$nombre.".jpeg";

					$imagen = imagecreatefromjpeg($_FILES["imagenN"]["tmp_name"]);

					imagejpeg($imagen, $rutaImg);
				}

				if ($_FILES["imagenN"]["type"] == "image/png") {
					
					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/slide/S".$nombre.".png";

					$imagen = imagecreatefrompng($_FILES["imagenN"]["tmp_name"]);

					imagepng($imagen, $rutaImg);
				}
			}

			$tablaBD = "slide";

			$datosC = array("titular"=>$_POST["titularN"],"descripcion"=>$_POST["descripcionN"], "orden"=>$_POST["ordenN"],"imagen"=>$rutaImg ); 

			$respuesta = SlideM::CrearSlideM($tablaBD, $datosC);

			if ($respuesta == true) {
				
				echo '<script>

				window.location= "slide";

				 </script>';
			}else{

				echo "ERROR AL CREAR SLIDE";
			}
		}
	}


	static public function VerSlideC($item,$valor){

		$tablaBD = "slide";

		$respuesta = SlideM::VerSlideM($tablaBD, $item, $valor);

		return $respuesta;
	}


	//Actualizar Slide
	public function ActualizarSlideC(){

		if(isset($_POST["Sid"])){

			$rutaImg = $_POST["imagenActual"];

			if(isset($_FILES["imagenE"]["tmp_name"]) && !empty($_FILES["imagenE"]["tmp_name"])){

				if(!empty($_POST["imagenActual"])){

					unlink($_POST["imagenActual"]);

				}else{

					mkdir($direc, 0755);

				}


				if($_FILES["imagenE"]["type"] == "image/jpeg"){

					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/slide/S".$nombre.".jpg";

					$imagen = imagecreatefromjpeg($_FILES["imagenE"]["tmp_name"]);

					imagejpeg($imagen, $rutaImg);

				}

				if($_FILES["imagenE"]["type"] == "image/png"){

					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/slide/S".$nombre.".png";

					$imagen = imagecreatefrompng($_FILES["imagenE"]["tmp_name"]);

					imagepng($imagen, $rutaImg);
					
				}

			}


			$tableBD = "slide";

			$datosC = array("id"=>$_POST["Sid"], "titular"=>$_POST["titularE"], "descripcion"=>$_POST["descripcionE"], "orden"=>$_POST["ordenE"], "imagen"=>$rutaImg);

			$respuesta = SlideM::ActualizarSlideM($tableBD, $datosC);

			if($respuesta == true){

				echo '<script>
						window.location = "slide";
					</script>';

			}else{

				echo "ERROR AL ACTUALIZAR SLIDE";

			}

		}

	}


	//BORRAR SLIDE

	public function BorrarSlideC()
	{
		if (isset($_GET["Sid"])) {
			
			$tablaBD = "slide";
			$id = $_GET["Sid"];

		//Una condicion preguntando si la variabe get de imagenSlide viene diferente a vacio vamos a utilizar a unlink para eliminarlo
		if ($_GET["imagenSlide"] != "") {
			
			unlink($_GET["imagenSlide"]);
		}
		//Solicitamos respuesta a slide modelo con los parametros de la tablaBD y el id
		$respuesta = SlideM::BorrarSlideM($tablaBD, $id);

		if($respuesta == true){

				echo '<script>
						window.location = "slide";
					</script>';

			}else{

				echo "ERROR AL BORRAR SLIDE";

			}

		}
	}

}