<?php
	
	class Preguntas extends CI_Controller{
		public function __construct() {
    		parent::__construct();
      //$this->load->model('preguntas_model');
  		}

  		public function index(){
  			$this->load->view('prueba_view');
  		}


}
