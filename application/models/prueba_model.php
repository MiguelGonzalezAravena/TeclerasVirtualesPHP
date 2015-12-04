<?php
class prueba_model extends CI_Model {

	public function __construct() {
    parent::__construct();
    $this->load->database('tecleras');
  }

  
  public function verTabla_Maestra() {
    $query = $this->db->get('tv_pregunta_realizada');
    if ($query->num_rows() > 0)
      return $query;
    else
      return false;
   
    return $query->result();
  }


  public function join() {
        $this->db->select('*');
        $this->db->from('tv_pregunta_realizada');
        $this->db->join('tv_pregunta_maestra', 'tv_pregunta_maestra.PM_ID = tv_pregunta_realizada.PM_ID');
        $this->db->join('tv_respuestas', 'tv_respuestas.PM_ID = tv_pregunta_maestra.PM_ID');
        $query2 = $this->db->get();
        if ($query2->num_rows() > 0)
           return $query2;
       
        return false;

       return $query2->result();
  }


  


  // public function verTabla_Respuesta() {
  //      $this->db->select('*');
  //      $this->db->from('blogs');
  //      $this->db->join('comments', 'comments.id = blogs.id');

  //   $query = $this->db->get();
  // }

}
