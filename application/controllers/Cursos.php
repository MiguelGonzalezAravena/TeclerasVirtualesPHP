<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Cursos extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
      $this->load->model('cursos_model');
  }
  
  public function index() {
  /*  if($this->session->userdata('profile') == false ||
      $this->session->userdata('profile') != 1) { // 1: Admin
      redirect(site_url('login'));
    }*/
    $data['titulo'] = 'Lista de cursos';
    $data['docentes'] = $this->cursos_model->get_cursos();
    $this->load->template('curso_view', $data);
  }


  public function create() {
    $data['titulo'] = 'Crear curso';
    $this->form_validation->set_rules('id', 'Identificador', 'required|is_unique[tv_paralelo.PAR_ID]');
    $this->form_validation->set_rules('paralelo', 'Paralelo', 'required|integer');
    /*$this->form_validation->set_rules('email', 'Correo electrónico', 'required|valid_email|is_unique[tv_docente.DOC_CORREO]');
    $this->form_validation->set_rules('password', 'Contraseña', 'required');
    */

    if (!$this->form_validation->run()) {
      $this->load->template('cursos/create', $data);
   } else {
     $this->cursos_model->set_cursos();
      redirect(base_url('cursos'));
   }
  }

}
