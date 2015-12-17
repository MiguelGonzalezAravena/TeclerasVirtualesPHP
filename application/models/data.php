<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Model {

  	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data()
    {
     

        $parametro=1;//por ahora , debe ser el PM_ID para mostrar. se juntara con la Issue 11 si que ahi se toma el parametro 


        $this->db->select('count(tv_respuestas.RES_ID) as frecuencia, tv_pregunta_respondida.RES_ID as respuesta, tv_respuestas.PM_CORRECTA as correcta');
        $this->db->from('tv_pregunta_respondida');
        $this->db->join('tv_respuestas','tv_respuestas.RES_ID = tv_pregunta_respondida.RES_ID','inner');
       // $this->db->where("tv_respuesta_respondida.PR_ID",$parametro);
        $this->db->group_by("tv_pregunta_respondida.RES_ID");
        $query1 = $this->db->get();
        return $query1->result();

        /*
        $this->db->select('count(1) as frecuencia,RES_ID as alternativa');
        $this->db->from('tv_pregunta_respondida');
        $this->db->where("PR_ID",$parametro);
        $this->db->group_by("RES_ID");
        $query2 = $this->db->get();
        //return $query2->result();
        /*
        $this->db->select('PM_ID');
        $this->db->from('tv_pregunta_realizada');
        $this->db->where("PR_ID",$parametro);
        $this->db->select('RES_ID,PM_CORRECTA');
        $this->db->from('tv_respuestas');
        $this->db->where("PM_ID",$parametro);
        $query1= $this->db->get();
        //return $query1->result();
        


        $this->db->select('*');
        $this->db->from('query1');
        $this->db->join('query2','query1.PR_ID = query2.PM_ID');
        */
        /*
        $this->db->select('count(1) as frecuencia , tv_pregunta_respondida.RES_ID as alternativa');
        $this->db->from('tv_pregunta_respondida as query1');
        $this->db->where("PR_ID",$parametro);//Parametro es la id pregunta para sacar las respuestas
        $this->db->group_by("tv_pregunta_respondida.RES_ID");
        $this->db->join('tv_respuestas as alternativas', 'alternativas.RES_ID=query1.RES_ID');
        $this->db->where('alternativas.PM_CORRECTA=TRUE');
        $query2 = $this->db->get();
        return $query2->result();
        */


    }

    
}