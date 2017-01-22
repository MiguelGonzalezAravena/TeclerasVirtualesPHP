<?php

class crudpregunta_model extends CI_Model{

  
  public function __construct() {
    parent::__construct();
  }

  public function optenerPreguntas(){
        $data = array();
        $query = $this->db->query('select PM_ID, PM_NOMBRE, PM_TIPO from tv_pregunta_maestra');
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
      $query = $this->db->get_where('tv_respuestas', array('PM_ID' => $id));

      if($query->num_rows() > 0) {
        return $query;
      } else {
        return false;
      }
     }

    public function eliminar($id){
      $this->db->where('PM_ID',$id);
      if($this->db->delete('tv_respuestas')){
        $this->db->where('PM_ID', $id);
        return $this->db->delete('tv_pregunta_maestra');
      }
    }

  public function upDatePpreguntaA($id) {
    /**
    * Capturar datos
    */
    $id_existentes = $this->input->post('id_resp');
    $respuestas_existentes = $this->input->post('resp');
    $respuestas_nuevas = $this->input->post('respuesta');
    $correcta = $this->input->post('respuestaCorrecta');

    $data1 = array(
      'PM_NOMBRE' => $this->input->post('nombreP'),
      'PM_TEXTO' =>  $this->input->post('pregunta'),
      'PM_RUTA_IMAGEN' => $this->input->post('urlImagen'),
      'PM_RUTA_VIDEO' => $this->input->post('urlVideo'),
      'PM_EXPLICACION' => $this->input->post('explicacionr'),
      'PM_RUTA_IMAGEN_EXPLICACION' => $this->input->post('imagenexplicacionr'),
    );

    /**
    * Actualizar pregunta
    */
    $this->db->where('PM_ID', $id);
    $this->db->update('tv_pregunta_maestra', $data1);

    /**
    * Actualizar respuestas existentes
    */
    $j = 1;
    for($i = 0; $i < count($id_existentes); $i++) {
      $data2 = array(
        'RES_TEXTO' => $respuestas_existentes[$i],
        'PM_CORRECTA' => ($correcta == $j ? 1 : 0),
      );
      $this->db->where('RES_ID', $id_existentes[$i]);
      $this->db->update('tv_respuestas', $data2);
      $j++;
    }

    /**
    * Agregar nuevas respuestas
    */
    for($i = 0; $i < count($respuestas_nuevas); $i++) {
      $data3 = array(
        'RES_TEXTO' => $respuestas_nuevas[$i],
        'PM_ID' => $id,
        'PM_CORRECTA' => ($correcta == $j ? 1 : 0)
      );
      $this->db->insert('tv_respuestas', $data3);
      $j++;
    }
  }

}
