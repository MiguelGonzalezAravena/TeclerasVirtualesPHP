<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$id = array('name' => 'id', 'type' => 'number', 'placeholder' => 'Identificador', 'class' => 'form-control', 'value' => (isset($_POST['id'])) ? $_POST['id'] : '');
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
        echo form_open('cursos/create', array('autocomplete' => 'off'));
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
  
