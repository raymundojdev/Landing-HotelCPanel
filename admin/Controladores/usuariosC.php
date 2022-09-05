<?php


class UsuariosC{

	//Ingreso de Usuarios
	public function IngresoUsuariosC(){
		//Hacemos una condicion para lo que se ingrese en la variable usuario-Ingreso nombre de el input si se cumple pasara a iniciar sesion
		if(isset($_POST["usuario-Ing"])){

			//SE UTILIZA PARA EVITAR QUE METAN UN SCRIPT ALA BASE DE DATOS Y COMPARA LA CONTRASEÑA Y NO PERMITA CARACTERES EXTRAÑOS-- pre_march se utiliza para comparar cadenas con expresiones regulares

			 //'/^[]+$/' los caracteres son para poder evitar ser ingresados
			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])){
				//creamos una variable de array con propiedades
				$datosC = array("usuario"=>$_POST["usuario-Ing"], "clave"=>$_POST["clave-Ing"]);

				//Variable con nombre de la tabla Usuarios
				$tablaBD = "usuarios";

				//Pedimos respuesta al Modelo con la clase UsuarioM llevara como parametros $datosC, $tablaBD
				$respuesta = UsuariosM::IngresoUsuariosM($datosC, $tablaBD);

				//hacemos una condicion preguntando si en la varieble de $respuesta lo que venga en usuarios es igual a la variable post usuario ingreso y lo que venga en respuesta clave es igual a clave ingreso
				if($respuesta["usuario"] == $_POST["usuario-Ing"] && $respuesta["clave"] == $_POST["clave-Ing"]){

					//Cuando se cumpla haremos nuestra variable de $_SESSION y le daremos de valor "Ingreso" y dara igual a verdadero true eso quiere decir que cuando la condicion se cumpla la variable $_SESSION["Ingreso"] sera verdadero 
					$_SESSION["Ingreso"] = true;

					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["usuario"] = $respuesta["usuario"];
					$_SESSION["clave"] = $respuesta["clave"];
					$_SESSION["foto"] = $respuesta["foto"];
					$_SESSION["rol"] = $respuesta["rol"];

					//si esto se cumple nos lleva ala ventana de inicio del sistema
					echo '<script>

						window.location = "inicio";
						</script>';

				}else{
					//si la condicion no se cumple entonces salta error al ingresar
					echo 'ERROR AL INGRESAR';

				}

			}

		}

	}


	// Ver Usuarios
	public function VerUsuariosC(){

		//Creamos la variable de Bd
		$tablaBD = "usuarios";

		//Solicitamos una respuesta a nuestro modelo y conocectamos una funcion con VerUsuariosM enviaremos los parametros $tablaBD
		$respuesta = UsuariosM::VerUsuariosM($tablaBD);

		//abrimos un foreach con la variable respuesta traiga un echo con lo que tenemos como registros en la tabla
		foreach ($respuesta as $key => $value) {
			
			echo '<tr>
                  
	                <td>'.($key+1).'</td>
	                <td>'.$value["usuario"].'</td>
	                <td>'.$value["clave"].'</td>';

	                //abrimos una nueva condicion en dodnde foto es diferente a vacio tendra un eco en el td entonces mostrara la foto de la base de datos en la variable value[foto]

	                if($value["foto"] != ""){

	                	//<!--Se agregara un tamaño de imagen en width-->
	                	echo '<td>

	                <img src="'.$value["foto"].'" class="user-image" alt="User Image" width="40px;"></td>';

	                //si no vendra con la imagen por defecto sin foto 
	                }else{

	                	echo '<td>

	                <img src="Vistas/img/usuarios/defecto.png" class="user-image" alt="User Image" width="40px;"></td>';

	                }
	                
	                //Agregamos la clase BorrarU y un atributo llamado Uid ese atributo sera igual a lo que venga concatenado a value["rol"] id del modelo de la base de datos 
	                echo '<td>'.$value["rol"].'</td>

	                <td>
	                  
	                  <div class="btn-group">
	                    
	                    <button class="btn btn-success EditarU" Uid="'.$value["id"].'"><i class="fa fa-pencil" data-toggle="modal" data-target="#EditarU"></i></button>

	                    
	                    <button class="btn btn-danger BorrarU" Uid="'.$value["id"].'" Ufoto="'.$value["foto"].'"><i class="fa fa-times"></i></button>

	                  </div>

	                </td>

	              </tr>';

		}

	}


	//Crear Usuarios
	public function CrearUsuariosC(){

		//Haremos una condicion si la variable post["usuariosN"] del input trae informacion vamos a crear una variable //llamada rutaImg que sea igual a vacia
		if(isset($_POST["usuarioN"])){

			$rutaImg = "";

			//creamos otra condicion donde nos dira si la variable $_FILES ["fotoN"] viene con informacion la variable //$_FILES es para archivos, la variable $_FILES lleva dos parametros el primero la variable foto N que es la //que traera la informacion y el segundo parametro es el archivo temporal "tmp_name" y tambien se hara otra //condicion para saber si no viene vacio y dentro la variable _FILES["fotoN"]
			if(isset($_FILES["fotoN"]["tmp_name"]) && !empty($_FILES["fotoN"]["tmp_name"])){

			//si esto se cumple vamos a preguntar en una condicion si la imagen es png o jpg, dos parametros uno de la //variable _FILES["fotoN"] y el segundo de "type" para saber el tipo 
				if($_FILES["fotoN"]["type"] == "image/jpeg"){

					//creamos una nueva variable, utilizamos el mt_rand que se utiliza para darle un rango al nombre de un //archivo en este caso sera un rango de 10 a 999 
					$nombre = mt_rand(10,999);

					//Creamos otra variable que sera rutaImg y en ella colocaremos la ruta de la imageen y al final //concatenamos con la variable nombre
					$rutaImg = "Vistas/img/usuarios/U".$nombre.".jpg";

					//creamos otra variable llamada foto sera igual a imagecreatefromjpg() esto devuelve un identificador //de imagen que si representa la imagen desde un nombre de fichero y agregamos los parametros //_FILES["fotoN"]["tmp_name"]
					$foto = imagecreatefromjpeg($_FILES["fotoN"]["tmp_name"]);

					//para finalizar colocaremos imagejpeg y adentro colocaremos el primer parametro que seria $foto y el //segundo seria la ruta de la imagen 
					imagejpeg($foto, $rutaImg);

				}

				//realizaremos lo mismo pero ahora con el formato png en esta condicion
				if($_FILES["fotoN"]["type"] == "image/png"){

					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/usuarios/U".$nombre.".png";

					$foto = imagecreatefrompng($_FILES["fotoN"]["tmp_name"]);

					imagepng($foto, $rutaImg);

				}


			}

			//Crearemos una nueva variable llamada $tablaBD que sera el nombre de nuestra tabla usuarios
			$tablaBD = "usuarios";

			//Creamos una nueva variable llamada datosC que sera igual a un array con propiedades la primera sera la de "usuario" el valor de esa prodiedad sera lo que venga en la variable $_POST segunda propiedad sera clave y le asiganeremos el valor de lo que venga en la variable post $_POST["claveN"] que viene del input del formulario para agregar el usuario
			$datosC = array("usuario"=>$_POST["usuarioN"], "clave"=>$_POST["claveN"], "rol"=>$_POST["rolN"], "foto"=>$rutaImg);

			//solicitamos una respuesta hacia nuestro modelo cola clase UsuariosM y la conectamos con la funcion CrearUsuariosM y mandando como  parametros $tablaBD y $datosC
			$respuesta = UsuariosM::CrearUsuariosM($tablaBD, $datosC);

			//creamos condicion lo que venga en respuesta es igual a verdadero entonces
			if($respuesta == true){

				echo '<script>

						window.location = "usuarios";
						</script>';

				}else{

					echo 'ERROR AL CREAR USUARIO';

				}

		}

	}


	//BORRAR USUARIOS

	public function BorrarUsuariosC(){

		//Hacemos una condicion  que lo que venga en la variable Get["Uid"] se cumplira lo siguiente
		if(isset($_GET["Uid"])) {
			
			//Abrimos variable de la base de datos con la tabla usuarios
			$tablaBD = "usuarios";
			//datoc c que sea igual ala variable get["Uid"]
			$datosC  = $_GET["Uid"];

			//abrimos condicion para eliminar la foto si la variable get de Ufoto es diferente a vacio se hara un unlink
			if($_GET["Ufoto"] != "") {
				//el unlink se utiliza para eliminar archivos de tipo file
				unlink($_GET["Ufoto"]);
			}
			//Creamos variable (respuesta) para solicitar una respuesta al modelo 
			$respuesta = UsuariosM::BorrarUsuariosM($tablaBD,$datosC);

			//creamos una confidicion, si la respuesta del modelo es true recargara la pagina usuarios 
			if($respuesta == true){

				echo '<script>

						window.location = "usuarios";
						</script>';

				}else{

					echo 'ERROR AL BORRAR USUARIO';

				}
		}
	}

	//Llamar datos para editarlos
	static public function EUsuariosC($item,$valor){

		$tablaBD = "usuarios";

		$respuesta = UsuariosM::EUsuariosM($tablaBD,$item, $valor);

		return $respuesta;

	}

	public function ActualizarUsuariosC(){
		//Si viene con informacion la variable postUid
		if(isset($_POST["Uid"])){

		//Entonces crearemos una variable ruta img solo que no estara vacia
			$rutaImg = $_POST["FotoActual"];

			if (isset($_FILES["fotoE"]["tmp_name"]) && !empty($_FILES["fotoE"]["tmp_name"])) {
				
				if (!empty($_POST["FotoActual"])) {
					
					unlink($_POST["FotoActual"]);
				}else{

					mkdir($direc, 0755);
				}

				if ($_FILES["fotoE"]["type"] == "image/jpeg") {
					
					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/usuarios/U".$nombre.".jpeg";

					$foto = imagecreatefromjpeg($_FILES["fotoE"]["tmp_name"]);

					imagejpeg($foto, $rutaImg);
				}


				if ($_FILES["fotoE"]["type"] == "image/png") {
					
					$nombre = mt_rand(10,999);

					$rutaImg = "Vistas/img/usuarios/U".$nombre.".png";

					$foto = imagecreatefrompng($_FILES["fotoE"]["tmp_name"]);

					imagepng($foto, $rutaImg);
				}


			}

			$tablaBD = "usuarios";

			$datosC = array("id"=>$_POST["Uid"],"usuario"=>$_POST["usuarioE"],"clave"=>$_POST["claveE"],"rol"=>$_POST["rolE"],"foto"=>$rutaImg);

			$respuesta = UsuariosM::ActualizarUsuariosM($tablaBD,$datosC);

			if($respuesta == true){

				echo '<script>

						window.location = "usuarios";
						</script>';

				}else{

					echo 'ERROR AL EDITAR USUARIO';

				}
		}
	}

	//VER PERFIL DEL USUARIO ACTUAL EN SESION


	public function VerPerfilC(){

		$tablaBD = "usuarios";

		$id = $_SESSION["id"];

		$respuesta = UsuariosM::VerPerfilM($tablaBD, $id);

		echo '<tr>
                  
	              
	                <td>'.$respuesta["usuario"].'</td>
	                <td>'.$respuesta["clave"].'</td>';

	                //abrimos una nueva condicion en dodnde foto es diferente a vacio tendra un eco en el td entonces mostrara la foto de la base de datos en la variable respuesta[foto]

	                if($respuesta["foto"] != ""){

	                	//<!--Se agregara un tamaño de imagen en width-->
	                	echo '<td>

	                <img src="'.$respuesta["foto"].'" class="user-image" alt="User Image" width="40px;"></td>';

	                //si no vendra con la imagen por defecto sin foto 
	                }else{

	                	echo '<td>

	                <img src="Vistas/img/usuarios/defecto.png" class="user-image" alt="User Image" width="40px;"></td>';

	                }
	                
	                //Agregamos la clase BorrarU y un atributo llamado Uid ese atributo sera igual a lo que venga concatenado a respuesta["rol"] id del modelo de la base de datos 
	                echo '

	                <td>
	                  
	                  <div class="btn-group">
	                    
	                    <button class="btn btn-success EditarU" Uid="'.$respuesta["id"].'"><i class="fa fa-pencil" data-toggle="modal" data-target="#EditarU"></i></button>

	                  
	                  </div>

	                </td>

	              </tr>';

	}

}
