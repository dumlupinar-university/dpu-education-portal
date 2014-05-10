<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyRegister extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','',TRUE);
	}

	function index()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');
 
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('surname', 'Surname', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_email');
		$this->form_validation->set_rules('con_email', 'Email', 'trim|required|matches[email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
	
		if( $this->form_validation->run() == FALSE )
		{
			$data['status'] = 4;
			$this->load->view('header');
			$this->load->view('menu',$data);
			$this->load->view('content_register');
			$this->load->view('footer');
		}
		else
		{
			
		}

	}
	
	public function successfull($data)
	{
		$data['status'] = 4;
		$this->load->view('header');
		$this->load->view('menu',$data);
		$this->load->view('content_register_successfull',$data);
		$this->load->view('footer');
	}

	function check_email($email)
	{

		//query the database
		$result = $this->user_model->check_email($email);

		if( $result )
		{
			$data = array(
				'name' => $this->input->post('name'),
				'surname' => $this->input->post('surname'),
				'email' => $this->input->post('email'),
				'password' => md5( $this->input->post('password') ),
				
			);
			
			$data['code'] = random_string('alnum',16);
			
			$this->user_model->add_user($data);
			
			if ( $this->send_activation_email($data['email'],$data['name'],$data['code']) )
			{
				$this->successfull($data);
				return true;
			}
			else
			{
				redirect('register','refresh');	
				return false;
			}
		}
		else
		{
			$this->form_validation->set_message('check_email', 'Email Has Been Registered Before');
			return false;
		}
	}
	
	
	function send_activation_email($email,$name,$code)
	{
		$this->load->library('email');
		
		$config['protocol'] = "smtp"; 
		$config['SMTPAuth'] = true; 
		$config['smtp_host'] = "mail.tamtertarti.com"; 
		$config['smtp_user'] = "halil@tamtertarti.com"; 
		$config['smtp_pass'] = "Tamter111"; 
		$config['smtp_port'] = "587"; 
		$config['charset'] = "utf-8"; 
		$config['mailtype'] = "html"; 
		$config['newline'] = "\r\n"; 
		$config['crlf'] = "\r\n"; 
		
		$this->email->initialize($config); 
		$this->email->from('admin@dpu-education-portal.com'); 
		$this->email->to($email); 
		$this->email->subject("Activate Your Account"); 
		$this->email->message("Dear ".$name." Please click to link to activate your account:\n\n <a href=".site_url().('user/activate/'.$email.'/'.$code.'').">Click To Activate</a>"); 
		
		if( $this->email->send() ) 
		{
				return TRUE;
		} 
		else
		{ 
				return FALSE;
		}
	}

}
?>
