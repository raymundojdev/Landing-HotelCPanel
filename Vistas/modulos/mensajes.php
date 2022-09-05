  <div class="w3layouts_mail_grid_right">
               <form action="#" method="post">
            <div class="row contact-grids">
                  <div class="col-md-6 col-xs-6 wthree_contact_left_grid">
                     <input type="text" name="nombre" placeholder="Nombre" required="">
                  </div>
                  <div class="col-md-6 col-xs-6 wthree_contact_left_grid">
                     <input type="email" name="email" placeholder="Email" required="">
                  </div>
                  <div class="col-md-6 col-xs-6 wthree_contact_left_grid">
                     <input type="text" name="telefono" placeholder="Teléfono" required="">
                  </div>
                  <div class="col-md-6 col-xs-6 wthree_contact_left_grid">
                     <input type="text" name="asunto" placeholder="Asunto" required="">
                  </div>
                  <div class="clearfix"> </div>
                  <textarea name="mensaje" placeholder="Mensaje..." required=""></textarea>

                  <input type="submit" value="Enviar">
                  <input type="reset" value="Limpiar">
                </div>

                <?php

                $enviarM = new MensajesC();
                $enviarM -> EnviarMensajesC();

                ?>
             </form>
            </div>