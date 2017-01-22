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
      redirect('docentes/mostrarAsignaturas');
    }

    $this->db->where('CLA_ID', $id);
    $this->db->delete('tv_clase');
    redirect('docentes/mostrarAsignaturas');
  }

  public function getTituloPregunta($id) {
    // TODO
  }

  public function get_preguntasRealizadas($id) {
    if($id == 0) {
      redirect('docentes/mostrarAsignaturas');
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

    public function get_textoPreguntaRealizada($id) {
        if($id == 0) {
          //redirect('docentes/mostrarAsignaturas');
        }

        $this->db->select('pm.PM_TEXTO');
        $this->db->from('tv_pregunta_realizada pr');
        $this->db->where('pr.PR_ID', $id);
        $this->db->join('tv_pregunta_maestra pm', 'pr.PM_ID = pm.PM_ID');
        $query = $this->db->get();
        $preg = $query->row();
        if($query->num_rows() > 0) {
          return $preg->PM_TEXTO;
        } else {
          return false;
        }
    }

  public function get_textoPregunta($id) {
    if($id == 0) {
      redirect('docentes/mostrarAsignaturas');
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
  
    redirect('docentes/mostrarAsignaturas');
  }

  public function crearClase($passwd, $idAsignatura) {
    $data = array(
      'CLA_PASSWORD' => $passwd,
      'DOC_ID' => $this->session->userdata('id_user'),
      'ASI_ID' => $idAsignatura
    );

    $this->db->insert('tv_clase', $data);
    redirect('docentes/mostrarClase/' . $this->db->insert_id());
  }

  public function lanzarPregunta($clase, $pregunta) {
    $data = array(
      'CLA_ID' => $clase,
      'PM_ID' => $pregunta
    );

    // Insertar pregunta realizada
    $this->db->insert('tv_pregunta_realizada', $data);
    $preguntaRealizada_id = $this->db->insert_id();

    // Modificar pregunta realizada en la clase
    $pr_data = array(
      'PR_ID' => $pregunta
    );

    // Actualizar campo 'PR_ID'
    $this->db->where('CLA_ID', $clase);
    $this->db->update('tv_clase', $pr_data);

    // Redireccionar
    redirect(base_url('docentes/mostrarClase/' . $clase . '/' . $preguntaRealizada_id));
  }

  public function getRespuestas($clase, $preguntaRealizada) {
    $this->db->select('respuestas.RES_TEXTO AS alternativa, respuestas.RES_ID AS id, respuestas.PM_CORRECTA AS correcta');
    $this->db->from('tv_pregunta_realizada AS pregunta_realizada');
    $this->db->join('tv_pregunta_maestra AS pregunta_maestra', 'pregunta_realizada.PM_ID = pregunta_maestra.PM_ID');
    $this->db->join('tv_respuestas AS respuestas', 'pregunta_realizada.PM_ID = respuestas.PM_ID');
    $this->db->where('pregunta_realizada.CLA_ID', $clase);
    $this->db->where('pregunta_realizada.PR_ID', $preguntaRealizada);
    $query = $this->db->get();

    if($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }

  public function getContadorRespuestas($respuesta, $preguntaRealizada) {
    $this->db->select('COUNT(*) AS dato');
    $this->db->from('tv_pregunta_respondida AS pregunta_respondida');
    $this->db->where('pregunta_respondida.RES_ID', $respuesta);
    $this->db->where('pregunta_respondida.PR_ID', $preguntaRealizada);
    $query = $this->db->get();

    if($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }

  public function terminarClase($clase) {
    $data['CLA_ID'] = $clase;
    
    $this->db->where('CLA_ID', $clase);
    $this->db->delete('tv_clase');
    redirect('docentes/mostrarAsignaturas');
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

  public function get_asistencia($id) {
    $this->db->select('ac.EST_ID estudiante_id, e.EST_NOMBRE nombre');
    $this->db->from('tv_asistencia_clase ac');
    $this->db->where('ac.CLA_ID', $id);
    $this->db->join('tv_estudiante e', 'e.EST_ID = ac.EST_ID');
    $query = $this->db->get();

    if($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }

}
