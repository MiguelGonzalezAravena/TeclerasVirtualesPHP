<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class CrearPregunta extends CI_Controller{
	public function __construct() {
  		parent::__construct();
  		$this->load->model('Crearpregunta_model');

		}

		public function index(){
			$data['titulo'] = 'Crear Pregunta';
  		$this->load->template('crudpreguntas/crearpregunta_view', $data);
		}

		public function crearpa() {
			$data['titulo'] = 'Crear Pregunta Alternativa';
      $this->load->template('crudpreguntas/crearpregunta/alternativas', $data);
		}

    public function insertarPA() {
      $this->form_validation->set_rules('nombreP', 'Nombre pregunta', 'required');
      $this->form_validation->set_rules('respuestaCorrecta', 'Respuesta correcta', 'required');
      $this->form_validation->set_rules('explicacionr', 'Explicacion respuesta', 'required');
      if (!$this->form_validation->run()) {
        $data['titulo'] = 'Crear Pregunta Alternativa';
        $this->load->template('crudpreguntas/crearpregunta/alternativas', $data);
      } else {
        $this->Crearpregunta_model->set_preguntaA();
        redirect('crudpregunta/index');
      }
   }

  public function eliminarAlternativa() {
    $id = $this->uri->segment(3);

    if(empty($id)) {
      redirect('crudpregunta/index/1');
    }

    $this->Crearpregunta_model->delete_alternativa($id);
  }

}