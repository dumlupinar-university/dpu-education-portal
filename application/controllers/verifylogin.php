<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','',TRUE);
	}

	function index()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

		if( $this->form_validation->run() == FALSE )
		{
			//Field validation failed.&nbsp; User redirected to login page
			$this->load->view('header');
			$this->load->view('menu');
			$this->load->view('content_login');
			$this->load->view('footer');
		}
		else
		{
			//Go to private area
			redirect('home', 'refresh');
		}

	}

	function check_database($password)
	{
		//Field validation succeeded.&nbsp; Validate against database
		$email = $this->input->post('email');

		//query the database
		$result = $this->user_model->login($email, $password);

		if( $result )
		{
			$sess_array = array();
			
			foreach( $result as $row )
			{
				$sess_array = array(
					'id' => $row->id,
					'name' => $row->name,
					'surname' => $row->surname,
					'authority' => $row->authority
				);
			
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid email or password');
			return false;
		}
	}


}
?>
