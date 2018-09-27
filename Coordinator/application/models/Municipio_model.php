<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipio_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function loadMunicipio($id)
	{
		$municipio = new stdClass();
		$municipio->idmunicipio = 0;
		$municipio->nombre = "";
		$municipio->idprovincia = 0;
		$string = is_string($id);
		/*if($string==1)
		{
			$query = $this->db->where("nombre=", $id);
		}else
		{
			$query = $this->db->where("idmunicipio=", $id);
		}*/
		$query = $this->db->where("idmunicipio=", $id);
		$query = $this->db->get('municipio');

		$rs = $query->result();

		if(count($rs)>0)
		{
			$municipio = $rs[0];
		}

		return $municipio;
	}

	function listMunicipios()
	{
		$query = $this->db->get('municipio');
		return $query->result();
	}

	function searchMunicipio($keyword)
	{
		$query = $this->db->query("SELECT * FROM `municipio` WHERE nombre LIKE '%$keyword%'");
		return $query->result();
	}

}

/* End of file Sector_model.php */
/* Location: ./application/models/Sector_model.php */