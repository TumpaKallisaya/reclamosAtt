<?php

if ( ! defined('BASEPATH')) exit('No se permite el acceso directo a las p&aacute;ginas de este sitio.');

class Servidor_nusoap extends CI_Controller{
	function __construct(){
		parent::__construct();

		$this->load->library('nu_soap');
		$this->NuSoap_server = new nusoap_server();

		//$end_point = base_url().index_page().'/servidor_nusoap/index/wsdl';
		//$this->NuSoap_server->configureWSDL('UsuariosWSDL', 'urn:UsuariosWSDL', $end_point, 'rpc');
      $this->NuSoap_server->configureWSDL('UsuariosWSDL', 'urn:UsuariosWSDL');

		$this->NuSoap_server->wsdl->addComplexType(
			'Usuarios',
			'complexType',
			'array',
			'',
			'SOAP-ENC:Array',
			array(
				'id' => array('name' => 'id', 'type' => 'xsd:int'),
				'nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
				'apellidos' => array('name' => 'apellidos', 'type' => 'xsd:string')
			)
		);

		$this->NuSoap_server->register(
			'servidor_nusoap..obtenerUsuario',
			array('id' => 'xsd:int'),
			array('return' => 'tns:Usuarios'),
   			'urn:UsuariosWSDL',
   			'urn:UsuariosWSDL#obtenerUsuario',
   			'rpc',
   			'encoded',
   			'Provee el nombre completo de un usuario del cual se conoce su ID.'
		   );
	}

	function index(){
		$_SERVER['QUERY_STRING'] = '';

		if($this->uri->segment(3) == 'wsdl'){
			$_SERVER['QUERY_STRING'] = 'wsdl';
		}

		$this->NuSoap_server->service(file_get_contents('php://input'));
	}

	function obtenerUsuario($id_usuario){
		$row = array(
         array(
				'id' => $id_usuario,
				'nombre' => 'Ultiminio',
				'apellidos' => 'Ramos Galan'
         )
		);

		return $row;
	}
}