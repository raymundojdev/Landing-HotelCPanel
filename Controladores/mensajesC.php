<?php

class MensajesC{

	public function EnviarMensajesC(){

		if(isset($_POST["nombre"])){

			if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/', $_POST["nombre"]) && preg_match('/^[0-9-\s]+$/', $_POST["telefono"]) && preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ0-9-\s]+$/', $_POST["asunto"]) && preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ0-9-.,\s]+$/', $_POST["mensaje"])){

				$tablaBD = "mensajes";

				$datosC = array("nombre"=>$_POST["nombre"], "email"=>$_POST["email"], "telefono"=>$_POST["telefono"],"asunto"=>$_POST["asunto"], "mensaje"=>$_POST["mensaje"]);

				$respuesta = MensajesM::EnviarMensajesM($tablaBD, $datosC);

				if($respuesta == true){

					echo '<script>

					window.location = "index.php";

					</script>';

				}

			}else{

				echo '<div class="alert alert-danger">No está permitido enviar carácteres especiales en este formulario de contacto.</div>';

			}

		}

	}

}