<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller {

	public function __construct(){
	    parent::__construct();
			$this->load->model('Sensores_model');
	}

	function index(){
		$data['temphum'] = $this->Sensores_model->sensorTemperatura();
		$this->load->view('templates/header', $data);

		$this->load->view('proyectos/proyectos');
		$this->load->view('templates/footer');
	}
}
