<?php
class Bdocente_model extends CI_Model {



function get_pregunta(){

    $query = $this->db-> query('SELECT PM_NOMBRE FROM tv_pregunta_maestra');

    
    if ($query->num_rows() > 0) {
        foreach($query->result() as $row)
           $arrDatos[htmlspecialchars($row->PM_NOMBRE, ENT_QUOTES)] = htmlspecialchars($row->pregunta, ENT_QUOTES);
		$query->free_result();
        return $arrDatos;
     }
}

}
?>