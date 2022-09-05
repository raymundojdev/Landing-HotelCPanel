<?php

require_once "ConexionBD.php";

class InicioM extends ConexionBD{

	//Ver Ajustes Generales
	static public function VerGeneralesM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT id, favicon, titular, logotipo FROM $tablaBD");
		$pdo -> execute();
		return $pdo -> fetch();
		$pdo -> close();
		$pdo = null;

	}


	//Editar Ajustes Generales
	static public function EditarGeneralesM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT id, favicon, titular, logotipo FROM $tablaBD WHERE id = :id");
		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);
		$pdo -> execute();
		return $pdo -> fetch();
		$pdo->close();
		$pdo = null;

	}



	//Actualizar Ajustes Generales
	static public function ActualizarGeneralesM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET favicon = :favicon, titular = :titular, logotipo = :logotipo WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":favicon", $datosC["favicon"], PDO::PARAM_STR);
		$pdo -> bindParam(":titular", $datosC["titular"], PDO::PARAM_STR);
		$pdo -> bindParam(":logotipo", $datosC["logotipo"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;

	}

	//VER CONTACTOS

	static public function VerContactosM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT id,ubicacion, telefono, correo FROM $tablaBD");
		$pdo -> execute();
		return $pdo -> fetch();
		$pdo -> close();
		$pdo = null;
	}

	static public function EditarContactosM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT id, ubicacion,telefono,correo FROM $tablaBD WHERE id = :id");		$pdo -> bindParam(":id",$id, PDO::PARAM_INT);
		$pdo -> execute();
		return $pdo -> fetch();
		$pdo -> close();	
		$pdo = null;	
	}

	static public function ActualizarContactosM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET ubicacion =:ubicacion, telefono = :telefono, correo = :correo WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"],PDO::PARAM_INT);
		$pdo -> bindParam(":ubicacion", $datosC["ubicacion"],PDO::PARAM_STR);
		$pdo -> bindParam(":telefono", $datosC["telefono"],PDO::PARAM_STR);
		$pdo -> bindParam(":correo", $datosC["correo"],PDO::PARAM_STR);

		if ($pdo -> execute()) {		
			return true;
		}else{
			return false;
		}
		$pdo -> close();
		$pdo = null;
	}

	static public function VerRedesM($tablaBD,$item, $valor){

		if ($item != null) {				
		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item");
		$pdo -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$pdo -> execute();
		return $pdo -> fetch();
		
		}else{
		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
		$pdo -> execute();
		return $pdo -> fetchAll();

		}
		$pdo -> close();
		$pdo = null;
	
	}

	static public function ActualizarRedesM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET icono = :icono, url = :url WHERE id = :id");
		//Enlazamos parametros
		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":icono", $datosC["icono"], PDO::PARAM_STR);
		$pdo -> bindParam(":url", $datosC["url"], PDO::PARAM_STR);

		if ($pdo -> execute()) {			
			return true;
		}		
		$pdo -> close();
		$pdo = null;
	}
}