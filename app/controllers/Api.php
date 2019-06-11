<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/API_Controller.php';

class Api extends API_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Cotizaciones_WS_model');
    }

    
    public function get($type)
    {	

        $this->_apiConfig([
        	'type' => ['GET'],
            'key' => ['get', get_api_key() ], 
        ]);

        try {
        	$data = $this->Cotizaciones_WS_model->get($type);
        } catch(Exception $e) {

        	$this->api_return(
	            [
	                'success' => false,
	                'error' => $e->getMessage(),
	            ],
	        500);

	        return false;
        }

        // Devuelvo datos
        $this->api_return(
            array(
                'success' 	=> true,
                'result' 	=> $data,
            ),	
        200);

    }

}