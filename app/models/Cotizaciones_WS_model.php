<?php

class Cotizaciones_WS_model extends CI_Model {

        private $access_token;
        private $api_url;
        private $types;
       	private $types_endpoints;

        public function __construct()
        {
        	$this->access_token = $this->config->item('bna_access_token');
        	$this->api_url = $this->config->item('api_url');
        	$this->types = $this->config->item('api_types');
        }

        public function get($type) {
        	$data = $this->getDataFromWS($type);
        }

        /*
        	Trae los datos desde la API Externa del BNA
        */
        public function getDataFromWS($type) {	

        	// Valido que sea un cotizacion/indicador correcto
        	if(!in_array($type, $this->types)) {
        		throw new Exception('Tipo de cotización inválido.');
        		return array();
        	}

        	$this->api_url .= $type;
        	$opts = [
			    "http" => [
			        "method" => "GET",
			        "header" => "Authorization: BEARER ".$this->access_token."\r\n"
			    ]
			];
			$context = stream_context_create($opts);

			try {
				$data = file_get_contents($this->api_url, false, $context);
			} catch(Exception $e) {
				throw new Exception("Error al intentar obtener los datos del Webservice externo.");
			}

			return $data;
        }

}