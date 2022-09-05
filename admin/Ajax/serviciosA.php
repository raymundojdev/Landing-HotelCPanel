<?php 
require_once "../Controladores/serviciosC.php";

require_once "../Modelos/serviciosM.php";

class AjaxServicios{

	public $Sid;

	public function EditarServiciosA(){

		$item = "id";
		$valor = $this->Sid;

		$respuesta = ServiciosC::MostrarServiciosC($item, $valor);

		echo json_encode($respuesta);

	}

}


if(isset($_POST["Sid"])){

	$servicios = new AjaxServicios();
	$servicios -> Sid = $_POST["Sid"];
	$servicios -> EditarServiciosA();

}