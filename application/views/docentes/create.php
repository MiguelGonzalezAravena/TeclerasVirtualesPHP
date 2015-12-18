<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Inputs */
$name = array('name' => 'name', 'placeholder' => 'Nombre de usuario', 'class' => 'form-control', 'value' => (isset($_POST['name'])) ? $_POST['name'] : '');
$email = array('name' => 'email', 'type' => 'email', 'placeholder' => 'Nombre de usuario', 'class' => 'form-control', 'value' => (isset($_POST['email'])) ? $_POST['email'] : '');
$password = array('name' => 'password', 'placeholder' => 'Contraseña', 'class' => 'form-control', 'value' => (isset($_POST['password'])) ? $_POST['password'] : '');
$profile = array(
    '' => 'Seleccionar perfil'
  ,  1 => 'Administrador'
  , 2 => 'Usuario normal'
  );
$submit = array('type' => 'submit', 'content' => 'Crear', 'class' => 'btn btn-success');

?>
<div class="row">
  <h2>Crear docente</h2>
  <?php 
    echo validation_errors();
  ?>
  <div class="panel panel-default">
    <div class="panel-body">
      <?php
        echo form_open('docentes/create', array('autocomplete' => 'off'));
      ?>
      <div class="form-group">
        <?php
        /*
         * Nombre 
         */
        echo form_label('Nombre', 'name');
        echo form_input($name);
        ?>
      </div>
      <div class="form-group">
        <?php
        /*
         * Correo electrónico
         */
        echo form_label('Correo electrónico', 'email');
        echo form_input($email);
        ?>
      </div>
      <div class="form-group">
        <?php
        /*
         * Contraseña
         */
        echo form_label('Contraseña', 'password');
        echo form_password($password);
        ?>
      </div>
      <div class="form-group">
        <?php
        /*
         * Boton crear
         */
        echo form_button($submit);
        ?>
        </div>
    <?php
    echo form_close();
    ?>
    </div>
  </div>
</div>
