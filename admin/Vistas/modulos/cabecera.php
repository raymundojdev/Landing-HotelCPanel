    <!--Este es la cabezera de el diseño de la pagina-->

 <header class="main-header">
    <!-- Logo -->
    <a href="inicio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>HZ</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>HOTEL ZONE</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <?php 
              //Se realizara una condicion si la variable $_SESSION["foto"] viene vacio se le asignara una foto 

              if ($_SESSION["foto"] == "") {
                
                echo '<img src="Vistas/img/usuarios/defecto.png" class="user-image" alt="User Image">';  
              }else{
                //Si la condicion no se cumple y la variable sesion trae informacion de una foto entonces concatenamos la variable $_SESSION en el src de la imagen y traer la imagen de la bd
                echo '<img src="'.$_SESSION["foto"].'" class="user-image" alt="User Image">';
              }
              
               ?>             

               <!--Concatenamos la variable de $_SESSION["usuario"] dentro de un echo y muestre el nombre del usuario en el span de la cabecera-->
              <span class="hidden-xs"><?php echo $_SESSION["usuario"]; ?></span>
            </a>
            <ul class="dropdown-menu">
             
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="perfil" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="salir" class="btn btn-danger btn-flat">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>