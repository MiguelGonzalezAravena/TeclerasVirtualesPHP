<?php
class prueba_model extends CI_Model {

	public function __construct() {
    parent::__construct();
   //$this->load->view('prueba_vista');
  // $this->load->model('');
   $this->load->database('tecleras');
  }

  
  public function verTodo() {
  	// $consulta = $this->db->query('SELECT PM_NOMBRE FROM tv_pregunta_maestra');
  	// return $consulta->row_array();

  //   if ($id === 0) {
  //     $query = $this->db->get('tv_pregunta_maestra');
  //     return $query->result_array();
  //   }
    
  //   $query = $this->db->get_where('tv_pregunta_maestra', array('PM_ID' => $id));
  //   return $query->row_array();
  // }
 
  $query = $this->db->get('tv_pregunta_maestra');
 
  if ($query->num_rows() > 0)
    return $query;
  else
    return false;
 
  return $query->result();
}
}
