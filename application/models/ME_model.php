<?php
class ME_model extends CI_Model {
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
    $this->db->from('tv_respuestas');
    $this->db->join('tv_pregunta_respondida', 'tv_pregunta_respondida.RES_ID = tv_respuestas.RES_ID');
    $query2 = $this->db->get();
    return $query2->result();
}

    function get_datos_pregunta_fecha($datos){ //obtiene los datos de la tabla respuestas, solo del ID seleccionado
      $sql3= "SELECT PR_HORA_INICIO,PM_ID FROM tv_pregunta_realizada where PM_ID = ?";
      $query3 = $this->db->query($sql3,array($datos['PM_ID']));
      return $query3->result();
    }

    function get_datos_pregunta_alternativas($datos){ //obtiene los datos de la tabla respuestas, solo del ID seleccionado
      $sql4= "SELECT RES_TEXTO,PM_CORRECTA FROM tv_respuestas where PM_ID = ?";
      $query4 = $this->db->query($sql4,array($datos['PM_ID']));
      return $query4->result();
}

}