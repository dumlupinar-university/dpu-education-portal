<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __constructor()
	{
		parent::__constructor();
	}

	public function index()
	{
		$this->load->helper(array('form'));
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('content_login');
		$this->load->view('footer');
	}
	
}

?>
