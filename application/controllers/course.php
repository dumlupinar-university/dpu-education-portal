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
				$data['status'] = 1;
				$this->load->view('menu',$data);
				$this->load->view('content_courses',$data);
			}
			else if ( $data['authority'] == 2 )
			{
				$data['status'] = 2;
				$this->load->view('menu',$data);
				$this->load->view('content_courses',$data);
			} 
			else if ( $data['authority'] == 3 )
			{
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('content_courses',$data);
			}
			
		}
		else
		{
			$data['status'] = 4;
			$this->load->view('menu',$data);
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
				$data['status'] = 2;
				$this->load->view('menu',$data);
				$this->load->view('content_addcourse',$data);
			}
			else if ( $data['authority'] == 3 )
			{
				$data['status'] = 3;
				$this->load->view('menu',$data);
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
		$this->load->view('header');
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			$courseDetails['status'] = $this->course_model->check_status($id,$data['id']);
			$courseDetails['prizes'] = $this->course_model->get_course_prizes($id);
			
			if ( $data['authority'] == 0 )
			{
		
			}
			else if ( $data['authority'] == 1 )
			{
				$courseDetails['status'] = 1;
				$this->load->view('menu',$courseDetails);
				$this->load->view('content_course_detail',$courseDetails);
			}
			else if ( $data['authority'] == 2 )
			{
				$courseDetails['status'] = 2;
				$this->load->view('menu',$courseDetails);
				$this->load->view('content_course_detail',$courseDetails);
			}
			else if ( $data['authority'] == 3 )
			{
				$courseDetails['status'] = 3;
				$this->load->view('menu',$courseDetails);
				$this->load->view('content_course_detail',$courseDetails);
			}
			
		}
		else
		{
			$courseDetails['status'] = 4;
			$this->load->view('menu',$courseDetails);
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
				$data['status'] = 1;
				$this->load->view('menu',$data);
				$this->load->view('content_courses',$data);
			}
			else if ( $data['authority'] == 2 )
			{
				$data['status'] = 2;
				$this->load->view('menu',$data);
				$this->load->view('content_courses',$data);
			}
			else if ( $data['authority'] == 3 )
			{
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('content_courses',$data);
			}
			
		}
		else
		{
			$data['status'] = 4;
			$this->load->view('menu',$data);
			$this->load->view('content_courses',$data);
		}
		
		$this->load->view('footer');
	}
	
	function buy_course($id,$validationDate)
	{
		$this->load->view('header');
		
		$this->load->model('course_model','',TRUE);
		$this->load->model('user_model','',TRUE);
			
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			if ( $this->user_model->get_user_credit($data['id']) >= $this->course_model->get_course_credit($id,$validationDate) )
			{
				
				if ( $data['authority'] == 0 )
				{
					redirect('home','refresh');
				}
				else if ( $data['authority'] == 1 )
				{
					$data['status'] = 1;
					$this->load->view('menu',$data);
					
				}
				else if ( $data['authority'] == 2 )
				{
					$data['status'] = 2;
					$this->load->view('menu',$data);
					
				}
				else if ( $data['authority'] == 3 )
				{
					$data['status'] = 3;
					$this->load->view('menu',$data);
					
				}
			}
			else
			{
				// you don't have enough credit
			}
			
		}
		else
		{
			$data['status'] = 4;
			$this->load->view('menu',$data);
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
				$data['status'] = 1;
				$this->load->view('menu',$data);
				$this->load->view('content_courses',$data);
			}
			else if ( $data['authority'] == 2 )
			{
				$data['status'] = 2;
				$this->load->view('menu',$data);
				$this->load->view('content_courses',$data);
			}
			else if ( $data['authority'] == 3 )
			{
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('content_courses',$data);
			}
			
		}
		else
		{
			$data['status'] = 4;
			$this->load->view('menu',$data);
			$this->load->view('content_courses',$data);
		}
		
		$this->load->view('footer');
	}
	
}

?>
