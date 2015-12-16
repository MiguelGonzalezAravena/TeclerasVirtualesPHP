<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

	class crudpregunta extends CI_Controller{
		public function __construct() {
    		parent::__construct();
        $this->load->model('crudpregunta_model');
  		}

  	public function index($paralelo){
        $data['titulo'] = 'Preguntas';
        $data['paralelo']= $paralelo;
        $data['preguntas'] = $this->crudpregunta_model->optenerPreguntas($paralelo);
        $this->load->template('crudpreguntas_view', $data);
    }	

    public function eliminarPregunta($idPregunta , $paralelo){
        $this->crudpregunta_model->eliminar($idPregunta);   
        $this->index($paralelo);
     }

    public function getPregunta($id, $tipo, $paralelo){
      if($tipo == 1){
        $data['id'] = $id;
        $data['paralelo'] = $paralelo;
        $data['preguntaBD']= $this->crudpregunta_model->optenerPregunta($id);
        $data['respuestaBD']= $this->crudpregunta_model->optenerRespuesta($id);
        $this->load->template('crudpreguntas/editar/alternativa', $data);
      }
    }

    public function editarAlternativa($paralelo){
        $this->form_validation->set_rules('nombreP', 'nombre pregunta', 'required');
        $this->form_validation->set_rules('respuesta1', 'respuesta 1', 'required');
        $this->form_validation->set_rules('respuesta2', 'respuesta 2', 'required');
        $this->form_validation->set_rules('respuesta3', 'respuesta 3', 'required');
        $this->form_validation->set_rules('respuestaCorrecta', 'respuesta Correcta', 'required');
        $this->form_validation->set_rules('explicacionr', 'explicacion respuesta', 'required');

        if ($this->form_validation->run() == FALSE){
          $data['titulo'] = 'Editar Pregunta';
          $data['paralelo'] = $paralelo;
          $id = $this->input->post('id');
          $data['id'] = $id;
          $data['preguntaBD']= $this->crudpregunta_model->optenerPregunta($id);
          $data['respuestaBD']= $this->crudpregunta_model->optenerRespuesta($id);
          $this->load->template('crudpreguntas/editar/alternativa', $data);
        }
        else{
          $this->crudpregunta_model->upDatePpreguntaA($this->input->post('id'));
          redirect(base_url('crudpregunta/index/' .$paralelo .''));
        }
    }
}