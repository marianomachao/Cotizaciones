<?php
class Home extends CI_Controller {

	private $view_data = array();

	public function index()
	{
		$this->loadPartials();
		$this->load->view('index', $this->view_data);
	}

	private function loadPartials() {
		$url_data = array( 'assets_url' => $this->config->item('assets_url'));
		$this->view_data['head'] = $this->load->view('partials/head', $url_data, true);
		$this->view_data['header'] = $this->load->view('partials/header', $url_data, true);
		$this->view_data['footer'] = $this->load->view('partials/footer', $url_data, true);
		$this->view_data['javascript'] = $this->load->view('partials/javascript', $url_data, true);
	}
}
