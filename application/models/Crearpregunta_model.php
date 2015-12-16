<?php

class Crearpregunta_model extends CI_Model{

  
  public function __construct() {
    parent::__construct();
  }

  public function set_preguntaA($curso){
    $alternativas = $this->input->post('respuesta1');
    $alternativas .= '@' . $this->input->post('respuesta2');
    $alternativas .= '@' . $this->input->post('respuesta3');
    $alternativas .= '@' . $this->input->post('respuesta4');
    $paralelo = $curso;
    $datosParalelo =  $this->db->query('select ASI_ID, TV_DOCENTE_DOC_ID FROM TV_PARALELO WHERE PAR_ID='. $paralelo);
    $row = $datosParalelo->row();
    $data1 = array(
      'PM_NOMBRE' => $this->input->post('nombreP'),
      'PM_TEXTO' =>  $alternativas,
      'PM_TIPO' => '1',
      'PM_RUTA_IMAGEN' => $this->input->post('urlImagen'),
      'PM_RUTA_VIDEO' => $this->input->post('urlVideo'),
      'PM_EXPLICACION' => $this->input->post('pregunta'),
      'PM_RUTA_IMAGEN_EXPLICACION' => $this->input->post('imagenexplicacionr'),
      'TV_PARALELO_PAR_ID' => $paralelo,
      'TV_PARALELO_ASI_ID' => $row->ASI_ID,
      'TV_PARALELO_TV_DOCENTE_DOC_ID' => $row->TV_DOCENTE_DOC_ID,
    );
    $this->db->insert('tv_pregunta_maestra', $data1);

    $id_insertado =  $this->db->query('select MAX(PM_ID) AS PM_ID FROM TV_PREGUNTA_MAESTRA');
    $row = $id_insertado->row();
    $data2 = array(
      'RES_ID' => $row->PM_ID,
      'RES_TEXTO' => $this->input->post('explicacionr'),
      'PM_ID' => $row->PM_ID,
      'PM_CORRECTA' => $this->input->post('respuestaCorrecta'),
    );
    
    return $this->db->insert('tv_respuestas', $data2);
  }

  public function optenerParalelo(){
        $data = array();
        $query = $this->db->get('TV_PARALELO');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
     }
}
