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

  public function fueRespondida($id = 0) {
    /**
    * SELECT * FROM tv_pregunta_respondida a WHERE a.EST_ID = $VAR INNER JOIN tv_pregunta_realizada b ON a.PR_ID = b.PR_ID
    */
    $this->db->select('*');
    $this->db->from('tv_pregunta_respondida a');
    $this->db->where(array('a.EST_ID' => $this->session->userdata('id_user'), 'b.PR_ID' => $id));
    $this->db->join('tv_pregunta_realizada b', 'a.PR_ID = b.PR_ID');
    $query = $this->db->get();
    if($query->num_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function ingresarClase($password) {
    $query = $this->db->get_where('tv_clase', array('CLA_PASSWORD' => $password));
    
    if($query->num_rows() > 0) {
      $id = $this->session->userdata('id_user');
      foreach ($query->result() as $row) {
        if($row->CLA_PASSWORD == $password) {
          $clase_id = $row->CLA_ID;
          $pregunta_id = $row->PM_ID;
          $data = array(
            'EST_ID' => $id,
            'CLA_ID' => $clase_id
          );
          // Registrar asistencia a la clase
          if(!$this->get_asistencia($clase_id)) {
            $this->db->insert('tv_asistencia_clase', $data);
          }

          // Si ya hay una pregunta lanzada, se redirecciona a la pregunta
          // sino, se redirecciona a la vista de clase a la espera de una
          // próxima pregunta lanzada
          if($pregunta_id != 0) {
            redirect('estudiantes/responderPreguntas/' . $clase_id . '/' . $pregunta_id . '/');
          } else {
            redirect('estudiantes/vista_clase/' . $clase_id);
          }
        }
      }
    } else {
      redirect('estudiantes/ingresarClase?fail=1');
    }
  }

  public function get_asistencia($id) {
    $est_id = $this->session->userdata('id_user');;
    $query = $this->db->get_where('tv_asistencia_clase', array('EST_ID' => $est_id, 'CLA_ID' => $id));
    return ($query->num_rows() > 0) ? true : false;
  }

  public function get_nombreAsignatura($clase_id) {
    $this->db->select('ASI_NOMBRE');
    $this->db->from('tv_clase c');
    $this->db->where('c.CLA_ID', $clase_id);
    $this->db->join('tv_asignatura a', 'a.ASI_ID = c.ASI_ID');
    $query = $this->db->get();

    // ASI_NOMBRE
    if($query->num_rows() > 0) {
      return $query->result()[0]->ASI_NOMBRE;
    } else {
      return false;
    }

  }

  public function verPreguntaResponder($clase, $pregunta) {
    /**
    * SELECT * FROM tv_pregunta_realizada AS r WHERE r.PM_ID = $pregunta AND r.CLA_ID = $clase INNER JOIN tv_pregunta_maestra AS p ON p.PM_ID = r.PM_ID
    *
    */
    $this->db->select('*');
    $this->db->from('tv_pregunta_realizada AS r');
    $this->db->where(array('r.PR_ID' => $pregunta, 'r.CLA_ID' => $clase));
    $this->db->join('tv_pregunta_maestra AS p', 'p.PM_ID = r.PM_ID');
    $query = $this->db->get();
    
    if($query->num_rows() > 0) {
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
