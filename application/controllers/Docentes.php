<?php
class Docentes extends CI_Controller {
  var $i;
  public function __construct() {
    parent::__construct();
    $this->i = 0;
    
    $this->load->model('docentes_model');
    
  }

  public function index() {
    $data['titulo'] = 'Lista de docentes';
    $data['docentes'] = $this->docentes_model->get_users();
    
    $this->load->template('docentes/index', $data);
  }
  
  public function view() {
    $id = $this->uri->segment(3);
  
    if (empty($id)) {
      show_404();
    }
    
    $data['titulo'] = 'Ver docente';
    $data['docentes'] = $this->docentes_model->get_users($id);
  
    $this->load->template('docentes/view', $data);

  }
  
  public function create() {
    $data['titulo'] = 'Crear docente';

    $this->form_validation->set_rules('name', 'Nombre', 'required');
    $this->form_validation->set_rules('email', 'Correo electrónico', 'required|valid_email|is_unique[tv_docente.DOC_CORREO]');
    $this->form_validation->set_rules('password', 'Contraseña', 'required');
    
    if (!$this->form_validation->run()) {
      $this->load->template('docentes/create', $data);
    } else {
      $this->docentes_model->set_users();
      redirect(base_url('docentes'));
    }
  }
  
  public function edit() {
    $id = $this->uri->segment(3);
  
    if (empty($id)) {
      show_404();
    }
    
    $data['titulo'] = 'Editar docente';
    $data['docentes'] = $this->docentes_model->get_users($id);
    $this->form_validation->set_rules('id', 'Identificador', 'required');
    $this->form_validation->set_rules('name', 'Nombre', 'required');
    $this->form_validation->set_rules('email', 'Correo electrónico', 'required');
    
    if (!$this->form_validation->run()) {
      $this->load->template('docentes/edit', $data);
    } else {
      $this->docentes_model->set_users($id);
      redirect(base_url('docentes'));
    }    
  }
  
  public function delete() {
    $id = $this->uri->segment(3);

    if(empty($id)) {
      redirect(base_url('docentes'));
    }

    $this->docentes_model->delete_user($id);
    redirect(base_url('docentes'));
  }

  public function graficarPregunta() {
    $id = $this->uri->segment(3);
  
    if (empty($id)) {
      show_404();
    }
    
    $data['titulo'] = 'Graficar pregunta';
    $data['pregReal'] = $this->docentes_model->get_preguntasRealizadas($id);
    $data['pregunta'] = $this->docentes_model->get_textoPregunta($id);
  
    if(!$data['pregReal']) {
      redirect(base_url('crudpregunta/index/1'));
    }
    $this->load->template('docentes/graficarPregunta', $data);

  }

  public function crearClase(){
    $passwd = $this->uri->segment(3);
    $idAsignatura = $this->uri->segment(4);
    $idParalelo = $this->uri->segment(5);
    
    $this->docentes_model->crearClase($passwd, $idAsignatura, $idParalelo);
  }

  public function mostrarClase() {
    $id = $this->uri->segment(3);
    $data = array(
      "clase" => $this->docentes_model->get_clase($id),
    );

    if(!$data['clase']) {
      redirect(base_url('docentes/mostrarAsignatura'));
    }

    if(!$this->form_validation->run()) {
      $data['titulo'] = "Mostrar clase";
      $this->load->template('docentes/mostrarClase', $data);
    } else {
      $this->docentes_model->lanzarPregunta();
      redirect(base_url('docentes/mostrarClase'));
    }    

  }


  public function buscarPreguntas() {
    $data = array(
      "preguntas" => $this->docentes_model->verPreguntas()
    );
    // issue #14 v2
    $this->load->template('docentes/buscarPreguntas', $data);
  }

 public function ajaxbuscarPreguntas() {
    $data = array(
      "preguntas" => $this->docentes_model->ajaxbuscar_preguntas(),
      "clase" => $this->input->get('clase')
    );

     $this->load->view('docentes/ajaxbuscarPreguntas', $data);
  }

  public function lanzarPregunta() {
    $clase = $this->uri->segment(3);
    $pregunta = $this->uri->segment(4);

    $this->docentes_model->lanzarPregunta($clase, $pregunta);
  }

  public function terminarClase() {
    $clase = $this->uri->segment(3);

    $this->docentes_model->terminarClase($clase);
  }

  public function mostrarAsignatura() {

    $d=rand(2000000,300000000);
    
    $data = array(
      
      "asignatura" => $this->docentes_model->verAsignatura(),
      "pass"=>$d
    );

    if (!$this->form_validation->run()) {

      $data['titulo'] = 'Mostrar asignaturas';
      $this->load->template('docentes/mostrarAsignatura', $data);

    } else {
      $this->load->template('docentes/mostrarPreguntas');
      
    }    
  }



  public function mostrarPreguntas(){
    
    
      $data = array(
        "preguntas" => $this->docentes_model->verPreguntas()
        
      );

      if (!$this->form_validation->run()) {
        $this->load->template('docentes/mostrarPreguntas', $data);
        

      } else {
        $this->docentes_model->set_users($id);
        redirect(base_url('docentes'));
      }    
  }
  
  public function mostrarPreguntaSeleccionada(){
    
    $data = array(

      "preguntaSeleccionada" => $this->docentes_model->verPreguntasSeleccionadas()
    );

    if (!$this->form_validation->run()) {
      $this->load->template('docentes/mostrarPreguntaSeleccionada', $data);
    } else {
      $this->docentes_model->set_users($id);
      redirect(base_url('docentes'));
    }    
  }

  public function insertarTiempoFinal(){
    
    $tiempoFinal = $this->input->post('tiempoFinal');
    echo($tiempoFinal);
    $this->docentes_model->insertarTiempoFinal($tiempoFinal);

  }
  
}
