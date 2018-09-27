<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function saveUser($data)
	{
		$this->cedula = $data['cedula'];
		$this->nombre = $data['nombre'];
		$this->apellido = $data['apellido'];
		$this->telefono = $data['telefono'];
		$this->email = $data['email'];
		$this->direccion = $data['direccion'];
		$this->tipo = $data['tipo'];
		$this->idnivel = $data['idnivel'];

		if($this->db->insert('usuario',$data))
		{
			return 'Data inserted succesfully';
		}else
		{
			return 'Error has ocurred';
		}
	}

	public function updateUser($id,$data)
	{
		$this->cedula = $data['cedula'];
		$this->nombre = $data['nombre'];
		$this->apellido = $data['apellido'];
		$this->telefono = $data['telefono'];
		$this->email = $data['email'];
		$this->direccion = $data['direccion'];
		$this->tipo = $data['tipo'];
		$this->idnivel = $data['idnivel'];

		$this->db->where('idusuario=', $id);
		unset($data['idusuario']);
		$result = $this->db->update('usuario', $data);
		if($result)
		{
			return 'Data updated succesfully';
		}else
		{
			return 'Error has ocurred';
		}
   	}
   	
	function listUsers()
	{
		$query = $this->db->get('usuario');
		return $query->result();
	}

	function loadUser($id)
	{
		$usuario = new stdClass();
		$usuario->idusuario = 0;
		$usuario->cedula = "";
		$usuario->nombre = "";
		$usuario->apellido = "";
		$usuario->telefono = "";
		$usuario->email = "";
		$usuario->direccion = "";
		$usuario->tipo = "";
		$usuario->idnivel = 0;

		$query = $this->db->where("idusuario=",$id);
		$query = $this->db->get("usuario");
		$rs = $query->result();

		if(count($rs)>0){
			$usuario = $rs[0];
		}
		return $usuario;
	}

	function deleteUser($id)
	{
		$result = $this->db->query("delete from `usuario` where idusuario = $id");

		if($result)
		{
			return 'Data deleted succesfully';
		}else
		{
			return 'Error has ocurred';
		}
	}

	function searchUser($keyword)
	{
		$query = $this->db->query("SELECT * FROM `usuario` WHERE nombre LIKE '%$keyword%' OR apellido like '%$keyword%'");
		return $query->result();
	}

}

/* End of file Persona_model.php */
/* Location: ./application/models/Persona_model.php */