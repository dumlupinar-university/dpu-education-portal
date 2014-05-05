<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	function __constructor()
	{
		parent::__constructor();
	}

	public function index()
	{
		$data['status'] = 4;
		$this->load->helper(array('form'));
		$this->load->view('header');
		$this->load->view('menu',$data);
		$this->load->view('content_register');
		$this->load->view('footer');
	}
	
	
}

?>
