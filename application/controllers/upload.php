<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Upload extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }  

    function index()
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
				$this->load->view('menu_student');
				$this->load->view('content_upload_view',$data);
			}
			else if ( $data['authority'] == 2 )
			{
				$this->load->view('menu_teacher');
				$this->load->view('content_upload_view',$data);
			}
			else
			{
				$this->load->view('menu_admin');
				$this->load->view('content_upload_view',$data);
			}
			
		}
		else
		{
			redirect('home','refresh');
		}
		
		$this->load->view('footer');
        
    }
    
    function upload_video()
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
				redirect('home','refresh');
			}
			else if ( $data['authority'] == 1 )
			{
				redirect('home','refresh');
			}
			else if ( $data['authority'] == 2 )
			{
				$this->load->view('menu_teacher');
				$this->load->view('content_video_upload',$data);
			}
			else
			{
				$this->load->view('menu_admin');
				$this->load->view('content_video_upload',$data);
			}
			
		}
		else
		{
			redirect('home','refresh');
		}
		
		$this->load->view('footer');
        
    }

	function video_upload()
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
				redirect('home','refresh');
			}
			else if ( $data['authority'] == 1 )
			{
				redirect('home','refresh');
			}
			else if ( $data['authority'] == 2 )
			{
				$this->load->view('menu_teacher');
				
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
					$this->load->view('content_video_upload_success',$data);
				}
			}
			else
			{
				$this->load->view('menu_admin');
				
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
					$this->load->view('content_video_upload_success',$data);
				}
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
