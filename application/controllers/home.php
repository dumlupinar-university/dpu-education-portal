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
				$data['status'] = 1;
				$this->load->view('menu',$data);
				$this->load->view('content',$data);
			}
			else if ( $data['authority'] == 2 )
			{
				$data['status'] = 2;
				$this->load->view('menu',$data);
				$this->load->view('content',$data);
			}
			else if ( $data['authority'] == 3 )
			{
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('content',$data);
			}
			
		}
		else
		{
			$data['status'] = 4;
			$this->load->view('menu',$data);
			$this->load->view('content',$data);
		}
		
		$this->load->view('footer');
	}
	
	public function aboutus()
	{
		$this->load->view('header');
		
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
				$data['status'] = 1;
				$this->load->view('menu',$data);
				$this->load->view('content_aboutus',$data);
			}
			else if ( $data['authority'] == 2 )
			{
				$data['status'] = 2;
				$this->load->view('menu',$data);
				$this->load->view('content_aboutus',$data);
			}
			else if ( $data['authority'] == 3 )
			{
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('content_aboutus',$data);
			}
			
		}
		else
		{
			$data['status'] = 4;
			$this->load->view('menu',$data);
			$this->load->view('content_aboutus',$data);
		}
		
		$this->load->view('footer');
	}
	
	public function contact()
	{
		$this->load->view('header');
		
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
				$data['status'] = 1;
				$this->load->view('menu',$data);
				$this->load->view('content_contact',$data);
			}
			else if ( $data['authority'] == 2 )
			{
				$data['status'] = 2;
				$this->load->view('menu',$data);
				$this->load->view('content_contact',$data);
			}
			else if ( $data['authority'] == 3 )
			{
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('content_contact',$data);
			}
			
		}
		else
		{
			$data['status'] = 4;
			$this->load->view('menu',$data);
			$this->load->view('content_contact',$data);
		}
		
		$this->load->view('footer');
	}
	
	public function support()
	{
		$this->load->view('header');
		
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
				$data['status'] = 1;
				$this->load->view('menu',$data);
				$this->load->view('content_support',$data);
			}
			else if ( $data['authority'] == 2 )
			{
				$data['status'] = 2;
				$this->load->view('menu',$data);
				$this->load->view('content_support',$data);
			}
			else if ( $data['authority'] == 3 )
			{
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('content_support',$data);
			}
			
		}
		else
		{
			$data['status'] = 4;
			$this->load->view('menu',$data);
			$this->load->view('content_support',$data);
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
