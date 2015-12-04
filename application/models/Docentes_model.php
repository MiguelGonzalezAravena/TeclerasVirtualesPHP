<?php
class Docentes_model extends CI_Model {
  var $idClase=0;
  var $idPreguntaRealizada=0;

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

  /* No se ocupa
  public function verIdParalelo() {
    $query = $this->db->query('SELECT PAR_ID FROM tv_paralelo');
    
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  
    redirect(base_url('docentes/crearClase'));
  }

  public function verIdAsignatura() {
    $query = $this->db->query('SELECT ASI_ID FROM tv_asignatura');
    
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
    $query = $this->db->query('SELECT * FROM tv_clase');
    
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  
    redirect(base_url('docentes/mostrarClase'));
  }

  */

  public function buscarClase($idClase){

    $query = $this->db->query('SELECT * FROM tv_clase WHERE CLA_ID ='.$idClase.'');
    
    if ($query->num_rows() > 0) {
    return $this->docentes_model->buscarClase($idClase+1);
    }else{
      //echo $idClase;
      return $idClase;
    }
  }

  public function buscarPreguntaRealizada($idPreguntaRealizada){

    $query = $this->db->query('SELECT * FROM tv_pregunta_realizada WHERE PR_ID ='.$idPreguntaRealizada.'');
    
    if ($query->num_rows() > 0) {
    return $this->docentes_model->buscarPreguntaRealizada($idPreguntaRealizada+1);
    }else{
      //echo "Buscar pregunta realizada".$idPreguntaRealizada;
      return $idPreguntaRealizada;
    }
  }

  public function verAsignatura() {


    $query = $this->db->query('SELECT * FROM tv_asignatura');
    
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  
    redirect(base_url('docentes/mostrarAsignatura'));
  }

  public function crearClase($password) {
    //$selectIdParalelo = $_POST['idParalelo'];
    //$selectIdAsignatura = $_POST['idAsignatura'];
    //$selectIdDocente = $_POST['idDocente']; 
    
    $idClase = $this->idClase;
    
    $idClase = $this->docentes_model->buscarClase($idClase);
    //echo $idClase;

  
    $data = array(
      'CLA_PASSWORD' => $password,
      'CLA_FECHA_HORA_INICIO' => date('Y-m-d H:i:s'),
      'DOC_ID' => $this->session->userdata('id_user'),
      'ASI_ID' => 1,
      'PAR_ID' => 1,
      'CLA_ID' => $idClase
      );
    $this->db->insert('tv_clase',$data);
    $num_inserts = $this->db->affected_rows();
    if($num_inserts == 0){
      return false;
    }else{
      return true;
    }
    redirect(base_url('docentes/mostrarPreguntas'));
  }

  public function verPreguntas() {

    $query = $this->db->query('SELECT PM_ID,PM_NOMBRE,PM_TEXTO,PM_TIPO,PM_FECHA_CREACION FROM tv_pregunta_maestra');
    
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  
    redirect(base_url('docentes/crearClase'));
  }

  public function verPreguntasSeleccionadas() {

    $idPreguntaRealizada = $this->idPreguntaRealizada;
    $idPreguntaRealizada = $this->docentes_model->buscarPreguntaRealizada($idPreguntaRealizada);
    $pregunta = "";
    $pregunta = $this->input->post('pregunta');

    echo "Pregunta Seleccionada:".$pregunta;

    $idClaseSeleccionada = "";
    $idClaseSeleccionada = $this->input->post('clase');
    echo("Clase seleccionada".$idClaseSeleccionada);

    //$consulta = 'SELECT PM_ID,PM_NOMBRE,PM_TEXTO,PM_TIPO,PM_FECHA_CREACION FROM tv_pregunta_maestra where PM_ID in ('.$pregunta.')';

    if($pregunta == ""){
      $consulta = 'SELECT PM_ID,PM_NOMBRE,PM_TEXTO,PM_TIPO,PM_FECHA_CREACION FROM tv_pregunta_maestra where PM_ID in (1)';
    }else{

      $consulta = 'SELECT PM_ID,PM_NOMBRE,PM_TEXTO,PM_TIPO,PM_FECHA_CREACION FROM tv_pregunta_maestra where PM_ID in ('.$pregunta.')';
      
    }

    $query = $this->db->query('SELECT CLA_ID FROM tv_clase WHERE CLA_ID = (SELECT MAX(CLA_ID) from tv_clase)');
    //echo $query->num_rows();
    
    
    foreach ($query->result_array() as $row)
    {
            echo $row['CLA_ID'];
            
    }


    $data = array(
      'PR_ID' => $idPreguntaRealizada ,
      'PR_HORA_INICIO' => date('Y-m-d H:i:s'),
      'PR_HORA_FIN' => date('Y-m-d H:i:s'),
      'PR_TIEMPO_MAX' => date('Y-m-d H:i:s'),
      'PM_ID' => $pregunta,
      'CLA_ID' => $row['CLA_ID']
      );

    $this->db->insert('tv_pregunta_realizada',$data);

    $query = $this->db->query($consulta);  
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
    redirect(base_url('docentes/mostrarPreguntaSeleccionada'));

  }

}
