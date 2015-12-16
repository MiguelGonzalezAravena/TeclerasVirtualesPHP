<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Inputs */
$id = array('name' => 'id', 'type' => 'number', 'placeholder' => 'Identificador', 'class' => 'form-control', 'value' => (isset($_POST['id'])) ? $_POST['id'] : '');
$code = array('name' => 'code', 'type' => 'text', 'placeholder' => 'Código de asignatura', 'class' => 'form-control', 'value' => (isset($_POST['email'])) ? $_POST['email'] : '');
$name = array('name' => 'name', 'placeholder' => 'Nombre de asignatura', 'class' => 'form-control', 'value' => (isset($_POST['name'])) ? $_POST['name'] : '');
$submit = array('type' => 'submit', 'content' => 'Crear', 'class' => 'btn btn-success');

?>
<div class="row">
  <h2>Crear asignatura</h2>
  <?php 
    echo validation_errors();
  ?>
  <div class="panel panel-default">
    <div class="panel-body">
      <?php
        echo form_open('asignaturas/create', array('autocomplete' => 'off'));
      ?>
      <div class="form-group">
        <?php
        /*
         * Identificador 
         */
        echo form_label('ID', 'id');
        echo form_input($id);
        ?>
      </div>
      <div class="form-group">
        <?php
        /*
         * Código de asignatura
         */
        echo form_label('Código', 'code');
        echo form_input($code);
        ?>
      </div>
      <div class="form-group">
        <?php
        /*
         * Nombre de asignatura
         */
        echo form_label('Nombre', 'name');
        echo form_input($name);
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
