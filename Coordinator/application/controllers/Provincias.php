<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
#require APPPATH . 'libraries/Format.php';

class Provincias extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Provincia_model');
	}

	public function provincia_get()
	{
		$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
		$id = $this->uri->segment(3);
		if($id)
		{
			$rs = $this->Provincia_model->loadProvince($id);
		}else if($keywords)
		{
			$rs = $this->Provincia_model->searchProvince($keywords);
		}
		else
		{
			$rs = $this->Provincia_model->listProvinces();
		}
		$this->response($rs);
	}

}

/* End of file Provincias */
/* Location: ./application/controllers/Provincias */