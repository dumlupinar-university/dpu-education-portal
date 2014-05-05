<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Home extends CI_Controller {

	function __constructor()
	{
		parent::__constructor();
	}

	public function index()
	{
		$this->load->view('header');
		
		$this->load->model('course_model','',TRUE);
		
		$data['lastcourses'] = $this->course_model->get_last_three_course();
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			
			if ( $data['authority'] == 0 )
			{
				
			
			}
			else if ( $data['authority'] == 1 )
			{
				$this->load->view('menu_student');
				$this->load->view('content_student',$data);
			}
			else if ( $data['authority'] == 2 )
			{
				$this->load->view('menu_teacher');
				$this->load->view('content_teacher',$data);
			}
			else
			{
				$this->load->view('menu_admin');
				$this->load->view('content_admin',$data);
			}
			
		}
		else
		{
			$this->load->view('menu');
			$this->load->view('content',$data);
		}
		
		$this->load->view('footer');
	}
	
	public function register()
	{
		redirect('register','refresh');
	}
	
	public function login()
	{
		redirect('login','refresh');
	}
	
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home','refresh');
	}	
	
}

?>
