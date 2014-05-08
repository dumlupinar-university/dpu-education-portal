<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class VerifyProfile extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','',TRUE);
	}

	function index()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');
 
		$this->form_validation->set_rules('phone', 'Phone', 'trim|min_length[10]|xss_clean');
		$this->form_validation->set_rules('photo', 'Photo', 'trim|xss_clean|callback_picture_upload');
		$this->form_validation->set_rules('facebook', 'Facebook', 'trim|xss_clean');
		$this->form_validation->set_rules('birthday', 'Birthday', 'trim|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
		$this->form_validation->set_rules('skype', 'Skype', 'trim|xss_clean');
		

		if( $this->form_validation->run() == FALSE )
		{
			if( $this->session->userdata('logged_in') )
			{
				$session_data = $this->session->userdata('logged_in');
			
				$data['authority'] = $session_data['authority'];
				$data['id'] = $session_data['id'];
			
				if ( $data['authority'] == 1 )
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
				else 
				{
					$data['status'] = 4;
					$this->load->view('menu',$data);
				}
			}
			else
			{
				redirect('home','refresh');
			}
			
			$this->load->view('content_edit_profile');
			$this->load->view('footer');
		}
		else
		{
			
		}

	}
	
	public function add_to_database($data)
	{
		$photoName = explode('.',$_FILES['photo']['name']);
		//$cvName = exploade('.',$_FILES['cv']['name']);
		
		$profile = array(
				'user' => $data['id'],
				'phone' => $this->input->post('phone'),
				'photo' => $data['id'].'_thumb.'.$photoName[1],
				'cv' => $data['id'].'.'.$photoName[1],
				'skype' => $this->input->post('skype'), 
				'description' => $this->input->post('description'), 
				'address' => $this->input->post('address'), 
				'birthday' => $this->input->post('birthday'), 
				'facebook' => $this->input->post('facebook') 		
		);
		
		$this->user_model->edit_profile($profile);
		$profile['status'] = $data['authority'];
		$this->successfull($profile);
		
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
				$config['upload_path']   =   "images/profile/";
				$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
				$config['max_size']      =   "5000";
				$config['max_width']     =   "320";
				$config['max_height']    =   "100";
				$this->load->library('upload',$config);

				if(!$this->upload->do_upload('photo'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$finfo = $this->upload->data();
					$this->_createThumbnail($finfo['file_name']);
					$data['uploadInfo'] = $finfo;
					$data['thumbnail_name'] = $finfo['raw_name']. '_thumb' .$finfo['file_ext']; 
					$this->add_to_database($data);
				}
			}
			else if ( $data['authority'] == 2 )
			{
				
				$config['upload_path']   =   "images/profile/";
				$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
				$config['max_size']      =   "5000";
				$config['max_width']     =   "1907";
				$config['max_height']    =   "1280";
				$this->load->library('upload',$config);

				if(!$this->upload->do_upload('photo'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$finfo = $this->upload->data();
					$this->_createThumbnail($finfo['file_name']);
					$data['uploadInfo'] = $finfo;
					$data['thumbnail_name'] = $finfo['raw_name']. '_thumb' .$finfo['file_ext'];
					$this->add_to_database($data);
				}
			}
			else if ( $data['authority'] == 3 )
			{
				$config['upload_path']   =   "images/profile/";
				$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
				$config['max_size']      =   "5000";
				$config['max_width']     =   "1907";
				$config['max_height']    =   "1280";
				$this->load->library('upload',$config);

				if(!$this->upload->do_upload('photo'))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$finfo = $this->upload->data();
					$this->_createThumbnail($finfo['file_name']);
					$data['uploadInfo'] = $finfo;
					$data['thumbnail_name'] = $finfo['raw_name']. '_thumb' .$finfo['file_ext']; 
					$this->add_to_database($data);
				}
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
		$this->load->view('content_edit_profile_successfull',$data);
		$this->load->view('footer');

	}
	
	function _createThumbnail($filename)
	{
        $config['image_library']    = "gd2";      
        $config['source_image']     = "images/profile/" .$filename;      
        $config['create_thumb']     = TRUE;      
        $config['maintain_ratio']   = TRUE;      
		$config['width'] = "200";      
        $config['height'] = "200";
        $this->load->library('image_lib',$config);

        if(!$this->image_lib->resize())
        {
            echo $this->image_lib->display_errors();
        }      

    }


}
?>
