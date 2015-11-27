<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Prueba extends CI_Controller {

  public function __construct() {
    parent::__construct();
   $this->load->model('prueba_model');
   $this->load->database('tecleras');
  }


 public function ver(){
 		//$data['id']=$this->prueba_model->verTodo();
 		$data = array(
 			'enlace' => $this->prueba_model->verTodo()
 			 );
 		$this->load->view('prueba_vista',$data);
	}
 
 }
?>