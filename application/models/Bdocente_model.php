<?php
class Bdocente_model extends CI_Model {

	public function __construct(){
		
		parent::__construct();
	


	}

	//Obtener datos de la base de datos para mostrar en los combos
	
	function get_pregunta(){		
		$query = $this->db-> query('SELECT PM_ID,PM_NOMBRE FROM tv_pregunta_maestra');
		if ($query->num_rows() > 0){
	        foreach($query->result() as $row)
	           $arrDatos[htmlspecialchars($row->PM_ID, ENT_QUOTES) ] = htmlspecialchars($row->PM_NOMBRE, ENT_QUOTES);
			$query->free_result();
	        return $arrDatos;
	    }
	}

	function get_asignatura(){
		$query = $this->db-> query('SELECT ASI_ID,ASI_NOMBRE FROM tv_asignatura');
		if ($query->num_rows() > 0) {
	        foreach($query->result() as $row)
	           $arrDatos[htmlspecialchars($row->ASI_ID, ENT_QUOTES) ] = htmlspecialchars($row->ASI_NOMBRE, ENT_QUOTES);
			$query->free_result();
	        return $arrDatos;
	    }

	}

	function get_paralelo(){
		$query = $this->db-> query('SELECT PAR_ID,PAR_NUMERO FROM tv_paralelo');
		if ($query->num_rows() > 0) {
	        foreach($query->result() as $row)
	           $arrDatos[htmlspecialchars($row->PAR_ID, ENT_QUOTES) ] = htmlspecialchars($row->PAR_NUMERO, ENT_QUOTES);
			$query->free_result();
	        return $arrDatos;
	    }

	}

















}
/*PRUEBAS
$this->db->select('PM_NOMBRE');
$this->db->select('PM_ID');
$query = $this->db-> get('tv_pregunta_maestra');
*/


?>