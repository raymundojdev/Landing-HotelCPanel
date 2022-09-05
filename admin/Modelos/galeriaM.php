<?php 

require_once "ConexionBD.php";

class GaleriaM extends ConexionBD{

	static public function CrearGaleriaM($tablaBD,$datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (titulo, subtitulo, descripcion, orden, imagen) VALUES (:titulo, :subtitulo, :descripcion, :orden, :imagen )");

		$pdo -> bindParam(":titulo",$datosC["titulo"], PDO::PARAM_STR);
		$pdo -> bindParam(":subtitulo",$datosC["subtitulo"], PDO::PARAM_STR);
		$pdo -> bindParam(":descripcion",$datosC["descripcion"], PDO::PARAM_STR);
		$pdo -> bindParam(":orden",$datosC["orden"], PDO::PARAM_STR);
		$pdo -> bindParam(":imagen",$datosC["imagen"], PDO::PARAM_STR);

		if ($pdo -> execute()) {
			
			return true;
		}else{

			return false;
		}

		$pdo -> close();
	}

	static public function VerGaleriaM($tablaBD, $item, $valor){

		if ($item != null) {
			
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item");

			$pdo -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY orden ASC");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}

		$pdo -> close();
	}

	static public function BorrarGaleriaM($tablaBD,$id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if ($pdo -> execute()) {
			return true;
		}else{

			return false;
		}

		$pdo -> close();
	}

	//ACTUALIZAR GALERIA 

	static public function ActualizarGaleriaM($tablaBD, $datosC)
	{
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET titulo = :titulo, subtitulo = :subtitulo, descripcion = :descripcion, orden = :orden, imagen = :imagen WHERE id = :id");

		$pdo ->bindParam(":id",$datosC["id"],PDO::PARAM_INT);
		$pdo ->bindParam(":titulo",$datosC["titulo"],PDO::PARAM_STR);
		$pdo ->bindParam(":subtitulo",$datosC["subtitulo"],PDO::PARAM_STR);
		$pdo ->bindParam(":descripcion",$datosC["descripcion"],PDO::PARAM_STR);
		$pdo ->bindParam(":orden",$datosC["orden"],PDO::PARAM_STR);
		$pdo ->bindParam(":imagen",$datosC["imagen"],PDO::PARAM_STR);

		if ($pdo ->execute()) {
			return true;
		}else{
			return false;
		}

		$pdo-> close();
	}

}