<?php
  
if($_SESSION["rol"] != "Administrador" && $_SESSION["rol"] =! "Editor de Contenido"){

  echo '<script>

  window.location = "suscriptores";
  </script>';

  return;

}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor Sobre Nosotros
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
              
      <div class="box box-success">
        
        <div class="box-body">
          
        <?php   

        $verN = new NosotrosC();
        $verN -> EditarNosotrosC();

        ?>

        </div>

        
      </div>

      

    </section>
    <!-- /.content -->
  </div>

  <div id="EditarNosotros" class="modal fade" role="dialog">
    
    <div class="modal-dialog">
      
      <div class="modal-content">
        
        <form role="form" method="post" enctype="multipart/form-data">
          
          <?php 

          $editarN = new NosotrosC();
          $editarN -> EditarNosotrosC();

          ?>

          <div class="modal-footer">
                         
            <button class="btn btn-success" type="submit">Guardar</button>

            <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>

          </div>
          

        </form>

      </div>

    </div>

  </div>

  <?php   

  $actualizarN = new NosotrosC();
  $actualizarN -> ActualizarNosotrosC();

   ?>