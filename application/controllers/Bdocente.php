<?php
class Bdocente extends CI_Controller {

	public function __construct() {
    parent::__construct();
    
    $this->load->model('bdocente_model');
    $this->load->database('tecleras');
    $this->load->helper('form');
    }
  

	public function index(){
		/* Pruebas
		echo 'Hello World!';		
		$this->load->view('bdocente_view', $datos);
		$this->load->template('bdocente_view', $datos);
		*/
		$datos['arrPregunta'] = $this->bdocente_model->get_pregunta();
		$this->load->template('busquedas/bdocente_view', $datos);		
	}


	public function validar(){


		$this->form_validation->set_rules();
		$this->form_validation->set_rules();



	}



}
?>