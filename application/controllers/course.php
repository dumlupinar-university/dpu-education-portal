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
		
		$data['header'] = "Courses";
		$data['results'] = $this->course_model->get_list();
		
		$this->load->view('header');
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			$data['header'] = "Courses";
			
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
		$this->load->helper('date');
		$this->load->model('course_model','',TRUE);
		
		$courseDetails['results'] = $this->course_model->get_course($id,-1);
		$this->load->view('header');
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			$now = date('Y-m-d H:i:s', now());
			
			$courseDetails['results'] = $this->course_model->get_course($id,$data['id']);
			$courseDetails['nonresults'] = $this->course_model->get_course_not_confirmed($id,$data['id']);
			$courseDetails['courseId'] = $id;
			$courseDetails['lecstatus'] = $this->course_model->check_status($id,$data['id'],$now);
			$courseDetails['prizes'] = $this->course_model->get_course_prizes($id);
			$courseDetails['comments'] = $this->course_model->get_course_comments($id);
			$courseDetails['pointofuser'] = $this->course_model->get_course_point_of_user($id,$data['id']);
			
			if ( $data['authority'] == 0 )
			{
		
			}
			else if ( $data['authority'] == 1 )
			{
				$data['status'] = 1;
				$this->load->view('menu',$data);
				$this->load->view('content_course_detail',$courseDetails);
			}
			else if ( $data['authority'] == 2 )
			{
				$data['status'] = 2;
				$this->load->view('menu',$data);
				$this->load->view('content_course_detail',$courseDetails);
			}
			else if ( $data['authority'] == 3 )
			{
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('content_course_detail',$courseDetails);
			}
			
		}
		else
		{
			$data['status'] = 4;
			$this->load->view('menu',$data);
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
			
			$data['header'] = "My Courses";
			$data['results'] = $this->course_model->get_teacher_course_list($data['id']);
			$data['nonresults'] = $this->course_model->get_teacher_course_list_not_confirmed($data['id']);
			
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
		$this->load->helper('date');
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
			
			$data['userCredit'] = $this->user_model->get_user_credit($data['id']);
			$data['courseCredit'] = $this->course_model->get_course_credit($id,$validationDate);

			if ( $data['userCredit'] >= $data['courseCredit'] )
			{
				$data['course'] = $id;
				$data['validationDate'] = $validationDate;
				$data['buyingdate'] = date('Y-m-d H:i:s', now());
				
				$buyingDate = date('Y-m-d H:i:s', now());
				$buyingDateTimestamp = strtotime($buyingDate);
				
				if ( $validationDate == 3 ) 
				{
					$validateDate = strtotime("+3 months", $buyingDateTimestamp);
				}
				else if ( $validationDate == 6 ) 
				{
					$validateDate = strtotime("+6 months", $buyingDateTimestamp);
				}
				else if ( $validationDate == 12 ) 
				{
					$validateDate = strtotime("+12 months", $buyingDateTimestamp);
				}
				
				$validateDate = date('Y-m-d H:i:s', $validateDate);;
				$data['validate'] = $validateDate;
				
				if ( $data['authority'] == 0 )
				{
					redirect('home','refresh');
				}
				else if ( $data['authority'] == 1 )
				{
					$data['status'] = 1;
					$this->load->view('menu',$data);
					$this->course_model->buy_course_now($data);
					$this->load->view('content_buy_course_successfull',$data);
					
				}
				else if ( $data['authority'] == 2 )
				{
					$data['status'] = 2;
					$this->load->view('menu',$data);
					$this->course_model->buy_course_now($data);
					$this->load->view('content_buy_course_successfull',$data);
				}
				else
				{
					redirect('home','refresh');
				}
			}
			else
			{
				if ( $data['authority'] == 0 )
				{
					redirect('home','refresh');
				}
				else if ( $data['authority'] == 1 )
				{
					$data['status'] = 1;
					$this->load->view('menu',$data);
					$this->load->view('content_buy_course_unsuccessfull',$data);
					
				}
				else if ( $data['authority'] == 2 )
				{
					$data['status'] = 2;
					$this->load->view('menu',$data);
					$this->load->view('content_buy_course_unsuccessfull',$data);
				}
				else
				{
					redirect('home','refresh');
				}
			}
			
		}
		else
		{
			redirect('home','refresh');
		}
		
		$this->load->view('footer');
	}
	
	function purchased()
	{
		$this->load->view('header');
		$this->load->model('course_model','',TRUE);
		$this->load->helper('date');
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			$now = date('Y-m-d H:i:s', now());
			
			$data['results'] = $this->course_model->get_purchased_list($data['id'],$now);
			$data['header'] = "Purchased Courses";
			
			
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
