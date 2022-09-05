<?php 	

require_once "ConexionBD.php";

class SlideM extends ConexionBD{


	//CREAR SLIDE
	static public function CrearSlideM($tablaBD, $datosC)
	{
		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (titular,descripcion,orden,imagen) VALUES (:titular,:descripcion,:orden,:imagen)");

		$pdo -> bindParam(":titular",$datosC["titular"], PDO::PARAM_STR);
		$pdo -> bindParam(":descripcion",$datosC["descripcion"], PDO::PARAM_STR);
		$pdo -> bindParam(":orden",$datosC["orden"], PDO::PARAM_STR);
		$pdo -> bindParam(":imagen",$datosC["imagen"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}else{

			return false;
		}

		$pdo -> close();
	}

	//VER SLIDE

	static public function VerSlideM($tablaBD, $item, $valor){

		if ($item != null) {
			
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item");

			$pdo -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo	-> fetch();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY orden ASC");
			
			$pdo ->execute();

			return $pdo -> fetchAll();

		}

		$pdo -> close();
	}

	static public function ActualizarSlideM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET titular = :titular, descripcion = :descripcion, orden = :orden, imagen = :imagen WHERE id = :id"); 

		$pdo -> bindParam(":id", $datosC["id"],PDO::PARAM_INT);
		$pdo -> bindParam(":titular", $datosC["titular"],PDO::PARAM_STR);
		$pdo -> bindParam(":descripcion", $datosC["descripcion"],PDO::PARAM_STR);
		$pdo -> bindParam(":orden", $datosC["orden"],PDO::PARAM_STR);
		$pdo -> bindParam(":imagen", $datosC["imagen"],PDO::PARAM_STR);

		if ($pdo -> execute()) {
			
			return true;

		}else{

			return false;
		}

		$pdo -> close();

	}


	static public function BorrarSlideM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id , PDO::PARAM_INT);

		if ($pdo -> execute()) {
			
			return true;

		}else{

			return false;
		}

		$pdo -> close();
	}
}