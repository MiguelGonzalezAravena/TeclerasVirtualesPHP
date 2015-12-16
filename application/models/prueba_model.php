<?php
class prueba_model extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database('tecleras');
  }

   function get_pregunta($datos){ //obtiene los datos de la tabla marter, solo del ID seleccionado
    $query = $this->db->get_where('tv_pregunta_maestra', array('PM_ID' => $datos));

    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  }

   function get_datos_pregunta($datos){ //obtiene los datos de la tabla respuestas, solo del ID seleccionado
    $query = $this->db->get_where('tv_respuestas', array('PM_ID' => $datos));

    if ($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }
}