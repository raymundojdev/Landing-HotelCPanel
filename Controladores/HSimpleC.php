<?php

class HSimpleC{

	public function VerHSimpleC(){

		$tablaBD = "hsimple";

		$respuesta = HSimpleM::VerHSimpleM($tablaBD);

		echo '<div class="col-lg-3 col-md-6 col-sm-6 price-grid">
				<div class="price-block agile">
					<div class="price-gd-top">

					<img src="admin/'.$respuesta["imagen"].'" alt=" " class="img-responsive img-fluid" />

						<h4>Deluxe Room</h4>

					</div>

					<div class="price-gd-bottom">

						   <div class="price-list">
								<ul>';

								if($respuesta["estrellas"] == "1"){

									echo '<li><i class="fa fa-star" aria-hidden="true"></i></li>';

								}else if($respuesta["estrellas" == "2"]){

									echo '<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>';

								}else if($respuesta["estrellas" == "3"]){

									echo '<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>';

								}else if($respuesta["estrellas" == "4"]){

									echo '<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>';

								}else{

									echo '<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<li><i class="fa fa-star" aria-hidden="true"></i></li>';

								}
										
							     echo '</ul>
						</div>

						<div class="price-selet">	

							<h3><span>$</span> '.$respuesta["precio"].'</h3>		

							<a href="#appointment" class="scroll" >Book Now</a>

						</div>
					</div>
				</div>
			</div>';

	}

}