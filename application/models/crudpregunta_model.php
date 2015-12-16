<?php

class crudpregunta_model extends CI_Model{

  
  public function __construct() {
    parent::__construct();
  }

  public function optenerPreguntas($paralelo){
        $data = array();
        $query = $this->db->query('select PM_ID, PM_NOMBRE, PM_TIPO from tv_pregunta_maestra where TV_PARALELO_PAR_ID ='.$paralelo.'');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
     }
    public function optenerPregunta($id){
        $query = $this->db->query('select * from tv_pregunta_maestra where PM_ID ='.$id.'');
        return $query->row();
     }

    public function optenerRespuesta($id){
        $query = $this->db->query('select RES_TEXTO, PM_CORRECTA from tv_respuestas where RES_ID ='.$id.'');
        return $query->row();
     }

    public function eliminar($id){
      $this->db->where('PM_ID',$id);
      if($this->db->delete('tv_respuestas')){
        $this->db->where('PM_ID',$id);
        return $this->db->delete('tv_pregunta_maestra');
      }
    }

  public function upDatePpreguntaA($id){
    $alternativas = $this->input->post('respuesta1');
    $alternativas .= '@' . $this->input->post('respuesta2');
    $alternativas .= '@' . $this->input->post('respuesta3');
    $alternativas .= '@' . $this->input->post('respuesta4');
    $data1 = array(
      'PM_NOMBRE' => $this->input->post('nombreP'),
      'PM_TEXTO' =>  $alternativas,
      'PM_RUTA_IMAGEN' => $this->input->post('urlImagen'),
      'PM_RUTA_VIDEO' => $this->input->post('urlVideo'),
      'PM_EXPLICACION' => $this->input->post('pregunta'),
      'PM_RUTA_IMAGEN_EXPLICACION' => $this->input->post('imagenexplicacionr'),
    );
    $this->db->where('PM_ID', $id);
    $this->db->update('tv_pregunta_maestra', $data1);

    $data2 = array(
      'RES_TEXTO' => $this->input->post('explicacionr'),
      'PM_CORRECTA' => $this->input->post('respuestaCorrecta'),
    );
    $this->db->where('PM_ID', $id);
    $this->db->update('tv_respuestas', $data2);
    return true;

  }

}
