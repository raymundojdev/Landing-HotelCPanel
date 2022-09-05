<?php 


require_once "admin/Modelos/ConexionBD.php";

class GaleriaM extends ConexionBD{

	static public function MostrarGaleriaM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT imagen, titulo, descripcion,subtitulo FROM $tablaBD ORDER BY orden ASC");

		$pdo -> execute();

		return $pdo ->fetchAll();

		$pdo -> close();
	}
}