<?php defined('BASEPATH') OR exit('No direct script access allowed');
//controlador que llama al sensor de temperatura
class Sensores extends CI_Controller {
  public function __construct(){
	    parent::__construct();
			$this->load->model('Sensores_model');
	}

  function getSensorTemperatura(){

  }
}