<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data');
	}  
	
	public function index_Columnas()
	{
		$data['id'] = $this->uri->segment(3);
		$this->load->view('chart', $data);
	}
	public function index_Barra()
	{
		$data['id'] = $this->uri->segment(3);
		$this->load->view('chart2', $data);
	}
	
	public function data()
	{
		$id = $this->uri->segment(3);

		if($id != 0) {
			$data = $this->data->get_data($id);
		} else {
			$data = $this->data->get_data();
		}
		//$data2 = $this->data->get_data2();
		$category = array();
		$category['name'] = 'Respuesta';
		
		$series1 = array();
		$series1['name'] = 'respuesta';
		
		$series2 = array();
		$series2['name'] = 'Frecuencia';
		
		$series3 = array();
		$series3['name'] = 'correcta';

		foreach ($data as $row)
		{
		    $category['data'][] = $row->respuesta;
			$series1['data'][] = $this->data->get_respuesta($row->respuesta);
			$series2['data'][] = $row->frecuencia;
			$series3['data'][] = $row->correcta;

		}

		$result = array();
		array_push($result,$category);
		array_push($result,$series1);
		array_push($result,$series2);
		array_push($result,$series3);
		
		print json_encode($result, JSON_NUMERIC_CHECK);
	}

	
	
}

