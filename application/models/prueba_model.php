<?php
class prueba_model extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database('tecleras');
  }

   function get_pregunta($datos){ //obtiene los datos de la tabla marter, solo del ID seleccionado
    $sql= "SELECT PM_ID,PM_TEXTO,PM_FECHA_CREACION,PM_EXPLICACION FROM tv_pregunta_maestra where PM_ID = ?";
    $query = $this->db->query($sql,array($datos['PM_ID']));
    return $query->result();
}
   function get_datos_pregunta($datos){ //obtiene los datos de la tabla respuestas, solo del ID seleccionado
    $sql2= "SELECT RES_TEXTO,PM_CORRECTA FROM tv_respuestas where PM_ID = ?";
    $query2 = $this->db->query($sql2,array($datos['PM_ID']));
    return $query2->result();
}
  // public function respuesta() {
  //   $this->db->like('PM_ID', $this->input->get('pm_nombre'));
  //   $query=$this->db->get('tv_respuestas');
  //   return $query;
  //   //$query = $this->db->get('tv_respuestas');
  //   // $this->db->select('*');
  //   // $this->db->from('tv_respuestas');
  //   // $query = $this->db->get();
  //   // if ($query->num_rows() > 0)
  //   //   return $query;
  //   // else
  //   //   return false;
   
  //   //return $query->result();
  // }

  // public function join() {
  //       $this->db->select('*');
       
  //       $this->db->from('tv_pregunta_realizada');
  //       $this->db->join('tv_pregunta_maestra', 'tv_pregunta_maestra.PM_ID = tv_pregunta_realizada.PM_ID');
  //       $this->db->join('tv_respuestas', 'tv_respuestas.PM_ID = tv_pregunta_maestra.PM_ID');
  //       $query2 = $this->db->get();
  //       if ($query2->num_rows() > 0)
  //          return $query2;
  //      else
  //       return false;
  //      return $query2->result();
  // }
  
  // public function verTabla_Respuesta() {
  //      $this->db->select('*');
  //      $this->db->from('blogs');
  //      $this->db->join('comments', 'comments.id = blogs.id');
  //   $query = $this->db->get();
  // }
}