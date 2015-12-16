<?php
class Asignaturas_model extends CI_Model {

  public function get_asignaturas($id = 0) {
    if ($id === 0) {
      $query = $this->db->get('tv_asignatura');
      return $query->result_array();
    }
    
    $query = $this->db->get_where('tv_asignatura', array('ASI_ID' => $id));
    return $query->row_array();
  }
  
  public function set_asignaturas($id = 0) {
    
    $data = array(
      'ASI_ID' => $this->input->post('id'),
      'ASI_CODIGO' => $this->input->post('code'),
      'ASI_NOMBRE' => $this->input->post('name')
    );
    
    if ($id === 0) {
      return $this->db->insert('tv_asignatura', $data);
    } else {
      $this->db->where('ASI_ID', $id);
      return $this->db->update('tv_asignatura', $data);
    }
  }

  public function delete_asignatura($id = 0) {
    if($id == 0) {
      redirect(base_url('asignaturas'));
    }

    $this->db->where('ASI_ID', $id);
    $this->db->delete('tv_asignatura');
    redirect(base_url('asignaturas'));
  }
}
