<?php
class Docentes_model extends CI_Model {

  public function get_users($id = 0) {
    if ($id === 0) {
      $query = $this->db->get('tv_docente');
      return $query->result_array();
    }
    
    $query = $this->db->get_where('tv_docente', array('DOC_ID' => $id));
    return $query->row_array();
  }
  
  public function set_users($id = 0) {
    
    $data = array(
      'DOC_ID' => $this->input->post('id'),
      'DOC_NOMBRE' => $this->input->post('name'),
      'DOC_CORREO' => $this->input->post('email'),
      'DOC_PWD' => sha1($this->input->post('password')),
    );
    
    if ($id === 0) {
      return $this->db->insert('tv_docente', $data);
    } else {
      $this->db->where('DOC_ID', $id);
      return $this->db->update('tv_docente', $data);
    }
  }

  public function delete_user($id = 0) {
    if($id == 0) {
      redirect(base_url('docentes'));
    }

    $this->db->where('DOC_ID', $id);
    $this->db->delete('tv_docente');
    redirect(base_url('docentes'));
  }

  public function crearClase() {
    $selectIdParalelo = $this->input->post('idParalelo');
    $selectIdAsignatura = $this->input->post('idAsignatura');
    //$selectIdParalelo = $_POST['idParalelo'];
    //$selectIdAsignatura = $_POST['idAsignatura'];
    //$selectIdDocente = $_POST['idDocente'];
    

    $data = array(
      'CLA_PASSWORD' => $this->input->post('nombreClase'),
      'CLA_FECHA_HORA_INICIO' => $this->input->post('fechaInicio'),
      'DOC_ID' => $this->session->userdata('id_user'),
      'ASI_ID' => $selectIdAsignatura,
      'PAR_ID' => $selectIdParalelo,
      'CLA_ID' => 1
      );
    $this->db->insert('tv_clase',$data);
    $num_inserts = $this->db->affected_rows();
    if($num_inserts == 0){
      return false;
    }else{
      return true;
    }
    redirect(base_url('docentes/crearClase'));
  }

  public function verPreguntas() {
    $query = $this->db->get('tv_pregunta_maestra');
    //$query = $this->db->query('SELECT PM_ID,PM_NOMBRE,PM_TEXTO,PM_TIPO,PM_FECHA_CREACION FROM tv_pregunta_maestra');
    
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  
    //redirect(base_url('docentes/crearClase'));
  }

  public function ajaxbuscar_preguntas(){

    $pm_nombre = $this->input->get('pm_nombre');
    $fecha1 = str_replace("/", "-",$this->input->get('fecha1'));
    $fecha2 = str_replace("/", "-",$this->input->get('fecha2'));
    $tipoPreguntas = $this->input->get('combo');
    if(!empty($pm_nombre)){
      $this->db->like('PM_NOMBRE', $pm_nombre);
    }
    if(!empty($fecha1) && !empty($fecha2)){
      $c0 = "PM_FECHA_CREACION BETWEEN '". date('Y-m-d', strtotime($fecha1)). "' and '". date('Y-m-d', strtotime($fecha2))."'";
      $this->db->where($c0);
    }
    else if(!empty($fecha1)){
      $c0 = "PM_FECHA_CREACION >= '". date('Y-m-d', strtotime($fecha1))."'";
      $this->db->where($c0);
    }
    else if(!empty($fecha2)){
      $c0 = "PM_FECHA_CREACION <= '". date('Y-m-d', strtotime($fecha2))."'";
      $this->db->where($c0);
    }
    if(!empty($tipoPreguntas)){
      $this->db->like('PM_TIPO', $tipoPreguntas);
    }

    $query=$this->db->get('tv_pregunta_maestra');
    return $query;
  }

 

  public function verIdParalelo() {
    //$query = $this->db->query('SELECT PAR_ID FROM tv_paralelo');
    $this->db->select('PAR_ID');
    $query = $this->db->get('tv_paralelo');
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  
    redirect(base_url('docentes/crearClase'));
  }

  public function verIdAsignatura() {
    //$query = $this->db->query('SELECT ASI_ID FROM tv_asignatura');
    $this->db->select('ASI_ID');
    $query = $this->db->get('tv_asignatura');

    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  
    redirect(base_url('docentes/crearClase'));
  }

  public function verIdDocente() {
    $query = $this->session->userdata('id_user');
    
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  
    redirect(base_url('docentes/crearClase'));
  }

  public function verClases() {
    //$query = $this->db->query('SELECT * FROM tv_clase');
    $query = $this->db->get('tv_clase');
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  
    redirect(base_url('docentes/mostrarClase'));
  }

  

}
