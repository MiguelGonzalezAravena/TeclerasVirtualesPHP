<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Inputs */
$name = array('name' => 'name', 'placeholder' => 'Nombre de usuario', 'class' => 'form-control', 'value' => $estudiantes['EST_NOMBRE']);
$email = array('name' => 'email', 'type' => 'email', 'placeholder' => 'Correo electrónico', 'class' => 'form-control', 'value' => $estudiantes['EST_CORREO']);

$submit = array('type' => 'submit', 'content' => 'Editar', 'class' => 'btn btn-success');

?>
<div class="row">
  <h2>Editar estudiante</h2>
  <?php 
    echo validation_errors();
  ?>
  <div class="panel panel-default">
    <div class="panel-body">
      <?php
        echo form_open('estudiantes/edit/' . $estudiantes['EST_ID']);
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
