<?php 	

require_once "admin/Modelos/ConexionBD.php";


class SlideM extends ConexionBD{

	static public function MostrarSlideM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT titular, descripcion, orden, imagen FROM $tablaBD ORDER BY orden ASC");

		$pdo -> execute();

		return $pdo->fetchAll();

		$pdo -> close();
	}
}