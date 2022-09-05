<?php

class SuscriptoresC{

	public function EnviarSuscriptorC(){

		if(isset($_POST["emailS"])){

			$tablaBD = "suscriptores";

			$datosC = array("email"=>$_POST["emailS"]);

			$respuesta = SuscriptoresM::EnviarSuscriptorM($tablaBD, $datosC);

			if($respuesta == true){

				echo '<script>

					window.location = "index.php";

				</script>';

			}

		}

	}


}