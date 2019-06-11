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

        /*
			Llama a getDataFromWS y aplica la logica de negocio al array obtenido.
			El servicio web externo solo devuelve valores históricos, por lo tanto toma el elemento correspondiente a la cotizacion del ultimo dia, lo formatea y lo devuelve.
        */
        public function get($type) {

        	$data = $this->getDataFromWS($type);
        	$data = json_decode($data);

        	if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
        		throw new Exception('Los datos devueltos por el WS son inválidos.');
        	}

        	if (count($data) == 0) {
        		throw new Exception('El WS no devolvió ningun dato.');
        	}

        	$ultima_cotizacion = array_pop($data);

        	$response = array();
        	$response['cotizacion'] = $ultima_cotizacion->v;
        	$response['ultima_fecha'] = $ultima_cotizacion->d;

        	return $response;
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