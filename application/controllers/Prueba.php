<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Prueba extends CI_Controller {
  public function __construct() {
    parent::__construct();
   $this->load->model('prueba_model');
   $this->load->database('tecleras');
  }

 public function ver(){
 		$datos= array('PM_ID'=> '1');//this->input->post('PM_ID');  esto es lo que deberia hacer uniendo el issue#10
 		$data = array(
 			'titulo' => 'Mostrar datos',//muestra nombre pestaña
			'arrPregunta'=> $this->prueba_model->get_pregunta($datos),//obtiene los datos necesarios de la tabla maestra
			'arrDatos'=> $this->prueba_model->get_datos_pregunta($datos)//obitne los datos necesarios de la tabla respuesta
				);
 		$this->load->template('prueba_vista',$data);
	}
 
 }
?>