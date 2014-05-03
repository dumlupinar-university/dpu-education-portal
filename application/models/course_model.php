<?php

class Course_model extends CI_Model {
	
	function add_course($data)
	{
		$dataCourse['name'] = $data['name'];
		$dataCourse['teacher'] = $data['teacher'];
		$dataCourse['picture'] = $data['picture'];
		
		$this->db->insert('courses',$dataCourse);
		
		$id = $this->get_course_id($dataCourse['teacher'],$dataCourse['name']);
		
		
		$courseCredit['course'] = $id;
		$courseCredit['creditforthree'] = $data['creditforthree'];	
		$courseCredit['creditforsix'] = $data['creditforsix'];	
		$courseCredit['creditforyear'] = $data['creditforyear'];
		
		$this->db->insert('coursescredits',$courseCredit);
		
		$now = time();
		
		$courseInfo['course'] = $id;
		$courseInfo['description'] = $data['description'];
		$courseInfo['createddate'] = $now;
		
		$this->db->insert('coursesinfos',$courseInfo);
			
	}
	
	function get_full_course_list()
	{
		$this->db->select('C.id AS idC, C.name AS nameC, C.teacher, C.picture, C.status ,
						users.name AS nameU , users.surname , users.id AS idU');
		$this->db->from('courses AS C');
		$this->db->join('users','users.id = C.teacher','INNER');
		
		$query = $this->db->get();
		
		if( $query->num_rows() >= 0 )
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function get_course_id($teacher,$name)
	{
		$this->db->select('id');
		$this->db->from('courses');
		$this->db->where('teacher',$teacher);
		$this->db->where('name',$name);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if( $query->num_rows() > 0 )
		{
			$row = $query->row();
			return $row->id;
		}
		else
		{
			return false;
		}
	}
	
	function check_course($teacher,$name)
	{
		$this->db->select('id');
		$this->db->from('courses');
		$this->db->where('teacher',$teacher);
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
	
	function check_teacher_course($teacher,$course)
	{
		$this->db->select('*');
		$this->db->from('courses');
		$this->db->where('teacher',$teacher);
		$this->db->where('id',$course);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if( $query->num_rows() == 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	function get_list()
	{
		$this->db->select('id, name, teacher, picture');
		$this->db->from('courses');
		$this->db->where('status',1);
		
		$query = $this->db->get();
		
		if( $query->num_rows() >= 0 )
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function get_purchased_list($id)
	{
		$this->db->select('id, name');
		$this->db->from('courses');
		$this->db->join('userscourses','userscourses.course = id','INNER');
		$this->db->where('userscourses.user',$id);
		
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
	
	
	
	function get_course($id)
	{
		$this->db->select('C.id, C.picture, C.name nameC, 
							U.name nameU, U.surname, U.id idU, 
							I.description, I.updateddate updateddateI, I.createddate,
							L.creditforthree, L.creditforsix, L.creditforyear, L.updateddate updateddateL');
		$this->db->from('courses AS C , users AS U , coursesinfos AS I , coursescredits AS L');
		$this->db->join('users','C.teacher = U.id','INNER');
		$this->db->join('coursesinfos','I.course = C.id','INNER');
		$this->db->join('coursescredits','L.course = C.id' ,'INNER');
		$this->db->where('C.id',$id);
		$this->db->where('status',1);
		$this->db->limit(1);
		
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
	
	function get_teacher_course_list($teacher)
	{
		$this->db->select('id, name');
		$this->db->from('courses');
		$this->db->where('teacher',$teacher);
		
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
	
	function check_status($id,$userid)
	{
		$this->db->select('*');
		$this->db->from('courses');
		$this->db->where('teacher',$userid);
		$this->db->where('id',$id);
		
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
			$this->db->where('course',$id);
		
			$query = $this->db->get();
			
			if ( $query->num_rows() > 0 )
			{
				return 2;
			}
			else
			{
				return 1;
			}
		}
		
	}
}

?>

