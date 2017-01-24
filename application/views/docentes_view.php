<div class="container-fluid">
    <h1>Bienvenido, <?php echo $this->session->userdata('name'); ?></h1>
    <div class="panel panel-primary">
      <div class="panel-heading">Opciones de docente</div>
      <div class="panel-body">
        <p class="text-justify">
          Bienvenido al panel de docentes. A continuación se mostrarán las distintas opciones a las cuales puede acceder.
          <div class="text-center col-md-6">
            <a href="<?php echo base_url('docentes/mostrarAsignaturas'); ?>" class="col-md-12 btn btn-class btn-success">Mis asignaturas</a>
          </div>
          <div class="text-center col-md-6">
            <a href="<?php echo base_url('preguntas'); ?>" class="col-md-12 btn btn-class btn-info">Banco de preguntas</a></div>
        </p>
      </div>
    </div>
  </div>
