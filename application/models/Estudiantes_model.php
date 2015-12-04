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

   public function verPreguntaResponder() {


    $consulta = $this->db->query('SELECT PM_ID,PM_NOMBRE,PM_TEXTO,PM_TIPO,PM_FECHA_CREACION FROM tv_pregunta_maestra where PM_ID in (1)');
    //echo $query->num_rows();
    
    if ($consulta->num_rows() > 0) {
      return $consulta;
    }else{
      return false;
    }

   

  }


  public function insertarRespuesta(){


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
