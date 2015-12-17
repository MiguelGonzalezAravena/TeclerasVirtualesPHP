<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class ME_controllers extends CI_Controller {
  public function __construct() {
    parent::__construct();
   $this->load->model('ME_model');
   $this->load->database('tecleras');
  }

 public function ver_estudiante(){
 		$datos= array('PM_ID'=> '1');//this->input->post('PM_ID');  esto es lo que deberia hacer uniendo el issue#10
 		$data = array(
 			'titulo' => 'Mostrar datos',//muestra nombre pestaña
			'arrPregunta'=> $this->ME_model->get_pregunta($datos),//obtiene los datos necesarios de la tabla maestra
			'arrDatos'=> $this->ME_model->get_datos_pregunta($datos),//obitne los datos necesarios de la tabla respuesta
			'fecha_inicio'=> $this->ME_model->get_datos_pregunta_fecha($datos),//obtiene la fecha de inicio de la pregunta
			'alternativas'=> $this->ME_model->get_datos_pregunta_alternativas($datos)//solo las alternativas
		);
 		$this->load->template('ME_vista',$data);
	}
 
 }
?>