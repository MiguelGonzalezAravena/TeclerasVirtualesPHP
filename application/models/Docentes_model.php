<?php
class Docentes_model extends CI_Model {
  var $idPreguntaRealizada=0;

  public function get_users($id = 0) {
    if ($id === 0) {
      $query = $this->db->get('tv_docente');
      return $query->result_array();
    }
    
    $query = $this->db->get_where('tv_docente', array('DOC_ID' => $id));
    return $query->row_array();
  }

  public function get_clase($id) {
    if($id == 0) {
      return false;
    }

    $query = $this->db->get_where('tv_clase', array('CLA_ID' => $id));
    return $query->row_array();
  }
  
  public function set_users($id = 0) {
    
    $data = array(
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

  public function delete_clase($id = 0) {
    if($id == 0) {
      redirect(base_url('docentes/mostrarAsignatura'));
    }

    $this->db->where('CLA_ID', $id);
    $this->db->delete('tv_clase');
    redirect(base_url('docentes/mostrarAsignatura'));
  }

  public function get_preguntasRealizadas($id) {
    if($id == 0) {
      redirect(base_url('docentes/mostrarAsignatura'));
    }
    
    $this->db->select('*');
    $this->db->from('tv_pregunta_realizada a');
    $this->db->where('a.PM_ID', $id);
    $this->db->join('tv_pregunta_respondida b', 'a.PR_ID = b.PR_ID');
    $this->db->join('tv_pregunta_maestra c', 'a.PM_ID = c.PM_ID');
    $this->db->group_by('c.PM_ID');
    $query = $this->db->get();

    if($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }

  public function get_textoPregunta($id) {
    if($id == 0) {
      redirect(base_url('docentes/mostrarAsignatura'));
    }

    $query = $this->db->get_where('tv_pregunta_maestra', array('PM_ID' => $id));
    $preg = $query->row();
    if($query->num_rows() > 0) {
      return $preg->PM_TEXTO;
    } else {
      return false;
    }
  }

  public function verIdAsignatura() {
    $this->db->select('ASI_ID');
    $query = $this->db->get('tv_asignatura');

    if($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }

  public function verIdParalelo() {
    $this->db->select('PAR_ID');
    $query = $this->db->get('tv_paralelo');

    if($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }

  public function ajaxbuscar_preguntas() {
    $pm_nombre = $this->input->get('pm_nombre');
    $tipoPreguntas = $this->input->get('combo');
    $fecha1 = str_replace("/", "-", $this->input->get('fecha1'));
    $fecha2 = str_replace("/", "-", $this->input->get('fecha2'));

    if(!empty($pm_nombre)) {
      $this->db->like('PM_NOMBRE', $pm_nombre);
    }

    if(!empty($fecha1) && !empty($fecha2)) {
      $c0 = "PM_FECHA_CREACION BETWEEN '" . date('Y-m-d', strtotime($fecha1)) . "' and '" . date('Y-m-d', strtotime($fecha2)) . "'";
      $this->db->where($c0);
    } else if(!empty($fecha1)) {
      $c0 = "PM_FECHA_CREACION >= '" .  date('Y-m-d', strtotime($fecha1)) . "'";
      $this->db->where($c0);
    } else if(!empty($fecha2)) {
      $c0 = "PM_FECHA_CREACION <= '" . date('Y-m-d', strtotime($fecha2)) . "'";
      $this->db->where($c0);
    }
    if(!empty($tipoPreguntas)){
      $this->db->like('PM_TIPO', $tipoPreguntas);
    }

    $query = $this->db->get('tv_pregunta_maestra');
    return $query;
  }

  public function verAsignatura() {
    $query = $this->db->get('tv_asignatura');
    
    if ($query->num_rows() > 0) {
      return $query;
    }else{
      return false;
    }
  
    redirect(base_url('docentes/mostrarAsignatura'));
  }

  public function cantidadParalelos($asignatura) {
    $query = $this->db->get_where('tv_paralelo', array('ASI_ID' => $asignatura));

    if($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }

  public function crearClase($passwd, $idAsignatura, $idParalelo) {
    $this->db->select('PAR_ID');
    $query = $this->db->get_where('tv_paralelo', array('PAR_NUMERO' => $idParalelo, 'ASI_ID' => $idAsignatura));
    $paralelo = $query->row();

    $data = array(
      'CLA_PASSWORD' => $passwd,
      'DOC_ID' => $this->session->userdata('id_user'),
      'ASI_ID' => $idAsignatura,
      'PAR_ID' => $paralelo->PAR_ID
    );

    $this->db->insert('tv_clase', $data);

    $this->db->select('MAX(CLA_ID) AS CLA_ID');
    $query = $this->db->get('tv_clase');
    $clase = $query->row();
    redirect(base_url('docentes/mostrarClase/' . $clase->CLA_ID));
  }

  public function lanzarPregunta($clase, $pregunta) {
    $data = array(
      'CLA_ID' => $clase,
      'PM_ID' => $pregunta
    );

    $this->db->insert('tv_pregunta_realizada', $data);

    $this->db->select('MAX(PR_ID) AS PR_ID');
    $query = $this->db->get('tv_pregunta_realizada');
    $pregReal = $query->row();
    redirect(base_url('docentes/mostrarClase/' . $data['CLA_ID'] . '/' . $pregReal->PR_ID));

  }

  public function terminarClase($clase) {
    $data['CLA_ID'] = $clase;
    
    $this->db->where('CLA_ID', $clase);
    $this->db->delete('tv_clase');
    redirect(base_url('docentes/mostrarAsignatura'));
  }

  public function verPreguntas() {
    $query = $this->db->get('tv_pregunta_maestra');
    
    if($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }

  public function verPreguntasSeleccionadas() {
    $tiempoMax = 0;
    $pregunta = "";
    $pregunta = $this->input->post('pregunta');

    //echo "Pregunta Seleccionada:" . $pregunta;

    $idClaseSeleccionada = "";
    $idClaseSeleccionada = $this->input->post('clase');
    // echo "Clase seleccionada " . $idClaseSeleccionada;

    if($pregunta == "") {
      $consulta = 'SELECT PM_ID,PM_NOMBRE,PM_TEXTO,PM_TIPO,PM_FECHA_CREACION FROM tv_pregunta_maestra where PM_ID in (1)';
    } else {
      $consulta = 'SELECT PM_ID,PM_NOMBRE,PM_TEXTO,PM_TIPO,PM_FECHA_CREACION FROM tv_pregunta_maestra where PM_ID in ('.$pregunta.')';
      
    }

    $query = $this->db->query('SELECT CLA_ID FROM tv_clase WHERE CLA_ID = (SELECT MAX(CLA_ID) from tv_clase)');

    foreach ($query->result_array() as $row) {
      // echo $row['CLA_ID'];
    }

    $data = array(
      'PR_HORA_INICIO' => date('Y-m-d H:i:s'),
      'PR_HORA_FIN' => date('Y-m-d H:i:s'),
      'PR_TIEMPO_MAX' => $tiempoMax,
      'PM_ID' => $pregunta,
      'CLA_ID' => $row['CLA_ID']
      );

    $this->db->insert('tv_pregunta_realizada', $data);

    $tiempoMax = $this->db->query('SELECT PR_TIEMPO_MAX FROM tv_pregunta_realizada where PR_ID =(SELECT MAX(PR_ID) from tv_pregunta_realizada)');

    $query = $this->db->query($consulta);  

    if ($tiempoMax->num_rows() > 0) {
      return $tiempoMax;
    }else{
      return false;
    }
    redirect(base_url('docentes/mostrarPreguntaSeleccionada'));

  }

  public function verClases() {
    $query = $this->db->get('tv_clase');

    if($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }

  public function insertarTiempoFinal($tiempoFinal) {
    $this->db->select('MAX(PR_ID) AS idMAX');
    $query = $this->db->get('tv_pregunta_realizada');  
    
    foreach ($query->result_array() as $row){
      $idMAX = $row['idMAX'];
    }
    
    $data = array(
      'PR_HORA_FIN' => $tiempoFinal
    );

    $this->db->where('PR_ID', $idMAX);

    return $this->db->update('tv_pregunta_realizada', $data);
  }

}
