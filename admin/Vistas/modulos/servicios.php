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
		<h1>Gestor de Servicios</h1>
	</section>

	<section class="content">
		
		<div class="box box-success">
			
			<div class="box-body">
				
				<div class="row TB">

					<?php 

					$item = null;
					$valor = null;

					$servicios = ServiciosC::MostrarServiciosC($item, $valor);

					foreach ($servicios as $key => $value) {
						
						echo '<div class="col-md-4 col-sm-6">
						
						<a href="#" class="EditarServicio" Sid="'.$value["id"].'" data-toggle="modal" data-target="#EditarServicio">
							
							<i class="fa fa-'.$value["icono"].'" style="font-size: 25px;"></i>

							<h4>'.$value["titulo"].'</h4>

							<p>'.$value["descripcion"].'</p>

						</a>

					</div>';
					}

					 ?>
						
				</div>

			</div>

			<div class="box-footer">
				<center><h3>Haga clic en el servicio que deseé editar.</h3></center>
			</div>

		</div>

	</section>

</div>


<div id="EditarServicio" class="modal fade" rol="dialog">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form rol="form" method="post">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">

							<center><h2>Servicios</h2></center>
							<hr>
							
							<h2>Icono:</h2>
							<input type="text" name="iconoE" id="iconoE" class="form-control input-lg">

							<input type="hidden" name="Sid" id="Sid">

						</div>

						<div class="form-group">
							
							<h2>Título:</h2>
							<input type="text" name="tituloE" id="tituloE" class="form-control input-lg">

						</div>

						<div class="form-group">
							
							<h2>Descripción:</h2>
							<textarea name="descripcionE" id="descripcionE"></textarea>

						</div>

					</div>

					<div class="modal-footer">
						
						<button type="submit" class="btn btn-success">Guardar</button>

						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

					</div>

				</div>

				<?php 

				$actualizarS = new ServiciosC();
				$actualizarS -> ActualizarServiciosC();

				 ?>

			</form>

		</div>

	</div>

</div>