<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  $password = array('name' => 'password', 'placeholder' => 'Introduce contraseña de la clase', 'class' => 'form-control');
  $submit = array('name' => 'submit', 'value' => 'Ingresar a la clase', 'title' => 'Iniciar sesión', 'class' => 'btn btn-warning');
?>
<div class="container-fluid">
  <h1>Bienvenido, <?php echo $this->session->userdata('name'); ?></h1>
  <?php
    if(isset($error) && $error):
  ?>
    <div class="alert alert-danger" role="alert">La contraseña introducida no es válida. Por favor intente nuevamente.</div>
  <?php
    endif;
  ?>
  <div class="panel panel-warning">
    <div class="panel-heading">Ingresar a la clase</div>
    <div class="panel-body">
    	<?php echo form_open('estudiantes/ingresarClase'); ?>
    	<div class="form-group">
        <?php
          echo form_password($password);
        ?>
  		</div>
  		<div class="form-group">
        <?php
          echo form_submit($submit);
        ?>
  		</div>
  	</div>
	</div>
</div>