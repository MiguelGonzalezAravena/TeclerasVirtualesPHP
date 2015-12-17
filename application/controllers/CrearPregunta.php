<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class CrearPregunta extends CI_Controller{
	public function __construct() {
  		parent::__construct();
  		$this->load->model('Crearpregunta_model');

		}

		public function index($paralelo){
			$data['titulo'] = 'Crear Pregunta';
      $paralelo = 1;
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

    public function insertarPA($paralelo) {
      $this->form_validation->set_rules('nombreP', 'Nombre pregunta', 'required');
      $this->form_validation->set_rules('respuestaCorrecta', 'Respuesta correcta', 'required');
      $this->form_validation->set_rules('explicacionr', 'Explicacion respuesta', 'required');
      if (!$this->form_validation->run()) {
        $data['titulo'] = 'Crear Pregunta Alternativa';
        $data['paralelo'] = $paralelo;
        $this->load->template('crudpreguntas/crearpregunta/alternativas', $data);
      } else {
        $this->Crearpregunta_model->set_preguntaA($paralelo);
        redirect(base_url('crudpregunta/index/' .$paralelo));
      }
   }

  public function eliminarAlternativa() {
    $id = $this->uri->segment(3);

    if(empty($id)) {
      redirect(base_url('crudpregunta/index/1'));
    }

    $this->Crearpregunta_model->delete_alternativa($id);
  }

}