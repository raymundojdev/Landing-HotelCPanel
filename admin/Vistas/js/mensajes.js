
$(".MEN").on("click", ".ResponderM", function(){

	var Mid = $(this).attr("Mid");
	var datos = new FormData();

	datos.append("Mid", Mid);

	$.ajax({

		url: "Ajax/mensajesA.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",

		success: function(resultado){

			$("#Mid").val(resultado["id"]);
			$("#asuntoM").val(resultado["asunto"]);
			$("#nombreM").val(resultado["nombre"]);
			$("#emailM").val(resultado["email"]);

		}

	})

})