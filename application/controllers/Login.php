<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('login_model');
    $this->load->database('default');
  }
  
  public function index() {
    if($this->session->userdata('is_admin')) {
      $data['titulo'] = 'Panel de administración';
        $this->load->template('admin_view', $data);
    } else {
      switch ($this->session->userdata('profile')) {
        case 1: // Docente
          $data['titulo'] = 'Panel de Docentes';
          $this->load->template('docentes_view', $data);
          break;
        case 2: // Estudiante
          $data['titulo'] = 'Panel de Estudiantes';
          $data['error'] = false;
          $this->load->template('estudiantes_view', $data);
          break;
        case '':
        default:
          $data['token'] = $this->token();
          $data['titulo'] = 'Acceso al sistema';
          $this->load->template('login_view', $data);
          break;
      }
    }
  }

  public function new_user() {
    if($this->input->post('token')
      && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
      $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]|max_length[150]|xss_clean');

      /*
       * Lanzar mensaje de error si es que hay
       */
            
      if($this->form_validation->run() == false) {
        $this->index();
      } else {
        $username = $this->input->post('username');
        $password = sha1($this->input->post('password'));
        $profile = $this->input->post('profile');

        $check_user = $this->login_model->login_user($username, $password, $profile);
        if($check_user == true) {
          $data = array(
            'is_logued_in'  =>  true,
            'is_admin'      =>  (isset($check_user->ADM_ID) ? true : false),
            'id_user'       =>  (isset($check_user->DOC_ID) ? $check_user->DOC_ID : (isset($check_user->EST_ID) ? $check_user->EST_ID : '')),
            'profile'       =>  $profile,
            'name'          =>  (isset($check_user->DOC_NOMBRE) ? $check_user->DOC_NOMBRE : (isset($check_user->EST_NOMBRE) ? $check_user->EST_NOMBRE : '')),
          );    
          $this->session->set_userdata($data);
          $this->index();
        }
      }
    } else {
      redirect(site_url('login'));
    }
  }
  
  public function token() {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }
  
  public function logout_ci() {
    $this->session->set_userdata(array('is_logued_in' => false));
    $this->session->sess_destroy();
    redirect(site_url());
  }
}
?>
