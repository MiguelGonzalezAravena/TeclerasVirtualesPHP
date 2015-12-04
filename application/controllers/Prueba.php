<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Prueba extends CI_Controller {

  public function __construct() {
    parent::__construct();
   $this->load->model('prueba_model');
   $this->load->database('tecleras');
  }


 public function ver(){
 		$data = array(
 			'titulo' => 'Mostrar datos',
 			'enlace' => $this->prueba_model->verTabla_Maestra(),
 			'join' => $this->prueba_model->join()
 			 );
 		$this->load->template('prueba_vista',$data);
	}
 
 }
?>