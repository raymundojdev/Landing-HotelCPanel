$(".redes").on("click" , ".EditarR" , function(){

	var Rid = $(this).attr("Rid");

	var datos = new FormData();
	datos.append("Rid", Rid);

	$.ajax({

		url: "Ajax/redesA.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#Rid").val(respuesta["id"]);

			$("#iconoE").val(respuesta["icono"]);
			$("#urlE").val(respuesta["url"]);

		}


	})


})