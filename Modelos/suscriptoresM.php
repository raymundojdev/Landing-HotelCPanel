<?php

require_once "admin/Modelos/ConexionBD.php";

class SuscriptoresM extends ConexionBD{

	static public function EnviarSuscriptorM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (email) VALUES (:email)");

		$pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


}