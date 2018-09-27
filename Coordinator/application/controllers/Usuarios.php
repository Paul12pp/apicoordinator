<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
#require APPPATH . 'libraries/Format.php';

class Usuarios extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Usuario_model');
	}

	public function user_get()
    {
        $keywords = isset($_GET["s"]) ? $_GET["s"] : "";
        $id = $this->uri->segment(3);
        if($id)
        {
            $rs = $this->Usuario_model->loadUser($id);
        }else if($keywords)
        {
            $rs = $this->Usuario_model->searchUser($keywords);
        }else
        {
            $rs = $this->Usuario_model->listUsers();
        }
        $this->response($rs);	
    }

    public function user_put()
    {
        $id = $this->uri->segment(3);
        $data =  array('idusuario' => $this->put('idusuario'),
        'cedula' => $this->put('cedula'),
        'nombre' => $this->put('nombre'),
        'apellido' => $this->put('apellido'),
        'telefono' => $this->put('telefono'),
        'email' => $this->put('email'),
        'direccion' => $this->put('direccion'),
        'tipo' => $this->put('tipo'),
        'idnivel' => $this->put('idnivel'),
        );
        $rs = $this->Usuario_model->updateUser($id,$data);
        $this->response($rs);
    }

    public function user_post()
    {
       $data =  array('idusuario' => $this->post('idusuario'),
        'cedula' => $this->post('cedula'),
        'nombre' => $this->post('nombre'),
        'apellido' => $this->post('apellido'),
        'telefono' => $this->post('telefono'),
        'email' => $this->post('email'),
        'direccion' => $this->post('direccion'),
        'tipo' => $this->post('tipo'),
        'idnivel' => $this->post('idnivel'),
        );
       $rs = $this->Usuario_model->saveUser($data);
       $this->response($rs);
    }
    
    public function user_delete()
    {
        $id = $this->uri->segment(3);
        $rs = $this->Usuario_model->deleteUser($id);
        $this->response($rs);
    }
}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */