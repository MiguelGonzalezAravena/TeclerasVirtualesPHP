<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Cambiar <?php echo anchor(base_url() . 'login/logout_ci', 'Cerrar sesión'); ?>
 */
?><html>
  <head>
    <title><?php echo $titulo; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Dependencias css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-datetimepicker.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
    <!-- Dependencias js -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datetimepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('vendor/bootbox.js/bootbox.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/Chart.min.js'); ?>"></script>
    <!-- Código general -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/codes.js'); ?>"></script>
  </head>
  <body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url(); ?>">Tecleras Virtuales</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="<?php echo site_url(); ?>">Inicio</a></li>
        <?php if($this->session->userdata('is_admin')) { ?>
          <li><?php echo anchor(base_url('estudiantes'), 'Estudiantes'); ?></li>
          <li><?php echo anchor(base_url('docentes'), 'Docentes'); ?></li>
          <li><?php echo anchor(base_url('asignaturas'), 'Asignaturas'); ?></li>
        <?php } ?>
        <?php if($this->session->userdata('profile') == 1 && !$this->session->userdata('is_admin')): ?>
          <li><?php echo anchor(base_url('docentes/mostrarAsignaturas'), 'Asignaturas'); ?></li>
          <li><?php echo anchor(base_url('crudpregunta/index/1'), 'Preguntas'); ?></li>

        <?php endif; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <?php echo anchor(base_url(($this->session->userdata('is_logued_in') == true ? 'login/logout_ci' : 'login')), ($this->session->userdata('is_logued_in') == true ? 'Cerrar sesión' : 'Acceder')); ?>
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div class="container">