<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index() {
		$data = array(
			'titulo' => 'Tecleras Virtuales',
			'Hola' => 'hola'

		);

		if($this->session->userdata('is_admin')) {
			$this->load->template('admin_view', $data);
		} else {
			switch($this->session->userdata('profile')) {
				case 1: // Docentes
					$this->load->template('docentes_view', $data);
					break;
				case 2: // Estudiantes
					$this->load->template('estudiantes_view', $data);
					break;
				case '':
				default:
					$this->load->template('welcome_message', $data);
					break;
			}
		}

	}
}
