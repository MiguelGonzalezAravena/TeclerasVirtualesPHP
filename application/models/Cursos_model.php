<?php
class Cursos_model extends CI_Model {

  public function set_cursos($id = 0) {

    $data = array(
      'PAR_ID' => $this->input->post('id'),
      'PAR_NUMERO' => $this->input->post('paralelo'),
      'ASI_ID' => $this->input->post('asignatura'),
      'TV_DOCENTE_DOC_ID' => $this->session->userdata('id_user'),
    );

    if ($id === 0) {
      return $this->db->insert('tv_paralelo', $data);
    } else {
      $this->db->where('PAR_ID', $id);
      return $this->db->update('tv_paralelo', $data);
    }

  }

  public function get_cursos($id = 0) {
    if ($id === 0) {
      $query = $this->db->get('tv_paralelo');
      return $query->result_array();
    }
    
    $query = $this->db->get_where('tv_paralelo', array('PAR_ID' => $id));
    return $query->row_array();
  }

}
