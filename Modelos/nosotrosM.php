<?php 	

require_once "admin/Modelos/ConexionBD.php";

class NosotrosM extends ConexionBD{

	static public function MostrarNosotrosM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT  titulo, introduccion, descripcion, imagen FROM $tablaBD");

		$pdo->execute();

		return $pdo-> fetch();

		$pdo -> close();
	}
}