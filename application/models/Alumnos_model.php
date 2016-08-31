<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function read_all(){
		$query = $this->db->query('SELECT *
                                   FROM alumnos
                                   ORDER BY alumno_nombre');
		if($query -> num_rows() > 0) return $query;
		else return false;
	}
    function read_name($name){
        $this->db->where('alumnos_name', $name);
        $query = $this->db->get('alumnos');
        $result = $query->row();
        if($query -> num_rows() > 0) return $result;
        else return false;
    }
    function read($id){
        $this->db->where('alumnos_id', $id);
        $query = $this->db->get('alumnos');
        $result = $query->row();
        if($query -> num_rows() > 0) return $result;
        else return false;
    }
    
}