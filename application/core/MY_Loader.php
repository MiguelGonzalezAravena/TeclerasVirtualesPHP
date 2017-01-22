<?php
class MY_Loader extends CI_Loader {
  public function template($template_name, $vars = array(), $return = false) {
    if($return):
      $content .= $this->view('templates/header', $vars, $return);
      $content .= $this->view($template_name, $vars, $return);
      $content .= $this->view('templates/footer', $vars, $return);

      return $content;
    else:
      $this->view('templates/header', $vars);
      $this->view($template_name, $vars);
      $this->view('templates/footer', $vars);

    endif;
  }

  public function tipoPregunta($tipo) {
    switch ($tipo) {
      case 1:
        return 'Alternativa';
        break;
      case 2:
        return 'Dicotómica';
        break;
      case 3:
        return 'Escala de Likert';
        break;
      default:
        return 'No reconocido';
        break;
    }
  }
}
?>
