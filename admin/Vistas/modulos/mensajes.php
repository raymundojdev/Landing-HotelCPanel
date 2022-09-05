<?php
  
if($_SESSION["rol"] != "Administrador" && $_SESSION["rol"] =! "Editor de Contenido"){

  echo '<script>

  window.location = "suscriptores";
  </script>';

  return;

}

?>
<div class="content-wrapper">
	
	<section class="content-header">

		<h1>Gestor de los Mensajes</h1>

	</section>

	<section class="content">

		<?php

		$item = null;
		$valor = null;

		$mensajes = MensajesC::MostrarMensajesC($item, $valor);

		foreach ($mensajes as $key => $value) {
			
			echo '<div class="row MEN">
					
					<div class="col-md-12">
							
						<div class="box box-primary">
							
							<div class="box-header with-border">
								
								<h2>Asunto: '.$value["asunto"].'</h2>

								<div class="box-tools pull-right">
									
									<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"><i class="fa fa-minus"></i></button>

									<a href="index.php?url=mensajes&Mid='.$value["id"].'"><button type="button" class="btn btn-box-tool"><i class="fa fa-times"></i></button></a>

								</div>

							</div>

							<div class="box-body">
								
								<p>'.$value["fecha"].'</p>

								<h3>Nombre: '.$value["nombre"].'</h3>

								<h5>Email: '.$value["email"].'</h5>

								<h5>Teléfono: '.$value["telefono"].'</h5>

								<h4>'.$value["mensaje"].'</h4>

							</div>

							<div class="box-footer">
								
								<button type="button" class="btn btn-primary btn-lg ResponderM" data-toggle="modal" data-target="#ResponderM" Mid="'.$value["id"].'">Responder</button>

							</div>

						</div>

					</div>

				</div>';

		}

		$eliminarM = new MensajesC();
		$eliminarM -> EliminarMensajesC();

		?>
		
	</section>

</div>

<div class="modal fade" id="ResponderM" role="dialog">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form role="form" method="post">
				
				<div class="modal-body">
					
					<div class="form-group">
						
						<h2>Asunto:</h2>

						<input class="form-control" type="text" id="asuntoM" name="asuntoM" readonly>

						<input class="form-control" type="hidden" id="Mid" name="Mid" readonly>

					</div>

					<div class="form-group">
						
						<h2>Nombre:</h2>

						<input class="form-control" type="text" id="nombreM" name="nombreM" readonly>

					</div>

					<div class="form-group">
						
						<h2>Email:</h2>

						<input class="form-control" type="email" id="emailM" name="emailM" readonly>

					</div>

					<div class="form-group">
						
						<h2>Respuesta:</h2>

						<textarea class="form-control" name="respuestaM">
							
						</textarea>

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">ENVIAR</button>

					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php

				$enviarM = new MensajesC();
				$enviarM -> RespuestaMensajeC();

				?>

			</form>

		</div>

	</div>

</div>