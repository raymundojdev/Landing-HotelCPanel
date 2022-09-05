<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Hotel Zone</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingreso al gestor de contenido</p>

    <!--Variables de inicio de sesión-->

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="usuario-Ing">

        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>
      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Contraseña" name="clave-Ing">

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        <!--Fin de variables de sesión-->

      </div>

      <div class="row">
        
        <!-- /.Boton de Inicio de sesión -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
       <!-- /.Boton de Inicio de sesion FIN-->

       <?php 
       //clase UsuariosC
       $ingreso = new UsuariosC();
       //LLamar la funcion IngresoUsuariosC
       $ingreso -> IngresoUsuariosC();

        ?>
    </form>
     

  </div>
  <!-- /.login-box-body -->
</div>
