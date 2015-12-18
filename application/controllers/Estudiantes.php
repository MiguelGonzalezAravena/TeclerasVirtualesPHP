<?php
class Estudiantes extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('estudiantes_model');
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

  public function responderPreguntas() {
    $this->form_validation->set_rules('respuesta', 'Respuesta', 'required');
    $pregunta = $this->uri->segment(4);
    $clase = $this->uri->segment(3);
    $data = array(
      "preguntaSeleccionada" => $this->estudiantes_model->verPreguntaResponder($clase, $pregunta),
      "respuestas" => $this->estudiantes_model->get_respuestas($pregunta),
      "id_user" => $this->session->userdata('user_id'),
      "fueRespondida" => $this->estudiantes_model->fueRespondida($pregunta),
      "pregunta" => $pregunta,
      "clase" => $clase
    );

    if (!$this->form_validation->run()) {
      $data['titulo'] = 'Responder pregunta';
      $this->load->template('estudiantes/responderPreguntas', $data);
    } else {
      $this->estudiantes_model->insertarRespuesta();
      redirect(base_url('estudiantes/vista_clase/' . $this->input->post('clase')));
    }    
  }

  public function fueRespondida($id) {

  }
  
  public function ingresarClase() {
    

    /**
     * form_validation es un validador del formulario que enviaste
     * El primer parámetro es el nombre del campo que enviaste desde el formulario
     * El segundo es una descripción del campo, generalmente es el mismo nombre que colocaste en el formulario
     * El tercero son las restricciones del campo, es requerido, ya que no puede ir vacío, ya que es necesario para poder entrar a una clase.
     */
    $this->form_validation->set_rules('password', 'Contraseña', 'required');
    
    if (!$this->form_validation->run()) {
      $data['titulo'] = 'Ingresar a clase';
      $data['error'] = false;
      if($this->input->get('fail') == 1) {
        $data['error'] = true;
      }
      /**
       * Si el formulario no ha sido cargado aún, carga la vista
       */
      $this->load->template('estudiantes_view', $data);
    } else {
      /**
       * En caso contrario, envía el formulario con los datos
       */
      $password = $this->input->post('password');
      $check_user = $this->estudiantes_model->ingresarClase($password);
      if(check_user==true)
      $this->estudiantes_model->ingresarClase($password);
      //redirect(base_url('estudiantes/claseAlgo'));
    }
  }

  public function vista_clase($clase) {
    $data['titulo'] = 'Ingresar a clase';
    $data['clase'] = $clase;
    $this->load->template('estudiantes/vista_clase',$data);
  }
}
