<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacion_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function savePost($data)
	{
		$this->contenido = $data['contenido'];
		$this->fecha = $data['fecha'];
		$this->idusuario = $data['idusuario'];

		if($this->db->insert('publicacion', $data))
		{
			return 'Data inserted succesfully';
		}else
		{
			return 'Error has ocurred';
		}
	}

	function loadPost($id)
	{
		$publicacion = new stdClass();
		$publicacion->idpublicacion = 0;
		$publicacion->contenido = "";
		$publicacion->fecha = "";
		$publicacion->idusuario = 0;

		$query = $this->db->where("idpublicacion=",$id);
		$query = $this->db->get('publicacion');

		$rs = $query->result();

		if(count($rs)>0)
		{
			$publicacion = $rs[0];
		}
		return $publicacion;
	}

	function listPosts()
	{
		$query = $this->db->get('publicacion');
		return $query->result();
	}

	function updatePost($id,$data)
	{
		$this->contenido = $data['contenido'];
		$this->fecha = $data['fecha'];
		$this->idusuario = $data['idusuario'];

		$this->db->where("idpublicacion=",$id);
		unset($data['idpublicacion']);
		$result = $this->db->update('publicacion',$data);
		if($result)
		{
			return 'Data updated succesfully';
		}else
		{
			return 'Error has ocurred';
		}
	}

	function deletePost($id)
	{
		$result = $this->db->query("delete from `publicacion` where idpublicacion= $id");

		if($result)
		{
			return 'Data deleted succesfully';
		}else
		{
			return 'Error has ocurred';
		}
	}

}

/* End of file Publicacion_model.php */
/* Location: ./application/models/Publicacion_model.php */