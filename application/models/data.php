<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Model {

  	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_respuesta($resp) {
      $query = $this->db->get_where('tv_respuestas', array('RES_ID' => $resp));
      $row = $query->row();
      return $row->RES_TEXTO;
    }

    function get_data($pregunta = 0)
    {
     

        //$parametro=1;//por ahora , debe ser el PM_ID para mostrar. se juntara con la Issue 11 si que ahi se toma el parametro 
        $this->db->select('COUNT(tv_respuestas.RES_ID) as frecuencia, tv_respuestas.RES_ID as respuesta, tv_respuestas.PM_CORRECTA as correcta');
        $this->db->from('tv_pregunta_respondida');
        if($pregunta != 0) {
          $this->db->where("tv_pregunta_respondida.PR_ID", $pregunta);
        }
        $this->db->join('tv_respuestas','tv_respuestas.RES_ID = tv_pregunta_respondida.RES_ID','inner');
        $this->db->group_by("tv_respuestas.RES_ID");
        $query1 = $this->db->get();
        return $query1->result();

    }

    
}