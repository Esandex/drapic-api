<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Alumnos_model');
	}
	public function index()
	{
		header('Access-Control-Allow-Origin: *');
		$data = array();
		$query = $this->Alumnos_model->read_all();
		foreach ($query->result() as $row)
		{
			$data[$row->alumno_nombre] = null;
		}
		$arr = array("data"=> $data);
    	echo json_encode($arr);
	}
}
