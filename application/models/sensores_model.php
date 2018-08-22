<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sensores_model extends CI_Model {

  function sensorTemperatura(){
    $query = $this->db->query('SELECT * FROM sensor_temperatura ORDER BY fecha_senso DESC LIMIT 1;');
    if($query->num_rows()>0){
      $results=$query->result_array();
    }
    return $results;
  }
}
?>
