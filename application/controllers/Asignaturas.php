<?php
class Asignaturas extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('asignaturas_model');
    if($this->session->userdata('is_admin') == false) { // 1: Admin
      redirect(site_url('login'));
    }
  }

  public function index() {
    $data['titulo'] = 'Lista de asignaturas';
    $data['asignaturas'] = $this->asignaturas_model->get_asignaturas();
    
    $this->load->template('asignaturas/index', $data);
  }
  
  public function view() {
    $id = $this->uri->segment(3);
  
    if (empty($id)) {
      show_404();
    }
    
    $data['titulo'] = 'Ver asignatura';
    $data['asignaturas'] = $this->asignaturas_model->get_asignaturas($id);
  
    $this->load->template('asignaturas/view', $data);
  }
  
  public function create() {
    $data['titulo'] = 'Crear asignatura';

    $this->form_validation->set_rules('id', 'Identificador', 'required|is_unique[tv_asignatura.ASI_ID]');
    $this->form_validation->set_rules('name', 'Nombre de asignatura', 'required');
    $this->form_validation->set_rules('code', 'Código de asignatura', 'required');
    
    if (!$this->form_validation->run()) {
      $this->load->template('asignaturas/create', $data);
    } else {
      $this->asignaturas_model->set_asignaturas();
      redirect(base_url('asignaturas'));
    }
  }
  
  public function edit() {
    $id = $this->uri->segment(3);
  
    if (empty($id)) {
      show_404();
    }
    
    $data['titulo'] = 'Editar asignatura';
    $data['asignaturas'] = $this->asignaturas_model->get_asignaturas($id);
    $this->form_validation->set_rules('id', 'Identificador', 'required');
    $this->form_validation->set_rules('name', 'Nombre de asignatura', 'required');
    $this->form_validation->set_rules('code', 'Código de asignatura', 'required');
    
    if (!$this->form_validation->run()) {
      $this->load->template('asignaturas/edit', $data);
    } else {
      $this->asignaturas_model->set_asignaturas($id);
      redirect(base_url('asignaturas'));
    }    
  }
  
  public function delete() {
    $id = $this->uri->segment(3);

    if(empty($id)) {
      redirect(base_url('asignaturas'));
    }

    $this->asignaturas_model->delete_asignatura($id);
    redirect(base_url('asignaturas'));
  }
  
}
