<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Prueba extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->view('prueba_vista');
    $this->load->database('default');
  }

 public function index(){
 	//$this->load->view('prueba_vista');
 }
 
 }
?>