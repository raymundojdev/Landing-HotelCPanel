<?php

class MensajesC{

	//Mostrar mensajes
	static public function MostrarMensajesC($item, $valor){

		$tablaBD = "mensajes";

		$respuesta = MensajesM::MostrarMensajesM($tablaBD, $item, $valor);

		return $respuesta;

	}



	//Eliminar Mensajes
	public function EliminarMensajesC(){

		if(isset($_GET["Mid"])){

			$tablaBD = "mensajes";

			$id = $_GET["Mid"];

			$respuesta = MensajesM::EliminarMensajesM($tablaBD, $id);

			if($respuesta == true){

				echo '<script>

					window.location = "mensajes";

				</script>';

			}

		}

	}

	//Responder Mensajes
	public function RespuestaMensajeC(){

		//si viene con informacion la variable email
		if(isset($_POST["emailM"])){

			$email = $_POST["emailM"];
			$nombre = $_POST["nombreM"];
			$asunto = $_POST["asuntoM"];

			$respuesta = $_POST["respuestaM"];

			//Se respondera en formato html sera lo que se muestre en el correo
			$titulo = 'Respuesta a su mensaje: '.$asunto.' ,desde Hotel Zone.';
			//cuerpo de la respuesta del correo
			$respuesta = '<html>

							<head>
								<title>Respuesta a: '.$asunto.'</title>
							</head>

							<body>

								<h1>Hola '.$nombre.'</h1>

								<p>'.$respuesta.'</p>

							</body>

						</html>';
			//crearemos un avariable cabecera que sea igual ala version /r significa return y /n significa new line
			$cabecera = 'MIME-Version: 1.0' . "\r\n";
			//otra variable cabezera
			$cabecera .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			//Se colocara el email al que queremos que nos responda 
			$cabecera .= 'From: <administracion@hotelzone.com>' . "\r\n";

			//
			$enviar = mail($email, $titulo, $respuesta, $cabecera);
			//codicion si la variable enviar es correcta haremos un script redireccionando ala pagina mensajes
			if($enviar){

				echo '<script>

				window.location = "mensajes";

				</script>';

			}

		}

	}


}

	