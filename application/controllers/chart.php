<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data');
	}  
	
	public function index_barra()
	{
		$this->load->template('chart');
	}
	public function index_pie()
	{
		$this->load->template('chart2');
	}
	
	public function data()
	{
		
		$data = $this->data->get_data();
		//$data2 = $this->data->get_data2();

		$category = array();
		$category['name'] = 'Respuesta';
		
		$series1 = array();
		$series1['name'] = 'Frecuencia';
		
		$series2 = array();
		$series2['name'] = 'Frecuencia';
		
		$series3 = array();
		//$series3['name'] = 'Frecuencia';

		foreach ($data as $row)
		{
		    $pregunta['data'][] = $row->alternativa;
			$series1['data'][] = $row->alternativa;
			$series2['data'][] = $row->frecuencia;

		}




		$result = array();
		array_push($result,$category);
		array_push($result,$series1);
		array_push($result,$series2);
		//array_push($result,$series3);
		
		print json_encode($result, JSON_NUMERIC_CHECK);
	}

	
	
}

