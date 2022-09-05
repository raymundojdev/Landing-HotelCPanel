<?php

require_once "admin/Modelos/ConexionBD.php";

class MensajesM extends ConexionBD{

	static public function EnviarMensajesM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre, email, telefono, asunto, mensaje) VALUES (:nombre, :email, :telefono, :asunto, :mensaje)");

		$pdo -> bindParam(":nombre", $datosC["nombre"],PDO::PARAM_STR);
		$pdo -> bindParam(":email", $datosC["email"],PDO::PARAM_STR);
		$pdo -> bindParam(":telefono", $datosC["telefono"],PDO::PARAM_STR);
		$pdo -> bindParam(":asunto", $datosC["asunto"],PDO::PARAM_STR);
		$pdo -> bindParam(":mensaje", $datosC["mensaje"],PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;

	}

}