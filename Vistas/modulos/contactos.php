<div class="contact py-5" id="contact">
         <div class="container  py-md-3">
		 <div class="w3-head-all mb-3 w3-head-col">
		         <h3>Contact us</h3>
		       </div>
			 <div class="address-below">
            <div class="contact-icons text-center row">
               <div class="col-md-4 col-sm-4 col-xs-4 footer_grid_left">
                  <div class="icon_grid_left">
                     <span class="fas fa-map-marker" aria-hidden="true"></span>
                  </div>

                  <?php

                  $contactos = new InicioC();
                  $contactos -> VerContactosC();

                  ?>
                 
               </div>
               <div class="clearfix"> </div>
            </div>
         </div>