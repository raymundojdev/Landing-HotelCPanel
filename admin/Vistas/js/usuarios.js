//Borrar Usuarios 

//Ccuando se haga click en lo que tiene la clase BorrarU que esta en el boton de
//eliminar cuando eso pase se ejecute una funcion
$(".TB").on("click", ".BorrarU", function(){

	//creamos las variables Uid que sera igual a lo que estemos haciendo click en su atribbuto que esta en el atributo 
	//del boton borrar
	var Uid = $(this).attr("Uid");

	//otra variable Ufoto es el atributo Ufoto del boton borrar
	var Ufoto = $(this).attr("Ufoto");

	//Abrimos window location qu
	window.location = "index.php?url=usuarios&Uid="+Uid+"&Ufoto="+Ufoto;
})


//LLAMAR DATOS PARA EL EDITAR

$(".TB").on("click", ".EditarU", function(){

	var Uid = $(this).attr("Uid");
	var datos = new FormData();

	datos.append("Uid", Uid);

	//ACCION AJAX

	$.ajax({

		url:"Ajax/usuariosA.php",
		//Metodo
		method: "POST",
		data:datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#usuarioE").val(respuesta["usuario"]);

			$("#Uid").val(respuesta["id"]);

			$("#claveE").val(respuesta["clave"]);

			$("#rolE").html(respuesta["rol"]);
			$("#rolE").val(respuesta["rol"]);

			$("#FotoActual").val(respuesta["foto"]);

			//Condicion para saber si no viene vacio se agregara la nueva foto 
			if(respuesta["foto"]  != ""){

				$(".visor").attr("src", respuesta["foto"]);

			}else{

				$(".visor").attr("src", "Vistas/img/usuarios/defecto.png");
			}

		}


	})
}) 
	
$('textarea').each(function(){
		$(this).val($(this).val().trim());

})