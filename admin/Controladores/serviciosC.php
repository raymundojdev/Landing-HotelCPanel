<?php

class ServiciosC{

	static public function MostrarServiciosC($item, $valor){

		$tablaBD = "servicios";

		$respuesta = ServiciosM::MostrarServiciosM($tablaBD, $item, $valor);

		return $respuesta;

	}

	public function actualizarServiciosC(){

		if(isset($_POST["iconoE"])){

			$tablaBD = "servicios";

			$datosC = array("id"=>$_POST["Sid"], "icono"=>$_POST["iconoE"], "titulo"=>$_POST["tituloE"], "descripcion"=>$_POST["descripcionE"]);

			$respuesta = ServiciosM::actualizarServiciosM($tablaBD, $datosC);

			if($respuesta == true){

				echo '<script>

				window.location = "servicios";
				</script>';

			}

		}

	}
}