<?php 

class SlideC{

	public function MostrarSlideC(){

		$tablaBD = "slide";
		$respuesta = SlideM::MostrarSlideM($tablaBD);

		foreach ($respuesta as $key => $value) {
			
			echo '<li>
						<div class="slider-img4" style="background: url(admin/'.$value["imagen"].') no-repeat 0px 0px;">

								<div class="dot">

									<div class="container">

										<div class="slider_banner_info_w3ls">

										<h1 class="text-uppercase mb-3">'.$value["titular"].' </h1>
											
											<p>'.$value["descripcion"].'</p>
											
											
										</div>
									</div>
								</div>
							</div>
						</li> ';
		}

					echo '</div>';
	}
}

 ?>