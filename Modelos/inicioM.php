<?php

require_once "admin/Modelos/ConexionBD.php";

class InicioM extends ConexionBD{

	static public function VerGenerales1M($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT favicon, titular FROM $tablaBD");

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}

	static public function VerGenerales2M($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT logotipo FROM $tablaBD");

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}



	static public function VerContactosM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT ubicacion,telefono,correo FROM $tablaBD");

		$pdo -> execute();

		return $pdo ->fetch();

		$pdo -> close();

		$pdo = null;

	}


	static public function VerRedesM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT icono, url FROM $tablaBD");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}

}