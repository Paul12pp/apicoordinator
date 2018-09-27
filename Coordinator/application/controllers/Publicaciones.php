<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
#require APPPATH . 'libraries/Format.php';

class Publicaciones extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Publicacion_model');
	}

	public function post_get()
	{
		$id = $this->uri->segment(3);
		if($id)
		{
			$rs = $this->Publicacion_model->loadPost($id);
		}else
		{
			$rs = $this->Publicacion_model->listPosts();
		}
		$this->response($rs);
	}

	public function post_put()
	{
		$id = $this->uri->segment(3);
		$data = array('idpublicacion' => $this->put('idpublicacion'),
		'contenido' => $this->put('contenido'),
		'fecha' => $this->put('fecha'),
		'idusuario' => $this->put('idusuario')
		);

		$rs = $this->Publicacion_model->updatePost($id,$data);
		$this->response($rs);
	}

	public function post_post()
	{
		$data = array('idpublicacion' => $this->post('idpublicacion'),
		'contenido' => $this->post('contenido'),
		'fecha' => $this->post('fecha'),
		'idusuario' => $this->post('idusuario')
		 );

		$rs = $this->Publicacion_model->savePost($data);
		$this->response($rs);
	}

	public function post_delete()
	{
		$id = $this->uri->segment(3);
		$rs = $this->Publicacion_model->deletePost($id);
		$this->response($rs);
	}

}

/* End of file Publicaciones.php */
/* Location: ./application/controllers/Publicaciones.php */