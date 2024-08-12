
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>ADMIN FEDEX</title>
  <!-- loader-->
  <!-- <link href="<?php echo base_url(); ?>/plantilla2/assets/css/pace.min.css" rel="stylesheet"/> -->
  <script src="<?php echo base_url(); ?>/plantilla2/assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="<?php echo base_url(); ?>/plantilla2/assets/images/favicon.ico" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="<?php echo base_url(); ?>/plantilla2/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="<?php echo base_url(); ?>/plantilla2/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>/plantilla2/assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="<?php echo base_url(); ?>/plantilla2/assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="<?php echo base_url(); ?>/plantilla2/assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="<?php echo base_url(); ?>/plantilla2/assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="<?php echo base_url(); ?>/plantilla2/assets/css/app-style.css" rel="stylesheet"/>

                          <!-- NUESTRAS LIBRERIAS -->
  <!-- ICONONS DE BOOSTRAP FUNCIONA PARA CUALQUIER VERSION (UNIVERSAL) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

   <!-- IMPORTACION DE API KEY DE GOOGLE MAPS -->
   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcLcLBEAz0-5WQAt9Njj5kFlYuj-NUoSA&libraries=places&callback=initMap"></script>

   <!-- Importacion de jquery framwork JS para programar de forma mas elegante -->
   <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>


   <!-- JQUERY VALIDATE IMPORTATNE -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- End custom js for this page -->


  <!-- End custom js for this page -->
    <script type="text/javascript">
          jQuery.validator.addMethod("letras", function(value, element) {
            //return this.optional(element) || /^[a-z]+$/i.test(value);
            return this.optional(element) || /^[A-Za-zÁÉÍÑÓÚáéíñóú ]*$/.test(value);

          }, "Este campo solo acepta letras");
    </script>

    <!-- CND MENSAJE FLOTANTES -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- tag para archivo Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-theme bg-theme1">

<!-- Start wrapper-->
 <div id="wrapper">

  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="<?php echo site_url('inicio/index'); ?>">
       <img src="<?php echo base_url('') ?>/plantilla2/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">MENU Admin</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">BARRA DE NAVEGACION</li>
      <li>
        <a href="<?php echo site_url('inicio/index'); ?>">
          <i class="zmdi zmdi-view-dashboard"></i> <span>INICIO</span>
        </a>
      </li>
      <li class="sidebar-header">SUCURSALES</li>

      <li>
        <a href="<?php echo site_url('sucursales/nuevo'); ?>">
          <i class="bi bi-house-add"></i> <span>Nuevo</span>
        </a>
      </li>

      <li>
        <a href="<?php echo site_url('sucursales/listado'); ?>">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Listado</span>
        </a>
      </li>
      <li class="sidebar-header">CLIENTES</li>

      <li>
        <a href="<?php echo site_url('clientes/nuevo'); ?>">
          <i class="bi bi-person-add"></i> <span>Nuevo</span>
        </a>
      </li>

      <li>
        <a href="<?php echo site_url('clientes/listado'); ?>">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Listado</span>

        </a>
      </li>
      <li class="sidebar-header">ENVÍOS</li>

      <li>
        <a href="<?php echo site_url('Envios/listado'); ?>">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Listado</span>
        </a>
      </li>



      <li class="sidebar-header">REPORTES</li>
      <li><a href="<?php echo site_url('reportes/sucursalesR'); ?>"><i class="bi bi-geo" style="color:#F782FF"></i><span>Sucursales</span></a></li>
      <li><a href="<?php echo site_url('reportes/clientesR'); ?>"><i class="bi bi-geo text-danger"></i> <span>Clientes</span></a></li>
      <li><a href="<?php echo site_url('reportes/enviosR'); ?>"><i class="bi bi-geo text-warning"></i><span>Envíos</span></a></li>

    </ul>

   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>

  </ul>



    <ul class="nav navbar-nav navbar-right">
    <!-- <li><a href="#">ADMIN</a></li> -->
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ADMIN <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="<?php echo site_url('seguridad/logout'); ?>">SALIR</a></li>
      </ul>
    </li>
  </ul>
  </ul>
</nav>
</header>
<!--End topbar header-->
