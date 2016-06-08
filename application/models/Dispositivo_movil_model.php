<?php 

class Dispositivo_movil_model extends CI_Model{

	function __construct(){
		parent::__construct();
		//$this->load->database();
	}

	function guardar_t_r_dispositivo_movil($arrayDispositivoMovil){
		$this->db->trans_begin();
		echo 'llego hasta el modelo';
		$this->db->insert('imei.imei_t_r_dispositivo_movil', $arrayDispositivoMovil);


		    $this->db->trans_commit();
		
	}
}