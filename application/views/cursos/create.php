<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$asignatura2 = array('name' => 'asignatura', 'type' => 'number', 'placeholder' => 'Asignatura', 'class' => 'form-control', 'value' => (isset($_POST['asignatura'])) ? $_POST['asignatura'] : $asignatura);
$paralelo = array('name' => 'paralelo', 'type' => 'number', 'placeholder' => 'Número', 'class' => 'form-control', 'value' => (isset($_POST['paralelo'])) ? $_POST['paralelo'] : '');

$submit = array('type' => 'submit', 'content' => 'Crear', 'class' => 'btn btn-success');
?>


<div class="row">
   <h2>Creación de cursos</h2>
     <?php 
    echo validation_errors();
  ?>
   <div class="panel panel-default">
    <div class="panel-body">
      <?php
        echo form_open('cursos/create/' . $asignatura, array('autocomplete' => 'off'));
      ?>
         <div class="form-group">
 
           <?php
          /*
           * Asignatura 
          */
          echo form_label('Asignatura', 'asignatura');
          echo form_input($asignatura2);
          ?>
        </div>
         <div class="form-group">
 
           <?php
          /*
           * Paralelo 
          */
          echo form_label('Paralelo', 'paralelo');
          echo form_input($paralelo);
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
  
