<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

	class CrearPregunta extends CI_Controller{
		public function __construct() {
    		parent::__construct();
    		$this->load->model('Crearpregunta_model');

  		}

  		public function index($paralelo){
  			$data['titulo'] = 'Crear Pregunta';
        $data['paralelo'] = $paralelo;
    		$this->load->template('crudpreguntas/crearpregunta_view', $data);
  		}

  		public function crearpa($paralelo)
  		{
        $data['paralelo'] = $paralelo;
  			$data['titulo'] = 'Crear Pregunta Alternativa';
        $data['id_paralelo'] = $this->Crearpregunta_model->optenerParalelo();
     		$this->load->template('crudpreguntas/crearpregunta/alternativas', $data);
  		}

      public function insertarPA($paralelo){
        $this->form_validation->set_rules('nombreP', 'nombre pregunta', 'required');
        $this->form_validation->set_rules('respuesta1', 'respuesta 1', 'required');
        $this->form_validation->set_rules('respuesta2', 'respuesta 2', 'required');
        $this->form_validation->set_rules('respuesta3', 'respuesta 2', 'required');
        $this->form_validation->set_rules('respuestaCorrecta', 'respuesta Correcta', 'required');
        $this->form_validation->set_rules('explicacionr', 'explicacion respuesta', 'required');

        if ($this->form_validation->run() == FALSE)
        {
          $data['titulo'] = 'Crear Pregunta Alternativa';
          $data['paralelo'] = $paralelo;
          $this->load->template('crudpreguntas/crearpregunta/alternativas', $data);
        }
        else
        {
          $this->Crearpregunta_model->set_preguntaA($paralelo);
          redirect(base_url('CrearPregunta/index/' .$paralelo .''));
        }
     }

}