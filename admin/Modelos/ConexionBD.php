<?php 	
//creamos la clase conexionBD
class ConexionBD{

	static public function cBD(){

		//una variable de base de datos y se hara la conexion donde habra 3 parametros en el primero va el host y el nombre de la base de datos, en el segundo el usuario root o el usuario asignado ala base de datos y el tercero la contraseña del usuario

		$bd = new PDO("mysql:host=localhost;dbname=hotel","root","");

		//con la misma variable solicitamos un exec para que nuestro charset sea de utf y nos permita poner caracteres especiales acentos y no nos cause algun error en la base de datos
		$bd -> exec("set names utf8");

		//retornamos la variable bd
		return $bd;
	}
}

 ?>