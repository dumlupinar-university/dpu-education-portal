<?php

class User_Model extends CI_Model {
	
	
	function become_admin($cv)
	{
		$this->db->inser('becomeadmin',$cv);
	}
	
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
		
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email',$data['email']);
		
		$query = $this->db->get();
		
		if ( $query->num_rows() == 1 )
		{			
			$usersinfos = array(
				'user' => $query->row()->id,
				'phone' => null,
				'skype' => null,
				'facebook' => null,
				'birthday' => null,
				'address' => null,
				'description' => null,
				'photo' => null,
				'cv' => null,				
			);
			
			$this->db->insert('usersinfos',$usersinfos);
			
			$userscredits = array(
				'user' => $query->row()->id,
				'credit' => 0,
			);
			
			$this->db->insert('userscredits',$userscredits);
		}
		else
		{	
			return false;
		}
	}
	
	
	function edit_profile($data)
	{
		$this->db->select('*');
		$this->db->from('usersinfos');
		$this->db->where('user',$data['user']);
		
		$query = $this->db->get();
		
		if ( $query->num_rows() == 1 )
		{
			$this->db->where('user',$data['user']);
			$this->db->update('usersinfos',$data);
		}
		else
		{
			return false;
		}	
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
	
	function get_user_infos($id)
	{
		$this->db->select('*');
		$this->db->from('usersinfos');
		$this->db->where('user',$id);
		
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
		$this->db->select('users.* ,usersinfos.photo');
		$this->db->from('users');
		$this->db->join('usersinfos','users.id = usersinfos.user','INNER');
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
	
	function get_user_credit($id)
	{
		$this->db->select('credit');
		$this->db->from('userscredits');
		$this->db->where('user',$id);
		
		$query = $this->db->get();
		
		if ( $query->num_rows() > 0 )
		{
			$row = $query->row();
			return $row->credit;
		}
		else
		{
			return false;
		}
	}
}

?>

