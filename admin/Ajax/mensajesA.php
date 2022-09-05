<?php

require_once "../Controladores/mensajesC.php";
require_once "../Modelos/mensajesM.php";

class MensajesAjax{

	public $Mid;

	public function ResponderMensajesA(){

		$item = "id";
		$valor = $this->Mid;

		$respuesta = MensajesC::MostrarMensajesC($item, $valor);

		echo json_encode($respuesta);

	}

}


if(isset($_POST["Mid"])){

	$responderM = new MensajesAjax();
	$responderM -> Mid = $_POST["Mid"];
	$responderM -> ResponderMensajesA();

}