<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Course extends CI_Controller {

	function __constructor()
	{
		parent::__constructor();
		
	}

	public function index()
	{
		$this->load->model('course_model','',TRUE);
		
		$data['results'] = $this->course_model->get_list();
		
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
				$this->load->view('menu_student');
				$this->load->view('content_courses_student',$data);
			}
			else if ( $data['authority'] == 2 )
			{
				$this->load->view('menu_teacher');
				$this->load->view('content_courses_teacher',$data);
			}
			else
			{
				$this->load->view('menu_admin');
				$this->load->view('content_courses',$data);
			}
			
		}
		else
		{
			$this->load->view('menu');
			$this->load->view('content_courses',$data);
		}
		
		$this->load->view('footer');
	}
	
	public function add_course()
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
			
			if ( $data['authority'] == 2 )
			{
				$this->load->view('menu_teacher');
				$this->load->view('content_addcourse',$data);
			}
			else if ( $data['authority'] == 3 )
			{
				$this->load->view('menu_admin');
				$this->load->view('content_addcourse',$data);
			}
			else
			{
				redirect('course','refresh');
			}
			
		}
		else
		{
			redirect('course','refresh');
		}
		
		$this->load->view('footer');
	}
	
	public function get_course($id)
	{
		$this->load->model('course_model','',TRUE);
		
		$courseDetails['results'] = $this->course_model->get_course($id);
		$courseDetails['status'] = 0;
		
		$this->load->view('header');
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			$courseDetails['status'] = $this->course_model->check_status($id,$data['id']);
			
			if ( $data['authority'] == 0 )
			{
		
			}
			else if ( $data['authority'] == 1 )
			{
				$this->load->view('menu_student');
				$this->load->view('content_course_detail',$courseDetails);
			}
			else if ( $data['authority'] == 2 )
			{
				$this->load->view('menu_teacher');
				$this->load->view('content_course_detail',$courseDetails);
			}
			else
			{
				$this->load->view('menu_admin');
				$this->load->view('content_course_detail',$courseDetails);
			}
			
		}
		else
		{
			$this->load->view('menu');
			$this->load->view('content_course_detail',$courseDetails);
		}
		
		$this->load->view('footer');
	}
	
	function my_courses()
	{
		$this->load->model('course_model','',TRUE);
		
		$this->load->view('header');
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			$data['results'] = $this->course_model->get_teacher_course_list($data['id']);
			
			if ( $data['authority'] == 0 )
			{
		
			}
			else if ( $data['authority'] == 1 )
			{
				$this->load->view('menu_student');
				$this->load->view('content_courses',$data);
			}
			else if ( $data['authority'] == 2 )
			{
				$this->load->view('menu_teacher');
				$this->load->view('content_courses',$data);
			}
			else
			{
				$this->load->view('menu_admin');
				$this->load->view('content_courses',$data);
			}
			
		}
		else
		{
			$this->load->view('menu');
			$this->load->view('content_courses',$data);
		}
		
		$this->load->view('footer');
	}
	
	function purchased()
	{
		$this->load->model('course_model','',TRUE);
		
		$this->load->view('header');
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			$data['results'] = $this->course_model->get_purchased_list($data['id']);
			
			if ( $data['authority'] == 0 )
			{
		
			}
			else if ( $data['authority'] == 1 )
			{
				$this->load->view('menu_student');
				$this->load->view('content_courses',$data);
			}
			else if ( $data['authority'] == 2 )
			{
				$this->load->view('menu_teacher');
				$this->load->view('content_courses',$data);
			}
			else
			{
				$this->load->view('menu_admin');
				$this->load->view('content_courses',$data);
			}
			
		}
		else
		{
			$this->load->view('menu');
			$this->load->view('content_courses',$data);
		}
		
		$this->load->view('footer');
	}
	
}

?>
