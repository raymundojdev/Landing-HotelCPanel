<?php 

require_once "ConexionBD.php";

//se hara una herencia, extends se utiliza para hacer una herencia de una clase y poder usar sus metodos y propiedades en otras clases la herencia se hara una herencia de la clase ConexionBD

class UsuariosM extends ConexionBD{

	//Ingresar al Gestor 
	//Se creara una funcion statica publica y statica por que llevara parametros $datosC,$tablaBD
	static public function IngresoUsuariosM($datosC, $tablaBD){
		//Una variable pdo para hacer la conexion y solicitamos un prepare
		$pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, foto, rol, id FROM $tablaBD WHERE usuario = :usuario");

		//enlazaremos un parametro con bindParam() se utiliza cuando se tienen que pasar datos múltiples (desde un array por ejemplo).
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

		//la variable pdo se ejecute
		$pdo -> execute();
		//nos retorne la variable pdo con un fetch una sola fila
		return $pdo -> fetch();

		//cerramos pdo
		$pdo -> close();
	}

	//Ver los Usuarios
	//Funcion statica por que llevara parametros
	static public function VerUsuariosM($tablaBD){
		//crearemos la variable pdo

		$pdo = ConexionBD::cBD()->prepare("SELECT DISTINCT id,usuario, clave,foto,rol FROM $tablaBD");
		//variable pdo para que se nos ejecute la consulta SELECT
		$pdo -> execute();
		//retornamos el pdo con un fetchAll() para mostrar todos los usuarios
		return $pdo -> fetchAll();
		//Cerramos la conexion de la BD
		$pdo -> close();

	}


	//Crear Usuarios
	static public function CrearUsuariosM($tablaBD, $datosC){
		
		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (usuario ,clave, rol, foto) VALUES (:usuario, :clave, :rol, :foto)");

		//enlazamos parametros
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);

		//utilizaremos una condicion si nuestra variable pdo se nos ejecula vamos a retornar verdadero
		if($pdo -> execute()) {
			return true;
		//si no se cumple que nos retorne como falso
		}else{
			return false;
		}

		//Cerramos conexion de pdo
		$pdo -> close();

	}

	//BORRAR USUARIOS

	static public function BorrarUsuariosM($tablaBD,$datosC){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $datosC, PDO::PARAM_INT);

		if($pdo -> execute()) {
			return true;
		//si no se cumple que nos retorne como falso
		}else{
			return false;
		}

		//Cerramos conexion de pdo
		$pdo -> close();

	}


	//LLAMAR DATOS PARA EDITAR

	static public function EUsuariosM($tablaBD,$item,$valor)
	{
		//Preguntamos con una condicion si la variable item es diferente a null 
		if ($item != null) {
			//entonces se realizara 
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item");

			$pdo ->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
		
			$pdo -> execute();

			return $pdo -> fetchAll();

		}

		$pdo -> close();
	}


	//ACTUALIZAR DATOS

	static public function ActualizarUsuariosM($tablaBD,$datosC)
	{
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario = :usuario, clave = :clave, rol =  :rol, foto = :foto WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);
		$pdo -> bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);

		if($pdo -> execute()) {
			return true;
		//si no se cumple que nos retorne como falso
		}else{
			return false;
		}

		//Cerramos conexion de pdo
		$pdo -> close();
	}

	//VER PERFIL DEL USUARIO ACTUAL 

	static public function VerPerfilM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT id,usuario,clave,foto FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
	}
}

 
	
