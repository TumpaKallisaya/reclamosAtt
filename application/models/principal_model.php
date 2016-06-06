<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal_model extends CI_Model{
	public function guardarForm1($arrayFormulario1){
		$this->db->insert($this->t_p_operador_movil, $arrayFormulario1);
        return $this->db->insert_id();
	}

	//tiene que haber otro metodo para guardar  el formulario 2 y otro para el 3, son similares pero las tablas donde se guardan cambian
}