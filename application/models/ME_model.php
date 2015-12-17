<?php
class ME_model extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database('tecleras');
  }

  function get_pregunta($datos) { //obtiene los datos de la tabla marter, solo del ID seleccionado
    $query = $this->db->get_where('tv_pregunta_maestra', array('PM_ID' => $datos));

    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  }
  
  function get_datos_pregunta($datos) { //obtiene los datos de la tabla respuestas, solo del ID seleccionado
    $this->db->select('*');
    $this->db->from('tv_respuestas');
    $this->db->join('tv_pregunta_respondida', 'tv_pregunta_respondida.RES_ID = tv_respuestas.RES_ID');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }

  function get_datos_pregunta_fecha($datos){ //obtiene los datos de la tabla respuestas, solo del ID seleccionado
    $query = $this->db->get_where('tv_pregunta_realizada', array('PM_ID' => $datos));

    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  }

  function get_datos_pregunta_alternativas($datos){ //obtiene los datos de la tabla respuestas, solo del ID seleccionado
    $query = $this->db->get_where('tv_respuestas', array('PM_ID' => $datos));

    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  }

}