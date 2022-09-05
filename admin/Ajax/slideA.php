<?php 

require_once "../Controladores/slideC.php";
require_once "../Modelos/slideM.php";

class SlideA{

	public $Sid;

	public function EditarSlideA(){

		$item = "id";
		$valor = $this ->Sid;

		$respuesta = SlideC::VerSlideC($item,$valor);

		echo json_encode($respuesta);

	}
}

if (isset($_POST["Sid"])) {
	
	$editarS = new SlideA();
	$editarS -> Sid = $_POST["Sid"];
	$editarS -> EditarSlideA();
}


