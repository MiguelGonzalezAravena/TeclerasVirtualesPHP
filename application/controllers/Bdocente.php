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

		//echo "sadsadsadsadasdasd";

		//$this->form_validation->set_rules('fecha','fecha','required|trim');
		$this->form_validation->set_rules('date','Date','required|trim');
		$this->form_validation->set_rules('arrPregunta','arrPregunta','required|trim');
		
		$this->form_validation->set_message('required','El campo %s Es Obligatorio');
		
		if ($this->form_validation->run() == FALSE){
			
			$this->load->template('busquedas/bdocente_view', $datos);	
		
		}
		else
		{
			
			$this->load->template('busquedas/bdocente_view', $datos);
	
			echo 'OK';



			//echo "Totos los datos estan ok: ".$this->input->post('nombre');
			//$this->load->view('formsuccess');
		}
	}



}
?>