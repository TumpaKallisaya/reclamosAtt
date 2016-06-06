<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{

		$this->load->view('menu_view');
	}

	public function irFormulario1(){
		$this->load->view('formulario1_view');
	}
	public function irFormulario2(){
		$this->load->view('formulario2_view');
	}
	public function irFormulario3(){
		$this->load->view('formulario3_view');
	}

	public function guardarFormulario1(){
		$arrayFormulario1 = array(
			'razon_social' => $this->input->post('razonSocial'),
			'representante_legal' => $this->input->post('representanteLegal'),
			'datos_contacto' => $this->input->post('datosContacto'),
			'direccion' => $this->input->post('direccion')
		);
		

		$this->principal_model->guardarForm1($arrayFormulario1);
	}

	public function guardarFormulario2(){
		$arrayFormulario2 = array(
			'ci' => $this->input->post('ci'),
			'nombres' => $this->input->post('nombres'),
			'ap_paterno' => $this->input->post('apPaterno'),
			'ap_materno' => $this->input->post('apMaterno'),
			'ap_casada' => $this->input->post('apCasada'),
			'fecha_nacimiento' => $this->input->post('fechaNacimiento')
		);
		

		$this->principal_model->guardarForm2($arrayFormulario2); // tiene que haber otro metodo en el modelo para guardar que se llame guardarForm2
	}
}

