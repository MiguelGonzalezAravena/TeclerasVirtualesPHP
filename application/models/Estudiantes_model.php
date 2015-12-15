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

  public function ingresarClase($password) {
    /**
     * Una forma más elegante de realizar consultas, Hay que aprovechar los recursos que ofrece el framework.
     */
    $query = $this->db->get_where('tv_clase', array('CLA_PASSWORD' => $password));
    
    if ($query->num_rows() > 0) {
      $d=rand(0,4294967295);
      $id=$this->session->userdata('id_user');
      
      foreach ($query->result() as $row){
        
        if($row->CLA_PASSWORD=$password){
            $data = array(
          'AC_ID' => $d,
          'EST_ID' => $id,
          'CLA_ID' => $row->CLA_ID,
          );
        $this->db->insert('tv_asistencia_clase', $data);
           
        }
      }
      redirect(base_url('estudiantes/vista_clase'));
    } else {
      redirect(base_url('estudiantes/ingresarClase?fail'));
    }
  }
}
