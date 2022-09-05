<?php   

if ($_SESSION["rol"] != "Administrador" && $_SESSION["rol"] !="Editor de Contenido") {
  
  echo '
  <script>

  window.location = "suscriptores";

  </script>'; 

  return;
}

 ?>

<div class="content-wrapper">
  
  <section class="content-header">
    
    <h1>Ajustes Generales del Sitio</h1>

  </section>

  <section class="content">
    
    <div class="row">
      
      <div class="col-md-6 col-xs-12">
        
        <div class="box box-success">
          
          <div class="box-body">


            <?php

            $generales = new InicioC();
            $generales -> VerGeneralesC();

             ?>
            
           
          </div>

          <div class="box-footer">
            
            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#EditarGenerales"><i class="fa fa-pencil"></i> Editar</button>

          </div>

        </div>

      </div>

      <div class="col-md-6 col-xs-12">
        
        <div class="box box-warning">
          
          <div class="box-header with-border">
            
            <h2>Contactos</h2>

          </div>

          <div class="box-body">

            <?php 

            $contactos = new InicioC();
            $contactos ->VerContactosC();

             ?>           
            
          </div>

          <div class="box-footer">
            
            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#EditarContactos"><i class="fa fa-pencil"></i> Editar</button>

          </div>

        </div>

      </div>

      <div class="col-md-6 col-xs-12">
        
        <div class="box box-primary">
          
          <div class="box-header with-border">
            
            <h2>Redes Sociales</h2>

          </div>

          <div class="box-body redes">       

            <?php 

            $item = null;
            $valor = null;

            $redes = InicioC::VerRedesC($item,$valor);

            foreach ($redes as $key => $value) {

              echo ' <div class="form-group"> 

                      <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-'.$value["icono"].'" style="font-size: 20px"></i></span>

                <input type="text" class="form-control input-lg" value="'.$value["url"].'" readonly="">

                <button class="btn btn-success EditarR" Rid="'.$value["id"].'" data-toggle="modal" data-target="#EditarRedes"><i class="fa fa-pencil"></i> Editar</button>

                </div>

              </div>';
            }

             ?>                        
                      
           

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>

</div>



<div id="EditarGenerales" class="modal fade" role="dialog">
    
  <div class="modal-dialog">
    
    <div class="modal-content">
      
      <form role="form" method="post" enctype="multipart/form-data">

        <?php 

        $editarG = new InicioC();
        $editarG -> EditarGeneralesC();

         ?>
        
        
      </form>

    </div>

  </div>

</div>

<?php 

$actualizarG = new InicioC();
$actualizarG -> ActualizarGeneralesC();

 ?>

<div id="EditarContactos" class="modal fade" role="dialog">
    
  <div class="modal-dialog">
    
    <div class="modal-content">
      
      <form role="form" method="post">

        <?php 

        $editarC = new InicioC();
        $editarC -> EditarContactosC();

         ?>        

         <?php 

         $actualizarC = new InicioC();
         $actualizarC -> ActualizarContactosC();

          ?>
        
      </form>

    </div>

  </div>

</div>




<div id="EditarRedes" class="modal fade" role="dialog">
    
  <div class="modal-dialog">
    
    <div class="modal-content">
      
      <form role="form" method="post">
        
        <div class="modal-body">
          
          <div class="box-body">
            
            <div class="form-group">
              
              <h2>Ícono:</h2>

              <input type="text" class="form-control input-lg" id="iconoE" name="iconoE">

              <input type="hidden" id="Rid" name="Rid">

            </div>

            <div class="form-group">
              
              <h2>Url:</h2>

              <input type="text" class="form-control input-lg" id="urlE" name="urlE">

            </div>

          </div>

        </div>

        <div class="modal-footer">
          
          <button type="submit" class="btn btn-success">Guardar</button>

          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

        </div>

        <?php  

        $actualizarR = new InicioC();
        $actualizarR -> ActualizarRedesC();

        ?>

      </form>

    </div>

  </div>

</div>