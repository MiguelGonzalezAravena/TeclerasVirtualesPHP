<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador1 extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
	}

	function index(){
		$this->load->view('BuscarRespuestas');
		//$this->load->view('Pagina/footer');
	}


?>