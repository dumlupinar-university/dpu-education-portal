<?php

class Lecture_model extends CI_Model {
	
	
	function get_full_lecture_list()
	{
		$this->db->select('L.id, L.name AS nameL, L.description , L.status , L.key ,
								courses.name AS nameC');
		$this->db->from('lectures as L');
		$this->db->join('courses','courses.id = L.course','left'); 
		
		$query = $this->db->get();
		
		if( $query->num_rows() > 0 )
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	
	function get_list($course,$id)
	{
		$this->db->select('L.id, L.name, L.course , L.description');
		$this->db->from('lectures as L');
		$this->db->join('userscourses','L.course = userscourses.course','INNER'); 
		$this->db->where('userscourses.user',$id);
		$this->db->where('userscourses.course',$course);
		$this->db->where('L.status',1);
		
		$query = $this->db->get();
		
		if( $query->num_rows() > 0 )
		{
			return $query->result();
		}
		else
		{
			$this->db->select('L.id, L.name, L.course , L.description');
			$this->db->from('lectures AS L');
			$this->db->join('courses','L.course = courses.id','INNER'); 
			$this->db->where('courses.teacher',$id);
			$this->db->where('courses.id',$course);
			
			$query = $this->db->get();
		
			if( $query->num_rows() > 0 )
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}
	}
	
	function get_lecture($lectureid,$id)
	{
		$this->db->select('L.id AS idL, L.name AS nameL, L.course , L.description , L.key ,
							C.name AS nameC ,C.id AS idC');
		$this->db->from('lectures AS L');
		$this->db->join('courses AS C','L.course = C.id','INNER');
		$this->db->join('userscourses','L.course = userscourses.course','INNER'); 
		$this->db->where('userscourses.user',$id);
		$this->db->where('L.id',$lectureid);
		$this->db->where('L.status',1);
		
		$query = $this->db->get();
		
		if( $query->num_rows() == 1 )
		{
			$row = $query->row();
			return $row;
		}
		else
		{
			$this->db->select('L.id AS idL, L.name AS nameL, L.course , L.description , L.key ,
							C.name AS nameC ,C.id AS idC');
			$this->db->from('lectures AS L');
			$this->db->join('courses AS C','C.id = L.course','INNER'); 
			$this->db->where('L.id',$lectureid);
			$this->db->where('C.teacher',$id);
			
			
			$query = $this->db->get();
			
			if( $query->num_rows() == 1 )
			{
				$row = $query->row();
				return $row;
			}
			else
			{
				return false;
			}
		}
	}

	
	function check_lecture($course,$name)
	{
		$this->db->select('*');
		$this->db->from('lectures');
		$this->db->where('course',$course);
		$this->db->where('name',$name);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if( $query->num_rows() == 1 )
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	function add_lecture($data)
	{
		$this->db->insert('lectures',$data);
	}
	
	
	function get_lecture_status($course,$userid)
	{
		$this->db->select('*');
		$this->db->from('courses');
		$this->db->where('teacher',$userid);
		$this->db->where('id',$course);
		
		$query = $this->db->get();
		
		if ( $query->num_rows() == 1 )
		{
			return 3;
		}
		else 
		{	
			$this->db->select('*');
			$this->db->from('userscourses');
			$this->db->where('user',$userid);
			$this->db->where('course',$course);
		
			$query = $this->db->get();
			
			if ( $query->num_rows() == 1 )
			{
				return 2;
			}
			else
			{
				return 0;
			}
		}
		
	}

}

?>

