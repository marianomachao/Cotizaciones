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
        // header("Access-Control-Allow-Origin: *");
        try {
        	$data = $this->Cotizaciones_WS_model->getData($type);
        } catch(Exception $e) {

        	$this->api_return(
	            [
	                'success' => false,
	                'error' => $e->getMessage(),
	            ],
	        408);
        }

        // Cofiguro salida del servicio
        $this->_apiConfig([
        	'type' => ['GET'],
            'key' => ['get', $this->key() ], 
        ]);

        // Devuelvo datos
        $this->api_return(
            array(
                'success' 	=> true,
                'result' 	=> $data,
            ),	
        200);

    }

    /**
     * Check API Key
     *
     * @return key|string
     */
    private function key()
    {
        // use database query for get valid key

        return 1452;
    }


    /**
     * login method 
     *
     * @link [api/user/login]
     * @method POST
     * @return Response|void
     */
    public function login()
    {
        header("Access-Control-Allow-Origin: *");

        // API Configuration
        $this->_apiConfig([
            'methods' => ['POST'],
        ]);

        // you user authentication code will go here, you can compare the user with the database or whatever
        $payload = [
            'id' => "Your User's ID",
            'other' => "Some other data"
        ];

        // Load Authorization Library or Load in autoload config file
        $this->load->library('authorization_token');

        // generte a token
        $token = $this->authorization_token->generateToken($payload);

        // return data
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'token' => $token,
                ],
                
            ],
        200);
    }

    /**
     * view method
     *
     * @link [api/user/view]
     * @method POST
     * @return Response|void
     */
    public function view()
    {
        header("Access-Control-Allow-Origin: *");

        // API Configuration [Return Array: User Token Data]
        $user_data = $this->_apiConfig([
            'methods' => ['POST'],
            'requireAuthorization' => true,
        ]);

        // return data
        $this->api_return(
            [
                'status' => true,
                "result" => [
                    'user_data' => $user_data['token_data']
                ],
            ],
        200);
    }
}