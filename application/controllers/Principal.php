<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('dispositivo_movil_model');
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

	public function irFormularioImei(){
		$this->load->view('formularioImei_view');
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

	public function procesarImei(){
		$imeiCompleto = $this->input->post('txtImei');
		
		// se mandaran los datos al API de imei.info
		/*$data = array(
			'login' => 'TumpaKallisaya',
			'password' => 'revblade',
			'imei' => $imeiCompleto
		);*/
		//$urlImei = 'http://www.imei.info/api/checkimei/';
		
		//echo $this->post_to_url($urlImei, $data);
/*
		$this->load->library('simple_html_dom');

		$html = file_get_html('http://www.imei.info/?imei=357376055242138');

		foreach($html->find('p.dots') as $element){
		  	echo $element->innertext . '<br>';
		}*/

/*
		$tac = substr($imeiCompleto, 0,5);
		$fac = substr($imeiCompleto, 5,2);
		$snr = substr($imeiCompleto, 7,6);
		$spare = substr($imeiCompleto, 13,1);

		//echo $imeiCompleto.'<br /> <br />';
		//echo $tac.'<br />';
		//echo $fac.'<br />';
		//echo $snr.'<br />';
		//echo $spare.'<br />';
		$arrayDispositivoMovil = array(
			'ID_MOVIL' => 1,
			'ID_FABRICANTE' => 12,
			'ID_FELCC' => 342,
			'TAC' => $tac,
			'FAC' => $fac,
			'SNR' => $snr,
			'SPARE' => $spare,
			'FECHA_REGISTRO_IMEI' => date('d-m-Y')
		);-*/
		//$this->dispositivo_movil_model->guardar_t_r_dispositivo_movil($arrayDispositivoMovil);

		//$this->index();
	}

	public function post_to_url($url, $data){
		$fields = '';
	   	foreach($data as $key => $value) { 
	      	$fields .= $key . '=' . $value . '&'; 
	   	}
	   	rtrim($fields, '&');

	   	$post = curl_init();

	   	curl_setopt($post, CURLOPT_URL, $url);
	   	curl_setopt($post, CURLOPT_POST, count($data));
	   	curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
	   	curl_setopt($post, CURLOPT_RETURNTRANSFER, true);

	   	$result = curl_exec($post);

	   	if (curl_errno($post)) {
		    // this would be your first hint that something went wrong
		    die('Couldn\'t send request: ' . curl_error($post));
		} else {
		    // check the HTTP status code of the request
		    $resultStatus = curl_getinfo($post, CURLINFO_HTTP_CODE);
		    if ($resultStatus != 200) {
		        die('Request failed: HTTP status code: ' . $resultStatus);
		    }
		}

	   	curl_close($post);
	   	return $result;
    }


}

