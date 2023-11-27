<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cleo Green | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="Views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Views/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="Views/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Views/dist/css/AdminLTE.css">
  <link rel="stylesheet" href="Views/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="Views/assets/style/formStyle.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="Views/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  <link rel="icon" href="assets/img/LogosAdvisor/logo-light.png">
    <!-- Plugins de javascript -->

    <!-- jQuery 3 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="Views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="Views/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="Views/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="Views/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="Views/dist/js/demo.js"></script>
    <!-- CK Editor -->
    <script src="Views/bower_components/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="Views/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>



<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
<!-- Site wrapper -->
  <!-- =============================================== -->

    <?php 

      //     if(isset($_SESSION["iniciarSesion"])&& $_SESSION["iniciarSesion"] == "ok"){

      //     echo '<div class="wrapper">';

      //     include "Pages/Modulos/header.php"; 
      //     include "Pages/Modulos/menu.php";
      //     if(isset($_GET["ruta"])){
      // if ($_GET["ruta"]=="inicio" ||
      //     $_GET["ruta"]=="clientes"||
      //     $_GET["ruta"]=="subscriptores"||
      //     $_GET["ruta"]=="formularios"||
      //     $_GET["ruta"]=="post"||  
      //     $_GET["ruta"]=="ver"|| 
      //     $_GET["ruta"]=="informacion"||
      //     $_GET["ruta"]=="login"||   
      //     $_GET["ruta"]=="comentarios"||  
      //     $_GET["ruta"]=="newsletter"||   
      //     $_GET["ruta"]=="editar" ||
      //     $_GET["ruta"]=="infoSitio" ||
      //     $_GET["ruta"]=="infoServicios" ||
      //     $_GET["ruta"]=="agregarServicio" ||
      //     $_GET["ruta"]=="borrarServicio"||
      //     $_GET["ruta"]=="logout" // Agrega esta línea
    //       ){
    //     include "Pages/".$_GET["ruta"].".php";
    //   }else{
    //     include 'Pages/404.php';
    //   }    
    //  }else{
    //   include 'Pages/inicio.php';
    // }
    // include "Pages/Modulos/shared/footer.php"; 
    
    // echo '</div>';
    // } else {
    //   include "Pages/login.php";
    //   }?>

<script src="Views/js/plantilla.js"></script>

</body>
</html>
