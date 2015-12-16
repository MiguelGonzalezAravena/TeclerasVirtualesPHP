<?php
class Estudiantes_model extends CI_Model {

  public function get_users($id = 0) {
    if ($id === 0) {
      $query = $this->db->get('tv_estudiante');
      return $query->result_array();
    }
    
    $query = $this->db->get_where('tv_estudiante', array('EST_ID' => $id));
    return $query->row_array();
  }
  
  public function set_users($id = 0) {
    
    $data = array(
      'EST_ID' => $this->input->post('id'),
      'EST_NOMBRE' => $this->input->post('name'),
      'EST_CORREO' => $this->input->post('email'),
      'EST_PWD' => sha1($this->input->post('password')),
    );
    
    if ($id === 0) {
      return $this->db->insert('tv_estudiante', $data);
    } else {
      $this->db->where('EST_ID', $id);
      return $this->db->update('tv_estudiante', $data);
    }
  }

  public function delete_user($id = 0) {
    if($id == 0) {
      redirect(base_url('estudiantes'));
    }

    $this->db->where('EST_ID', $id);
    $this->db->delete('tv_estudiante');
    redirect(base_url('estudiantes'));
  }

  public function ingresar_clase($password) {
    $query = $this->db->get_where('tv_clase', array('CLA_PASSWORD' => $password));
    if($query == true) {
      redirect(base_url('estudiantes'));
    }else{
      redirect(base_url('estudiantes'));
      
    }
  }
  public function verClases() {
    $query = $this->db->query('SELECT * FROM tv_clase');
    
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  
    redirect(base_url('docentes/mostrarClase'));
  }
}
