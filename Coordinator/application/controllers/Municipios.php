<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
#require APPPATH . 'libraries/Format.php';
class Municipios extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Municipio_model');
	}

	public function municipio_get()
	{
		$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
		$id = $this->uri->segment(3);
		if($id)
		{
			$rs = $this->Municipio_model->loadMunicipio($id);
		}else if($keywords)
		{
			$rs = $this->Municipio_model->searchMunicipio($keywords);
		}
		else
		{
			$rs = $this->Municipio_model->listMunicipioS();
		}
		$this->response($rs);
	}

}

/* End of file Sectores.php */
/* Location: ./application/controllers/Sectores.php */