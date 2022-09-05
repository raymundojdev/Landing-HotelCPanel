<?php 


class ServiciosC{

	public function VerServiciosC(){

		$tablaBD = "servicios";

		$respuesta = ServiciosM::VerServiciosM($tablaBD);

		foreach ($respuesta as $key => $value) {
			
		echo   '<div class="col-md-4 w3l-services-grid mb-5">
					<div class="w3ls-services-img">
						<i class="fa fa-'.$value["icono"].'"></i>
					</div>
					<div class="agileits-services-info">
						<h4 class="my-sm-3 my-2">'.$value["titulo"].'</h4>
						<p>'.$value["descripcion"].'</p>
					</div>
				</div>';

		}

	}
}