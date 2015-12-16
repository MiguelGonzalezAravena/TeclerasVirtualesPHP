<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Model {

  	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data()
    {
        
		//$this->db->select('PR_ID, EST_ID, RES_ID');
        /*
        $this->db->select('EST_ID, RES_ID');
        $this->db->from('tv_pregunta_respondida');
		$query = $this->db->get();
       	return $query->result();
        */

        $parametro=1;//por ahora , debe ser el PM_ID para mostrar. se juntara con la Issue 11 si que ahi se toma el parametro 

        $this->db->select('count(1) as frecuencia,RES_ID as alternativa');
        $this->db->from('tv_pregunta_respondida');
        $this->db->where("PR_ID",$parametro);
        $this->db->group_by("RES_ID");
        $query2 = $this->db->get();
        return $query2->result();




        /*
        $this->db->select('RES_ID, EST_ID');
        $this->db->from('tv_pregunta_respondida');
        $this->db->join('tv_respuestas', 'tv_respuestas.PM_ID = tv_pregunta_respondida.PR_ID');
        $query2 = $this->db->get();
        return $query2->result();
        */


    }

    
}