<?php

class User_Model extends CI_Model {
	
	function login($email, $password)
	{
		$this->db->select('id, name, surname, authority');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('password', MD5($password));
		$this->db->limit(1);

		$query = $this->db->get();

		if( $query->num_rows() == 1 )
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function check_email($email)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		
		$query = $this->db->get();
		
		if ( $query->num_rows() == 1 )
		{	
			return false;
		}
		else
		{
			return true;
		}
	}
	
	function add_user($data)
	{
		$users['name'] = $data['name'];
		$users['surname'] = $data['surname'];
		$users['email'] = $data['email'];
		$users['password'] = $data['password'];
		
		$this->db->insert('users',$users);	
		
		$usersactivationcodes['email'] = $data['email'];
		$usersactivationcodes['activation_code'] = $data['code'];
		
		$this->db->insert('usersactivationcodes',$usersactivationcodes);
		
	}
	
	function get_user_list()
	{
		$this->db->select('*');
		$this->db->from('users');
		
		$query = $this->db->get();
		
		return $query->result();
	}
	
	function get_teacher_list()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('authority',2);
		
		$query = $this->db->get();
		
		return $query->result();
	}
	
	
	function get_user($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$id);
		
		$query = $this->db->get();
		
		if ( $query->num_rows() == 1 )
		{
			$row = $query->row();
			return $row;
		}
		else
		{
			return false;
		}
	}
	
	function get_teacher($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$id);
		$this->db->where('authority',2);
		
		$query = $this->db->get();
		
		if ( $query->num_rows() > 0 )
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function activate($email,$code)
	{
		$this->db->select('A.activation_code, A.email, 
							U.authority, U.email');
		$this->db->from('usersactivationcodes AS A');
		$this->db->from('users AS U');
		$this->db->join('users','A.email = U.email','INNER');
		$this->db->where('A.email',$email);
		$this->db->where('A.activation_code',$code);
		$this->db->where('U.authority',0);
		
		$query = $this->db->get();
		
		if ( $query->num_rows() == 1 )
		{
			$this->db->where('email',$email);
			$this->db->update('users', array('authority' => 1));
			return true;
		}
		else
		{
			return false;
		}
		
	}
}

?>

