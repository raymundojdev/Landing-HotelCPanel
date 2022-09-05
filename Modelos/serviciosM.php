<?php 



require_once "admin/Modelos/ConexionBD.php";

class ServiciosM extends ConexionBD{


	static public function VerServiciosM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT icono, titulo, descripcion FROM $tablaBD");

		$pdo -> execute();

		return $pdo->fetchAll();

		$pdo -> close();
	}
}