<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class VerifyCourse extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('course_model','',TRUE);
	}

	function index()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');
 
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|xss_clean|callback_check_database');
		$this->form_validation->set_rules('picture', 'Picture', 'trim|xss_clean|callback_picture_upload');
		$this->form_validation->set_rules('description', 'Description', 'xss_clean');
		$this->form_validation->set_rules('creditforthree', 'CreditForThree', 'xss_clean');
		$this->form_validation->set_rules('creditforsix', 'CreditForSix', 'xss_clean');
		$this->form_validation->set_rules('creditforyear', 'CreditForYear', 'xss_clean');
		

		if( $this->form_validation->run() == FALSE )
		{
			$data['status'] = 2;
			$this->load->view('header');
			$this->load->view('menu',$data);
			$this->load->view('content_addcourse');
			$this->load->view('footer');
			$this->load->view('header');

		}
		else
		{
			
		}
		
	}
	
	public function check_database($name)
	{
		if( $this->session->userdata('logged_in') )
		{
			$session_data = $this->session->userdata('logged_in');
			
			$data['authority'] = $session_data['authority'];
			$data['id'] = $session_data['id'];
			
			if ( $data['authority'] == 2 || $data['authority'] == 3)
			{
				$teacher = $data['id'];
		
				$result = $this->course_model->check_course($teacher,$name);
		
				if ( $result )
				{
					$pictureName = explode('.',$_FILES['picture']['name']);
					
					$dataCourse = array(
						'name' => $this->input->post('name'),
						'teacher' => $data['id'],
						'picture' => $this->input->post('name').'.'.$pictureName[1],
						'description' => $this->input->post('description'),
						'creditforthree' => $this->input->post('creditforthree'),
						'creditforsix' => $this->input->post('creditforsix'),
						'creditforyear' => $this->input->post('creditforyear')
					);
			
					
			
					$this->course_model->add_course($dataCourse);
					$this->successfull($dataCourse);
				}
				else
				{
					$this->form_validation->set_message('check_database', 'This Teacher Has The Course With The Same Name');
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
		$this->load->view('menu',$data);
		$this->load->view('content_add_course_successfull',$data);
		$this->load->view('footer');
	}

	function picture_upload()
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

			}
			else if ( $data['authority'] == 2 )
			{
				
				$config['upload_path']   =   "images/course/";
				$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
				$config['max_size']      =   "5000";
				$config['max_width']     =   "320";
				$config['max_height']    =   "100";
				$this->load->library('upload',$config);

				if(!$this->upload->do_upload('picture'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$finfo = $this->upload->data();
					$this->_createThumbnail($finfo['file_name']);
					$data['uploadInfo'] = $finfo;
					$data['thumbnail_name'] = $finfo['raw_name']. '_thumb' .$finfo['file_ext']; 
				}
			}
			else
			{
				$config['upload_path']   =   "images/course/";
				$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
				$config['max_size']      =   "5000";
				$config['max_width']     =   "320";
				$config['max_height']    =   "100";
				$this->load->library('upload',$config);

				if(!$this->upload->do_upload('picture'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$finfo = $this->upload->data();
					$this->_createThumbnail($finfo['file_name']);
					$data['uploadInfo'] = $finfo;
					$data['thumbnail_name'] = $finfo['raw_name']. '_thumb' .$finfo['file_ext']; 
				}
			}
			
		}
		else
		{
			redirect('home','refresh');
		}
		
	}
	
	function _createThumbnail($filename)
	{
        $config['image_library']    = "gd2";      
        $config['source_image']     = "images/course/" .$filename;      
        $config['create_thumb']     = TRUE;      
        $config['maintain_ratio']   = TRUE;      
		$config['width'] = "80";      
        $config['height'] = "80";
        $this->load->library('image_lib',$config);

        if(!$this->image_lib->resize())
        {
            echo $this->image_lib->display_errors();
        }      

    }

}
?>
