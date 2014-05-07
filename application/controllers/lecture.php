<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Lecture extends CI_Controller {

	function __constructor()
	{
		parent::__constructor();
		
	}

	function get_lecture_list($course)
	{
		
		$this->load->view('header');
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			$this->load->model('lecture_model','',TRUE);
			
			$data['header'] = "Lectures";
			
			$data['lecstatus'] = $this->lecture_model->get_lecture_status($course,$data['id']);
			
			if ( !$this->lecture_model->get_list($course,$data['id']) )
			{
				redirect('home','refresh');
			}
			else
			{
				$data['results'] = $this->lecture_model->get_list($course,$data['id']);
			
				if ( $data['authority'] == 0 )
				{
					redirect('home','refresh');
				}
				else if ( $data['authority'] == 1 )
				{
					$data['status'] = 1;
					$this->load->view('menu',$data);
					$this->load->view('content_lecture_list',$data);
				}
				else if ( $data['authority'] == 2 )
				{
					$data['status'] = 2;
					$this->load->view('menu',$data);
					$this->load->view('content_lecture_list',$data);
				}
				else if ( $data['authority'] == 3 )
				{
					$data['status'] = 3;
					$this->load->view('menu',$data);
					$this->load->view('content_lecture_list',$data);
				}
			}
		}
		else
		{
			redirect('login','refresh');
		}
		
		$this->load->view('footer');
		
	}
	
	function get_lecture($id)
	{	
		$this->load->view('header');
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			$this->load->model('lecture_model','',TRUE);
			
			if ( !$this->lecture_model->get_lecture($id,$data['id']) )
			{
				redirect('home','refresh');
			}
			else
			{
				$lecture['result'] = $this->lecture_model->get_lecture($id,$data['id']);
				
				if ( $data['authority'] == 0 )
				{
					redirect('home','refresh');
				}
				else if ( $data['authority'] == 1 )
				{
					$data['status'] = 1;
					$this->load->view('menu',$data);
					$this->load->view('content_lecture_detail',$lecture);
				}
				else if ( $data['authority'] == 2 )
				{
					$data['status'] = 2;
					$this->load->view('menu',$data);
					$this->load->view('content_lecture_detail',$lecture);
				}
				else if ( $data['authority'] == 3 )
				{
					$data['status'] = 3;
					$this->load->view('menu',$data);
					$this->load->view('content_lecture_detail',$lecture);
				}
			}
		}
		else
		{
			redirect('login','refresh');
		}
		
		$this->load->view('footer');
	}
	
	function add_lecture($course)
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
			
			$data['course'] = $course;
			
			if ( $data['authority'] == 2 )
			{
				$data['status'] = 2;
				$this->load->view('menu',$data);
				$this->load->view('content_addlecture',$data);
			}
			else if ( $data['authority'] == 3 )
			{
				$data['status'] = 3;
				$this->load->view('menu',$data);
				$this->load->view('content_addlecture',$data);
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
