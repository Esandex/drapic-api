<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Clientes_model');
	}
	public function all()
	{
		header('Access-Control-Allow-Origin: *');
		$data = array();
		$query = $this->Clientes_model->read_all();
		foreach ($query->result() as $row)
		{
			$datos = array('customer_id' 	=> $row->customer_id , 
						   'customer_phone'	=> $row->customer_phone
							);
			$data[$row->customer_name] = $datos;
		}
		$arr = array("data"=> $data);
    	echo json_encode($arr);
	}
	public function nombre($nombre)
	{
		header('Access-Control-Allow-Origin: *');
		$data = array();
		$name = str_replace("_", " ", $nombre);
		
		$query = $this->Clientes_model->read_name($name);
		if($query != false){
			$datos = array(	'customer_id' 		=> $query->customer_id, 	
							'customer_name' 	=> $query->customer_name,
						   	'customer_phone'	=> $query->customer_phone
							);
			$arr = $datos;
		}else{
			$data['status'] = 'WITHOUT_RESULTS';
			$arr = array('data' => $data);
		}
    	echo json_encode($arr);
	}
	public function suggess()
	{
		header('Access-Control-Allow-Origin: *');
		$data = array();
		$query = $this->Clientes_model->read_all();
		foreach ($query->result() as $row)
		{
			$data[$row->customer_name] = null;
		}
		$arr = array("data"=> $data);
    	echo json_encode($arr);
	}
}
