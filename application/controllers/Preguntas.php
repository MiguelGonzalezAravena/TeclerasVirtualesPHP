<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Preguntas extends CI_Controller{
		public function __construct() {
      parent::__construct();
      $this->load->model('preguntas_model');
      if(!$this->session->userdata('id_user')) {
        redirect('/');
      }
    }

    public function crear($tipo = '') {
		  switch ($tipo) {
        case 'alternativa':
          $this->form_validation->set_rules('nombreP', 'Nombre pregunta', 'required');
          $this->form_validation->set_rules('respuestaCorrecta', 'Respuesta correcta', 'required');
          $this->form_validation->set_rules('explicacionr', 'Explicacion respuesta', 'required');

          if (!$this->form_validation->run()) {
            $data['titulo'] = 'Crear pregunta alternativa';
            $this->load->template('preguntas/crear_alternativas_view', $data);
          } else {
            $this->preguntas_model->set_preguntaAlternativa();
            redirect('preguntas');
          }

          break;
        default:
            $data['titulo'] = 'Crear pregunta';
            $this->load->template('preguntas/elegir_pregunta_view', $data);
          break;
      }
    }

  	public function index() {
      $data = array(
        'titulo' => 'Preguntas',
        'preguntas' => $this->preguntas_model->get_preguntas()
      );
      $this->load->template('preguntas/preguntas_view', $data);
    }	

    public function eliminar($idPregunta) {
      $this->preguntas_model->eliminar($idPregunta);
      redirect('preguntas');
     }

    public function editar($tipo, $id) {
      switch ($tipo) {
        default:
        case 'alternativa':
          $data['id'] = $id;
          $data['titulo'] = 'Editar pregunta';
          $data['titulo'] = 'Editar pregunta';
          $data['preguntaBD'] = $this->preguntas_model->get_pregunta($id);
          $data['respuestas'] = $this->preguntas_model->get_respuesta($id);
          $this->load->template('preguntas/editar_alternativa_view', $data);
          break;
      }
    }

    public function eliminarAlternativa($id = 0) {
      if($id == 0) {
        redirect('preguntas');
      }

      $this->pregunta_model->delete_alternativa($id);
    }

    public function editarAlternativa() {
        $this->form_validation->set_rules('nombreP', 'Nombre pregunta', 'required');
        $this->form_validation->set_rules('respuestaCorrecta', 'Respuesta correcta', 'required');
        $this->form_validation->set_rules('explicacionr', 'Explicación respuesta', 'required');

        if (!$this->form_validation->run()) {
          $id = $this->input->post('id');
          $data['titulo'] = 'Editar pregunta';
          $data['id'] = $id;
          $data['preguntaBD']= $this->peguntas_model->get_pregunta($id);
          $data['respuestaBD']= $this->preguntas_model->get_respuesta($id);
          $this->load->template('preguntas/editar_alternativa_view', $data);
        } else {
          $this->preguntas_model->update_alternativa($this->input->post('id'));
          redirect('preguntas');
        }
    }
}