<?php 

require_once "ConexionBD.php";

class NosotrosM extends ConexionBD{

	static public function VerNosotrosM($tablaBD){

	$pdo = ConexionBD::cBD()->prepare("SELECT id,titulo, introduccion, descripcion, imagen FROM $tablaBD");

	$pdo-> execute();

	return $pdo ->fetch();	

	$pdo -> close();

	}

	static public function EditarNosotrosM($tablaBD,$id){

		$pdo = ConexionBD::cBD()->prepare("SELECT id, titulo, introduccion, descripcion, imagen FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo ->fetch();	

		$pdo -> close();
	}

	static public function ActualizarNosotrosM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET titulo = :titulo, introduccion = :introduccion, descripcion = :descripcion, imagen = :imagen WHERE id = :id");

		$pdo ->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo ->bindParam(":titulo", $datosC["titulo"], PDO::PARAM_STR);
		$pdo ->bindParam(":introduccion", $datosC["introduccion"], PDO::PARAM_STR);
		$pdo ->bindParam(":descripcion", $datosC["descripcion"], PDO::PARAM_STR);
		$pdo ->bindParam(":imagen", $datosC["imagen"], PDO::PARAM_STR);

		if ($pdo->execute()) {
			
			return true;

		}else{

			return false;;
		}

		$pdo -> close();
	}

}