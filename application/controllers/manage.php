<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Manage extends CI_Controller {

	function __constructor()
	{
		parent::__constructor();
	}

	public function index()
	{
		$this->load->view('header');
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			if ( $data['authority'] == 3 )
			{	
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('manage_admin',$data);
			}
			else 
			{
				redirect('home','refresh');
			}
			
		}
		else
		{
			redirect('home','refresh');
		}
		
		$this->load->view('footer');
	}
	
	public function user_list()
	{
		$this->load->view('header');
		
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			if ( $data['authority'] == 3 )
			{
				$this->load->model('user_model','',TRUE);
				
				$data['list'] = $this->user_model->get_user_list();
				$data['header'] = "User List";
				
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('manage_admin_user',$data);
			}
			else 
			{
				redirect('home','refresh');
			}
			
		}
		else
		{
			redirect('home','refresh');
		}
		
		$this->load->view('footer');
	}
	
	public function course_list()
	{
		$this->load->view('header');
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			if ( $data['authority'] == 3 )
			{
				$this->load->model('course_model','',TRUE);
				
				$data['list'] = $this->course_model->get_full_course_list();
				$data['header'] = "Course List";
				
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('manage_admin_course',$data);
			}
			else 
			{
				redirect('home','refresh');
			}
		}
		else
		{
			redirect('home','refresh');
		}
		
		$this->load->view('footer');
	}
	
	public function lecture_list()
	{
		$this->load->view('header');
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			if ( $data['authority'] == 3 )
			{
				$this->load->model('lecture_model','',TRUE);
				
				$data['list'] = $this->lecture_model->get_full_lecture_list();
				$data['header'] = "Lecture List";
				
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('manage_admin_lecture',$data);
			}
			else 
			{
				redirect('home','refresh');
			}
		}
		else
		{
			redirect('home','refresh');
		}
		
		$this->load->view('footer');
	}
}

?>
