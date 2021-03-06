<?php

class Crearpregunta_model extends CI_Model{

  
  public function __construct() {
    parent::__construct();
  }

  public function set_preguntaA($curso){
    $respuestas = $this->input->post('respuesta');
    $respuestaCorrecta = $this->input->post('respuestaCorrecta');

    $data1 = array(
      'PM_NOMBRE' => $this->input->post('nombreP'),
      'PM_TEXTO' =>  $this->input->post('pregunta'),
      'PM_TIPO' => '1',
      'PM_RUTA_IMAGEN' => $this->input->post('urlImagen'),
      'PM_RUTA_VIDEO' => $this->input->post('urlVideo'),
      'PM_EXPLICACION' => $this->input->post('explicacionr'),
      'PM_RUTA_IMAGEN_EXPLICACION' => $this->input->post('imagenexplicacionr')
    );

    $this->db->insert('tv_pregunta_maestra', $data1);

    $id_insertado =  $this->db->query('select MAX(PM_ID) AS PM_ID FROM TV_PREGUNTA_MAESTRA');
    $row = $id_insertado->row();

    $j = 1;
    for($i = 0; $i < count($respuestas); $i++) {
      $data2 = array(
        'RES_TEXTO' => $respuestas[$i],
        'PM_ID' => $row->PM_ID,
        'PM_CORRECTA' => ($respuestaCorrecta == $j ? 1 : 0)
      );
      $this->db->insert('tv_respuestas', $data2);
      $j++;
    }

  }

  public function delete_alternativa($id = 0) {
    if($id == 0) {
      redirect(base_url('crudpregunta/index/1'));
    }

    $this->db->where('RES_ID', $id);
    $this->db->delete('tv_respuestas');
  }

  public function optenerParalelo(){
        return $data;
  }
}
