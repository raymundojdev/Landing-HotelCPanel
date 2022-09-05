//Borrar imagen galeria
$(".TB").on("click", ".BorrarGaleria", function(){

	var Gid = $(this).attr("Gid");
	var Gimagen = $(this).attr("Gimagen");

	window.location = "index.php?url=galeria&Gid="+Gid+"&Gimagen"+Gimagen;

})


//Traer datos para Actualizar

$(".TB").on("click", ".EditarGaleria", function(){

	var Gid = $(this).attr("Gid");
	var datos = new FormData();

	datos.append("Gid", Gid);

	$.ajax({


		url: "Ajax/galeriaA.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType:false,
		processData:false,
		dataType:"json",
		success: function(resultado) {
			
			$("#Gid").val(resultado["id"]);

			$("#tituloE").val(resultado["titulo"]);

			$("#subtituloE").val(resultado["subtitulo"]);

			$("#descripcionE").val(resultado["descripcion"]);

			$("#ordenE").val(resultado["orden"]);

			$("#imagenActual").val(resultado["imagen"]);
			$(".visor").attr("src", resultado["imagen"]);

		}
	})

})