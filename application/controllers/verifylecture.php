<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class VerifyLecture extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('lecture_model','',TRUE);
		$this->load->model('course_model','',TRUE);
	}

	function index()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');
 
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('course', 'Course', 'trim|required|xss_clean|callback_check_course');
		$this->form_validation->set_rules('video', 'Video', 'trim|xss_clean|callback_video_upload');
		$this->form_validation->set_rules('description', 'Description', 'xss_clean');
		

		if( $this->form_validation->run() == FALSE )
		{
			$this->load->view('header');
			$this->load->view('menu_teacher');
			$this->load->view('content_addlecture');
			$this->load->view('footer');
		}
		else
		{
			
		}

	}
	
	public function add_to_database($data2)
	{
		$key = $data2['file_name'];
		
		$data = array(
				'name' => $this->input->post('name'),
				'course' => $this->input->post('course'),
				'key' => $key,
				'description' => $this->input->post('description')
			);
							
		$this->lecture_model->add_lecture($data);
		$this->successfull($data);
	}
	
	public function check_course($course)
	{
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['id'] = $session_data['id'];
			
			if ( $data['authority'] == 2 || $data['authority'] == 3 )
			{
				$teacher = $data['id'];
		
				$result = $this->course_model->check_teacher_course($teacher,$course);
		
				if ( $result )
				{
					$name = $this->input->post('name');
					
					$result = $this->lecture_model->check_lecture($course,$name);
					
					if ($result)
					{	
					    return true;
					}
					else 
					{
						$this->form_validation->set_message('check_database', 'This Course Has The Lecture With The Same Name');
						return false;
					}
					
				}
				else
				{
					$this->form_validation->set_message('check_database', 'This Teacher Hasnt Ownder of this course');
					return false;
				}	
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
		

	}
	
	public function successfull($data)
	{
		$this->load->view('header');
		$this->load->view('menu_teacher');
		$this->load->view('content_addlecture_successfull',$data);
		$this->load->view('footer');
	}

	function video_upload()
    {
		
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
	
			$config['file_name'] = random_string('alnum',16);
			
			if ( $data['authority'] == 0 )
			{
				redirect('home','refresh');
			}
			else if ( $data['authority'] == 1 )
			{
				redirect('home','refresh');
			}
			else if ( $data['authority'] == 2 )
			{
				$config['upload_path']   =   "videos/";
				$config['allowed_types'] =   "mp4|avi|flv|wmv"; 
				$config['max_size']      =   "20000000";
				
				$this->load->library('upload',$config);

				if(!$this->upload->do_upload('video'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$finfo = $this->upload->data();
					$data['uploadInfo'] = $finfo;
					$this->add_to_database($data['uploadInfo']);
				}
			}
			else
			{
				
				$config['upload_path']   =   "videos/";
				$config['allowed_types'] =   "mp4|avi|flv|wmv"; 
				$config['max_size']      =   "20000000";
				
				$this->load->library('upload',$config);
				
				if(!$this->upload->do_upload('video'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$finfo = $this->upload->data();
					$data['uploadInfo'] = $finfo;
					$this->add_to_database($data);
				}
			}
		}
		else
		{
			redirect('home','refresh');
		}
		
	}

}
?>
