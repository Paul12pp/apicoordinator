<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Provincia_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function loadProvince($id)
	{
		$province = new stdClass();
		$province->idprovincia = 0;
		$province->nombre = "";
		$string = is_string($id);
		/*
		if($string==1)
		{
			$query = $this->db->where("nombre=",$id);
		}else
		{
			$query = $this->db->where("idprovincia=",$id);
		}*/
		$query = $this->db->where("idprovincia=",$id);
		$query = $this->db->get("provincia");

		$rs = $query->result();

		if(count($rs)>0)
		{
			$province = $rs[0];
		}

		return $province;
	}

	function listProvinces()
	{
		$query = $this->db->get('provincia');
		return $query->result();
	}

	function searchProvince($keyword)
	{
		$query = $this->db->query("SELECT * FROM `provincia` WHERE nombre LIKE '%$keyword%'");
		return $query->result();
	}

}

/* End of file Provincia_model */
/* Location: ./application/models/Provincia_model */