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
 
		$this->form_validation->set_rules('terms', 'Terms', 'required');
		$this->form_validation->set_rules('cv', 'Cv', 'xss_clean|callback_cv_upload');
		

		if( $this->form_validation->run() == FALSE )
		{
			$data['status'] = 1;
			$this->load->view('header');
			$this->load->view('menu',$data);
			$this->load->view('content_become_teacher');
			$this->load->view('footer');
		}
		else
		{
			
		}

	}
	
	function add_to_database($data)
	{
		$cvName = explode('.',$_FILES['cv']['name']);
		
		$cv = array(
				'user' => $data['id'],
				'cv' => $data['id'].'.'.$cvName[1]		
		);
		
		$this->user_model->become_teacher($cv);
		$this->successfull($data);
	}
	
	
	
	function cv_upload()
	{
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['name'] = $session_data['name'];
			$data['surname'] = $session_data['surname'];
			$data['id'] = $session_data['id'];
			
			$config['file_name'] = $data['id'];
			
			if ( $data['authority'] == 0 )
			{
				
			}
			else if ( $data['authority'] == 1 )
			{
				$config['upload_path']   =   "cv/";
				$config['allowed_types'] =   "pdf"; 
				$config['max_size']      =   "5000";
				$config['max_width']     =   "1000";
				$config['max_height']    =   "1000";
				$this->load->library('upload',$config);

				if(!$this->upload->do_upload('cv'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$finfo = $this->upload->data();
					$this->add_to_database($data);
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
			$data['status'] = 1;
			$this->load->view('header');
			$this->load->view('menu',$data);
			$this->load->view('content_become_teacher_successfull');
			$this->load->view('footer');
	}

	
}
?>
