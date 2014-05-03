<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class VerifyTeacher extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','',TRUE);
	}

	function index()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');
 
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|xss_clean|callback_check_database');
		$this->form_validation->set_rules('description', 'Description', 'xss_clean');
		

		if( $this->form_validation->run() == FALSE )
		{
			$this->load->view('header');
			$this->load->view('menu_student');
			$this->load->view('content_become_teacher');
			$this->load->view('footer');
		}
		else
		{
			
		}

	}
	
		
	
	public function successfull($dataCourse)
	{
		$this->load->view('header');
		$this->load->view('menu_teacher');
		$this->load->view('content_addcourse_successfull',$dataCourse);
		$this->load->view('footer');
	}

	
}
?>
