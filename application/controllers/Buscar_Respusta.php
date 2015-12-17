<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador1 extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
	}

	function index(){
		$this->load->view('Buscar_Respuesta_vista.php');
	}

	function validar(){
		$this->form_validation->set_rules('Seleccione pregunta','required|trim');
		$this->form_validation->set_rules('date','date','callback_checkDateFormat');

		
		$this->form_validation->set_message('required','El campo %s Es Obligatorio');
		
		if ($this->form_validation->run() == FALSE){
			//echo "<script de tipo="text/javascript">alerta('Por favor ingrese los valores correctos dd/mm/aaaa Format');</script>" 
			$this->formulario('Buscar_Respuesta_vista');
		
		}
		else
		{
			//echo "Totos los datos estan ok: ".$this->input->post('nombre');
			
	}

}
?>