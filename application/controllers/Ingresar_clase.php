<?php
class Estudiantes extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('estudiantes_model');
    if($this->session->userdata('is_admin') == false) { // 1: Admin
      redirect(site_url('login'));
    }
  }

  public function index() {
    $data['titulo'] = 'Lista de estudiantes';
    $data['estudiantes'] = $this->estudiantes_model->get_users();
    
    $this->load->template('estudiantes/index', $data);
  }
  
  public function view() {
    $id = $this->uri->segment(3);
  
    if (empty($id)) {
      show_404();
    }
    
    $data['titulo'] = 'Ver estudiante';
    $data['estudiantes'] = $this->estudiantes_model->get_users($id);
  
    $this->load->template('estudiantes/view', $data);
  }
  
  public function create() {
    $data['titulo'] = 'Crear estudiante';

    $this->form_validation->set_rules('id', 'Identificador', 'required|is_unique[tv_estudiante.EST_ID]');
    $this->form_validation->set_rules('name', 'Nombre', 'required');
    $this->form_validation->set_rules('email', 'Correo electrónico', 'required|valid_email|is_unique[tv_estudiante.EST_CORREO]');
    $this->form_validation->set_rules('password', 'Contraseña', 'required');
    
    if (!$this->form_validation->run()) {
      $this->load->template('estudiantes/create', $data);
    } else {
      $this->estudiantes_model->set_users();
      redirect(base_url('estudiantes'));
    }
  }
  
  public function edit() {
    $id = $this->uri->segment(3);
  
    if (empty($id)) {
      show_404();
    }
    
    $data['titulo'] = 'Editar estudiante';
    $data['estudiantes'] = $this->estudiantes_model->get_users($id);
    $this->form_validation->set_rules('id', 'Identificador', 'required');
    $this->form_validation->set_rules('name', 'Nombre', 'required');
    $this->form_validation->set_rules('email', 'Correo electrónico', 'required');
    
    if (!$this->form_validation->run()) {
      $this->load->template('estudiantes/edit', $data);
    } else {
      $this->estudiantes_model->set_users($id);
      redirect(base_url('estudiantes'));
    }    
  }
  
  public function delete() {
    $id = $this->uri->segment(3);

    if(empty($id)) {
      redirect(base_url('estudiantes'));
    }

    $this->estudiantes_model->delete_user($id);
    redirect(base_url('estudiantes'));
  }

  public function ingresar_clase2() {
    $data['titulo'] = 'Panel de Estudiantes';
    $this->load->template('estudiantes_view',$data);
}
}