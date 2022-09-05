$(".TB").on("click", ".EditarServicio", function(){

	var Sid = $(this).attr("Sid");
	var datos = new FormData();

	datos.append("Sid", Sid);

	$.ajax({

		url: "Ajax/serviciosA.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#Sid").val(respuesta["id"]);
			$("#iconoE").val(respuesta["icono"]);
			$("#tituloE").val(respuesta["titulo"]);
			$("#descripcionE").val(respuesta["descripcion"]);

		}

	})

})