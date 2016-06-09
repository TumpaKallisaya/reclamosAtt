<?php 

class Dispositivo_movil_model extends CI_Model{

	function __construct(){
		parent::__construct();
		//$this->load->database();
	}

	function guardar_t_r_dispositivo_movil($arrayDispositivoMovil){
		
		echo 'llego hasta el modelo';
		$this->db->insert('IMEI_T_R_DISPOSITIVO_MOVIL', $arrayDispositivoMovil);
	}
}