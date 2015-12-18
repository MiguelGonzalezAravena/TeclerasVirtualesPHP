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
      $d=rand(0,2147483647);
      $id=$this->session->userdata('id_user');

      foreach ($query->result() as $row) {        
        if($row->CLA_PASSWORD == $password){
          $data = array(
            'EST_ID' => $id,
            'CLA_ID' => $row->CLA_ID,
          );

          $this->db->insert('tv_asistencia_clase', $data);

          $clase_id = $row->CLA_ID;
           
        }
      }
      redirect(base_url('estudiantes/vista_clase/' . $clase_id));
    } else {
      redirect(base_url('estudiantes/ingresarClase?fail=1'));
    }
  }

   public function verPreguntaResponder($clase, $pregunta) {
      /**
      * SELECT * FROM tv_pregunta_realizada AS r WHERE r.PM_ID = $pregunta AND r.CLA_ID = $clase INNER JOIN tv_pregunta_maestra AS p ON p.PM_ID = r.PM_ID
      *
      */
    $this->db->select('*');
    $this->db->from('tv_pregunta_realizada');
    $this->db->where(array('tv_pregunta_realizada.PR_ID' => $pregunta, 'tv_pregunta_realizada.CLA_ID' => $clase));
    $this->db->join('tv_pregunta_maestra', 'tv_pregunta_maestra.PM_ID = tv_pregunta_realizada.PM_ID');
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }

  public function get_respuestas($pregunta) {
    $query = $this->db->get_where('tv_pregunta_realizada', array('PR_ID' => $pregunta));
    $pregunta = $query->row();
    $query = $this->db->get_where('tv_respuestas', array('PM_ID' => $pregunta->PM_ID));

    if ($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }

  public function insertarRespuesta() {
    $data = array(
      'PR_ID' => $this->input->post('pregunta_id'),
      'EST_ID' => $this->session->userdata('id_user'),
      'RES_ID' => $this->input->post('respuesta'),
    );

    $this->db->insert('tv_pregunta_respondida', $data);
  }
}
