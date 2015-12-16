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
      //para que no dupliquen las PK de la tabla tv_asistencia_clase

      $pk = $this->db->get_where('tv_asistencia_clase', array('AC_ID' => $d));

        foreach ($pk->result() as $row=>$d){
               $d=rand(0,2147483647);
        }
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

   public function verPreguntaResponder() {
    $consulta = $this->db->query('SELECT PM_ID,PM_NOMBRE,PM_TEXTO,PM_TIPO,PM_FECHA_CREACION FROM tv_pregunta_maestra where PM_ID in (1)');
    
    if ($consulta->num_rows() > 0) {
      return $consulta;
    } else {
      return false;
    }
  }

  public function insertarRespuesta() {
    $data = array(
      'RES_ID' => 1,
      'RES_TEXTO' => $this->input->post('textoResp'),
      'PM_ID' => 1,
      'PM_CORRECTA' => 1
    );

    $this->db->insert('tv_respuestas',$data);

    redirect(base_url('estudiantes/responderPreguntas'));

  }
}
