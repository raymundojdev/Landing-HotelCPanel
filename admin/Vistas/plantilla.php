<?php 
//Para  que inicie la sesion utilizaremos session_start 
  session_start();
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administración</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="Vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="Vistas/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="Vistas/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="Vistas/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="Vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="Vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="Vistas/css/estilos.css">
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="Vistas/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="Vistas/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<!--Pegar el login-page en la clase del body para que no de errores-->
<body class="hold-transition skin-blue sidebar-mini login-page">

 <?php 

 //Crearemos una nueva condicion si la variable $_SESSION["Ingreso"] y la variable $_SESSION[""]  si se cumplira lo demas

if (isset($_SESSION["Ingreso"]) && $_SESSION["Ingreso"] ==true) {
  
  //Se integrara este wrapper para que no de error al ingresar ya que lo pide en cabecera.php e ingreeso.php
  echo '<div class="wrapper">';

  include "modulos/cabecera.php";

 include "modulos/menu.php"; 

// se hara una condicion si la variable $_GET["url"] viene con informacion se hara otra condicion
 if(isset($_GET["url"])){

  //si  la variable $_GET["url"] es igual a inicio 
  if ($_GET["url"] == "inicio" || $_GET["url"] == "ingreso" || $_GET["url"] == "usuarios" || $_GET["url"] == "salir"|| $_GET["url"] == "perfil" || $_GET["url"] == "slide" || $_GET["url"] == "nosotros" || $_GET["url"] == "servicios" || $_GET["url"] == "galeria" || $_GET["url"] == "hsimple" || $_GET["url"] == "mensajes" || $_GET["url"] == "suscriptores") {
    
    //si se cumple solo agrega la url amigable y se concatena co .php 
    include "modulos/".$_GET["url"].".php";
  }

  }else{

    //si no y agregan mas en la url automaticamente lo envia al inicio
    include "modulos/inicio.php";
 }
 //Aqui cierra el div de la clase wrapper
 echo '</div>';

}else{

  // Si la variable de session no se cumple Con este include nos llevara al modulo Ingreso
  include "modulos/ingreso.php";
} 

  ?>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="Vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="Vistas/bower_components/raphael/raphael.min.js"></script>
<script src="Vistas/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="Vistas/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="Vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="Vistas/bower_components/moment/min/moment.min.js"></script>
<script src="Vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="Vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="Vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="Vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="Vistas/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="Vistas/dist/js/demo.js"></script>

<!--inicio de archivos js-->
<script src="Vistas/js/usuarios.js"></script>
<!-- traer datos al formulario para editar js -->
<script src="Vistas/js/slide.js"></script>
<!-- Mostrar datos de servicios -->
<script src="Vistas/js/servicios.js"></script>
<!-- Eliminar galeria -->
<script src="Vistas/js/galeria.js"></script>
<!-- Responder mensajes -->
<script src="Vistas/js/mensajes.js"></script>
<!-- REDES -->
<script src="Vistas/js/redes.js"></script>
</body>
</html>
