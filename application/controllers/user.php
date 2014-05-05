<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class User extends CI_Controller {

	function __constructor()
	{
		parent::__constructor();
	}

	public function get_user($id)
	{
		$this->load->model('user_model','',TRUE);
		
		$userDetails["results"] = $this->user_model->get_user($id);
		$userDetails["infos"] = $this->user_model->get_user_infos($id);
		
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
				$userDetails['status'] = 1;
				$this->load->view('menu',$userDetails);
				$this->load->view('content_user_detail',$userDetails);
			}
			else if ( $data['authority'] == 2 )
			{
				$userDetails['status'] = 2;
				$this->load->view('menu',$userDetails);
				$this->load->view('content_user_detail',$userDetails);
			}
			else if ( $data['authority'] == 3 )
			{
				$userDetails['status'] = 3;
				$this->load->view('menu',$userDetails);
				$this->load->view('content_user_detail',$userDetails);
			}
			
		}
		else
		{
			$userDetails['status'] = 4;
			$this->load->view('menu',$userDetails);
			$this->load->view('content_user_detail',$userDetails);
		}
		
		$this->load->view('footer');
	}
	
	public function get_teacher($id)
	{
		$this->load->model('user_model','',TRUE);
		
		$userDetails['results'] = $this->user_model->get_teacher($id);
		
		$this->load->model('course_model','',TRUE);
		
		$userDetails['courses'] = $this->course_model->get_teacher_course_list($id);
		
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
				$userDetails['status'] = 1;
				$this->load->view('menu',$userDetails);
				$this->load->view('content_teacher_detail',$userDetails);
			}
			else if ( $data['authority'] == 2 )
			{
				$userDetails['status'] = 2;
				$this->load->view('menu',$userDetails);
				$this->load->view('content_teacher_detail',$userDetails);
			}
			else if ( $data['authority'] == 3 )
			{
				$userDetails['status'] = 3;
				$this->load->view('menu',$userDetails);
				$this->load->view('content_teacher_detail',$userDetails);
			}
			
		}
		else
		{
			$userDetails['status'] = 4;
			$this->load->view('menu',$userDetails);
			$this->load->view('content_teacher_detail',$userDetails);
		}
		
		$this->load->view('footer');
	}
	
	public function get_user_list()
	{
		$this->load->view('header');
		
		$this->load->model('user_model','',TRUE);
				
		$data['list'] = $this->user_model->get_user_list();
		$data['header'] = "User List";
		
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
				$this->load->view('content_user_list',$data);
			}
			else if ( $data['authority'] == 2 )
			{
				$data['status'] = 2;
				$this->load->view('menu',$data);
				$this->load->view('content_user_list',$data);
			}
			else if ( $data['authority'] == 3 )
			{
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('content_user_list',$data);
			}
			
		}
		else
		{
			$data['status'] = 4;
			$this->load->view('menu',$data);
			$this->load->view('content_user_list',$data);
		}
		
		$this->load->view('footer');
	}
	
	public function get_teacher_list()
	{
		$this->load->view('header');
		
		$this->load->model('user_model','',TRUE);
				
		$data['list'] = $this->user_model->get_teacher_list();
		$data['header'] = "Teacher List";
		
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
				$this->load->view('content_teacher_list',$data);
			}
			else if ( $data['authority'] == 2 )
			{
				$data['status'] = 2;
				$this->load->view('menu',$data);
				$this->load->view('content_teacher_list',$data);
			}
			else if ( $data['authority'] == 3 )
			{
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('content_teacher_list',$data);
			}
			
		}
		else
		{
			$data['status'] = 4;
			$this->load->view('menu',$data);
			$this->load->view('content_teacher_list',$data);
		}
		
		$this->load->view('footer');
	}
	
	public function get_profile()
	{
		
		$this->load->view('header');
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			$this->load->model('user_model','',TRUE);
			
			$userDetails["results"] = $this->user_model->get_user($data['id']);
			$userDetails["infos"] = $this->user_model->get_user_infos($data['id']);
			
			if ( $data['authority'] == 0 )
			{

			}
			else if ( $data['authority'] == 1 )
			{
				$userDetails['status'] = 1;
				$this->load->view('menu',$userDetails);
				$this->load->view('content_user_detail',$userDetails);
			}
			else if ( $data['authority'] == 2 )
			{		
				$userDetails['status'] = 2;
				$this->load->view('menu',$userDetails);
				$this->load->view('content_user_detail',$userDetails);
			}
			else if ( $data['authority'] == 3 )
			{
				$userDetails['status'] = 3;
				$this->load->view('menu',$userDetails);
				$this->load->view('content_user_detail',$userDetails);
			}
			
		}
		else
		{
			redirect('home','refresh');
		}
		
		$this->load->view('footer');
	}
	
	public function edit_profile()
	{
		
		$this->load->view('header');
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			$this->load->model('user_model','',TRUE);
			$userDetails["results"] = $this->user_model->get_user($data['id']);
			$userDetails["infos"] = $this->user_model->get_user_infos($data['id']);
			
			if ( $data['authority'] == 0 )
			{

			}
			else if ( $data['authority'] == 1 )
			{
				$userDetails['status'] = 1;
				$this->load->view('menu',$userDetails);
				$this->load->view('content_user_detail',$userDetails);
			}
			else if ( $data['authority'] == 2 )
			{		
				$userDetails['status'] = 2;
				$this->load->view('menu',$userDetails);
				$this->load->view('content_user_detail',$userDetails);
			}
			else if ( $data['authority'] == 3 )
			{
				$userDetails['status'] = 3;
				$this->load->view('menu',$userDetails);
				$this->load->view('content_user_detail',$userDetails);
			}
			
		}
		else
		{
			redirect('home','refresh');
		}
		
		$this->load->view('footer');
	}
	
	function activate($email,$code)
	{
		$this->load->view('header');
		$this->load->view('menu');
		
		if( $this->session->userdata('logged_in') )
		{
			redirect('home','refresh');	
		}
		else
		{
			$this->load->model('user_model','',TRUE);
			
			if ( $this->user_model->activate($email,$code) )
			{
				redirect('login','refresh');
			}
			else
				redirect('home','refresh');
		}
		
		$this->load->view('footer');
		
	}

	function become_teacher()
	{
		$this->load->view('header');
		$this->load->helper(array('form'));
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			
			if ( $data['authority'] == 1 )
			{
				$data['status'] = 1;
				$this->load->view('menu',$data);
				$this->load->view('content_become_teacher',$data);
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
