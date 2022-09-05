<?php

class SuscriptoresC{

	//Mostrar Suscriptores
	static public function MostrarSuscriptoresC($item, $valor){

		$tablaBD = "suscriptores";

		$respuesta = SuscriptoresM::MostrarSuscriptoresM($tablaBD, $item, $valor);

		return $respuesta;

	}



	//Eliminar Suscriptores
	public function EliminarSuscriptoresC(){

		if(isset($_GET["Sid"])){

			$tablaBD = "suscriptores";

			$id = $_GET["Sid"];

			$respuesta = SuscriptoresM::EliminarSuscriptoresM($tablaBD, $id);

			if($respuesta == true){

				echo '<script>

				window.location = "suscriptores";

				</script>';

			}

		}

	}



	//Enviar Mensajes a los suscriptores
	public function MensajesSuscriptoresC(){
		//Enviar mensaje si la variable tituloS trae informacion 
		if(isset($_POST["tituloS"])){

			$tablaBD = "suscriptores";

			$respuesta = SuscriptoresM::MensajesSuscriptoresM($tablaBD);

			foreach ($respuesta as $key => $value) {
				
				$titulo = $_POST["tituloS"];
				$mensaje = $_POST["mensajeS"];

				$asunto = 'Mensaje para todos los Suscriptores de Hotel Zone';

				$para = $item["email"];

				$mensaje = '<html>

								<head>

									<title>Mensaje a Suscriptores</title>

								</head>

								<body>

									<p>'.$mensaje.'</p>

								</body>

							</html>';

				$cabeceras = 'MIME-Version: 1.0' . "\r\n";
				$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
				$cabeceras .= 'From: <marketing@hotelzone.com>' . "\r\n";

				$enviar = mail($para, $asunto, $mensaje, $cabeceras);

				//Si la variable enviar es correcto nos envie ala pagina suscriptores
				if($enviar){

					echo '<script>

					window.location = "suscriptores";

					</script>';

				}


			}

		}

	}



}