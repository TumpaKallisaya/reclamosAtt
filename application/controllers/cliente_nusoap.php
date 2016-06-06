<?php

if ( ! defined('BASEPATH')) exit('No se permite el acceso directo a las p&aacute;ginas de este sitio.');

class Cliente_nusoap extends CI_Controller{
	function __construct(){
		parent::__construct();

		$this->load->library('nu_soap');
	}

	function index(){

	}

	function traerUsuario(){
		$proxyhost = isset($_POST['proxyhost']) ? $_POST['proxyhost'] : '';
		$proxyport = isset($_POST['proxyport']) ? $_POST['proxyport'] : '';
		$proxyusername = isset($_POST['proxyusername']) ? $_POST['proxyusername'] : '';
		$proxypassword = isset($_POST['proxypassword']) ? $_POST['proxypassword'] : '';

		$this->client = new nusoap_client('http://localhost/reclamosAtt/Servidor_nusoap/index/wsdl', 'wsdl', $proxyhost, $proxyport, $proxyusername, $proxypassword);

		$error = $this->client->getError();
		if($error){
			echo '<h2>Constructor Error</h2><pre>'.$error.'</pre>';
		}

		$call = 'servidor_nusoap..obtenerUsuario';

		$id_usuario = rand(1, 999);
		$parts = array('id' => $id_usuario);

		$result = $this->client->call($call, $parts);

		$this->_manage_response($result, $this->client->fault, $this->client->getError());

		return;

	}

	private function _manage_response($result, $is_fault, $is_error){
		if($is_fault){
			echo '<h2>Falla:</h2><pre>';
			print_r($result);
			echo '</pre>';
			echo '<h2>Request</h2><pre>'.htmlspecialchars($this->client->request, ENT_QUOTES).'</pre>';
			echo '<h2>Response</h2><pre>'.htmlspecialchars($this->client->response, ENT_QUOTES).'</pre>';
			echo '<h2>Debug</h2><pre>'.htmlspecialchars($this->client->debug_str, ENT_QUOTES).'</pre>';
		}else{
			if($is_error){
				echo '<h2>Error:</h2><pre>'.$is_error.'</pre>';
				echo '<h2>Request</h2><pre>'.htmlspecialchars($this->client->request, ENT_QUOTES).'</pre>';
				echo '<h2>Response</h2><pre>'.htmlspecialchars($this->client->response, ENT_QUOTES).'</pre>';
				echo '<h2>Debug</h2><pre>'.htmlspecialchars($this->client->debug_str, ENT_QUOTES).'</pre>';
			}else{
				echo '<h2>Resultado:</h2><pre>';
				print_r($result);
				echo '</pre>';
			}
		}
		return;
	}
}