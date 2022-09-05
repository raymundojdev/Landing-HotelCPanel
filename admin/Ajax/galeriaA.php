<?php 

require_once "../Controladores/galeriaC.php";
require_once "../Modelos/galeriaM.php";


class AjaxGaleria{

	public $Gid;

	public function EditarGaleriaA(){

		$item ="id";
		$valor = $this->Gid;

		$respuesta = GaleriaC::VerGaleriaC($item,$valor);

		echo json_encode($respuesta);
	}
}


if (isset($_POST["Gid"])) {
	
	$editarG = new AjaxGaleria();
	$editarG -> Gid = $_POST["Gid"];
	$editarG -> EditarGaleriaA();
}