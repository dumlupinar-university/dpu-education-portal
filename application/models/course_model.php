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
	
	
	function get_course_comments($id)
	{
		$this->db->select('coursecomments.id, coursecomments.comment, coursecomments.date,
							users.name, users.surname');
		$this->db->from('coursecomments');
		$this->db->join('users','users.id = coursecomments.user','INNER');
		$this->db->where('course',$id);
		$this->db->where('coursecomments.status',1);
		
		$query = $this->db->get();
		
		return $query->result();
		
	}
	
	function get_course_point_of_user($id,$userid)
	{
		$this->db->select('coursespoints.point');
		$this->db->from('coursespoints');
		$this->db->where('coursespoints.user',$userid);
		$this->db->where('coursespoints.course',$id);
		
		$query = $this->db->get();
		
		if ( $query->num_rows() == 1 )
		{
			return $query->row()->point;
		}
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
	
	function get_last_three_course()
	{
		$this->db->select('C.id AS idC, C.name As nameC, C.teacher, C.picture, C.status,
							L.description,
							U.name As nameU , U.surname , U.id As idU');
							
		$this->db->from('courses AS C');
		$this->db->join('users AS U','U.id = C.teacher','INNER');
		$this->db->join('coursesinfos AS L', 'L.course = C.id','INNER');
		$this->db->where('C.status',1);
		$this->db->order_by('L.createddate','desc');
		$this->db->limit(3);
		
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
		$this->db->select('C.id AS idC, C.name AS nameC, C.teacher, C.picture ,
						   U.id AS idU, U.name AS nameU, U.surname,
						   L.description');
		$this->db->from('courses AS C');
		$this->db->join('users AS U','U.id = C.teacher','INNER');
		$this->db->join('coursesinfos AS L','L.course = C.id','INNER');
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
	
	function update_rate($data)
	{
		$points = array (
			'user' => $data['id'],
			'course' => $data['course'],
			'point' => $data['point']
		);
		
		$this->db->select('*');
		$this->db->from('coursespoints');
		$this->db->where('coursespoints.course',$course);
		$this->db->where('coursespoints.id',$id);
		
		$this->db->update('coursespoints',$points);
	}
	
	function check_rate($id,$course)
	{
		$this->db->select('*');
		$this->db->from('coursespoints');
		$this->db->where('coursespoints.course',$course);
		$this->db->where('coursespoints.id',$id);
		
		$query = $this->db->get();
		
		if ( $query->num_rows() == 1 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function rate($data)
	{
		
		$points = array (
			'user' => $data['id'],
			'course' => $data['course'],
			'point' => $data['point']
		);
		
		$this->db->insert('coursespoints',$points);
		
	}
	
	function get_purchased_list($id,$now)
	{
		$this->db->select('C.id AS idC, C.name AS nameC, C.teacher, C.picture ,
						   U.id AS idU, U.name AS nameU, U.surname,
						   L.description');
		$this->db->from('courses AS C');
		$this->db->join('users AS U','U.id = C.teacher','INNER');
		$this->db->join('coursesinfos AS L','L.course = C.id','INNER');
		$this->db->join('userscourses','userscourses.course = C.id','INNER');
		$this->db->where('userscourses.user',$id);
		$this->db->where('userscourses.validate >',$now);
		$this->db->where('status',1);
		
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
	
	
	
	function get_course($id,$userid)
	{
		$this->db->select('C.id, C.picture, C.name nameC , C.status , 
							U.name nameU, U.surname, U.id idU, 
							I.description, I.updateddate updateddateI, I.createddate,
							L.creditforthree, L.creditforsix, L.creditforyear, L.updateddate updateddateL');
		$this->db->from('courses AS C');
		$this->db->join('users AS U','C.teacher = U.id','INNER');
		$this->db->join('coursesinfos AS I','I.course = C.id','INNER');
		$this->db->join('coursescredits AS L','L.course = C.id' ,'INNER');
		$this->db->where('C.id',$id);
		$this->db->where('status',1);
		
		$query = $this->db->get();

		if( $query->num_rows() == 1 )
		{
			return $query->result();
		}
		else
		{
			$this->db->select('id,authority');
			$this->db->from('users');
			$this->db->where('id',$userid);
			$this->db->where('authority',3);
				
			$query = $this->db->get();
			
			if ( $query->num_rows() == 1 )
			{
				$this->db->select('C.id, C.picture, C.name nameC ,C.status , 
							U.name nameU, U.surname, U.id idU, 
							I.description, I.updateddate updateddateI, I.createddate,
							L.creditforthree, L.creditforsix, L.creditforyear, L.updateddate updateddateL');
				$this->db->from('courses AS C');
				$this->db->join('users AS U','C.teacher = U.id','INNER');
				$this->db->join('coursesinfos AS I','I.course = C.id','INNER');
				$this->db->join('coursescredits AS L','L.course = C.id' ,'INNER');
				$this->db->where('C.id',$id);
		
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
			
			return false;
		}
	}
	
	function get_course_not_confirmed($id)
	{
		$this->db->select('C.id, C.picture, C.name nameC, 
							U.name nameU, U.surname, U.id idU, 
							I.description, I.updateddate updateddateI, I.createddate,
							L.creditforthree, L.creditforsix, L.creditforyear, L.updateddate updateddateL');
		$this->db->from('courses AS C');
		$this->db->join('users AS U','C.teacher = U.id','INNER');
		$this->db->join('coursesinfos AS I','I.course = C.id','INNER');
		$this->db->join('coursescredits AS L','L.course = C.id' ,'INNER');
		$this->db->where('C.id',$id);
		$this->db->where('status',0);
		
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
	
	function get_course_prizes($id)
	{
		$this->db->select('L.course , L.creditforthree, L.creditforsix, L.creditforyear');
		$this->db->from('coursescredits AS L');
		$this->db->where('L.course',$id);

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
		$this->db->select('C.id AS idC, C.name AS nameC, C.teacher, C.picture ,
						   U.id AS idU, U.name AS nameU, U.surname,
						   L.description');
		$this->db->from('courses AS C');
		$this->db->join('users AS U','U.id = C.teacher','INNER');
		$this->db->join('coursesinfos AS L','L.course = C.id','INNER');
		$this->db->where('teacher',$teacher);
		$this->db->where('status',1);
		
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
	
	function get_teacher_course_list_not_confirmed($teacher)
	{
		$this->db->select('C.id AS idC, C.name AS nameC, C.teacher, C.picture ,
						   U.id AS idU, U.name AS nameU, U.surname,
						   L.description');
		$this->db->from('courses AS C');
		$this->db->join('users AS U','U.id = C.teacher','INNER');
		$this->db->join('coursesinfos AS L','L.course = C.id','INNER');
		$this->db->where('teacher',$teacher);
		$this->db->where('status',0);
		
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
	
	function check_status($id,$userid,$now)
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
			$this->db->where('validate >',$now);
		
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
	
	function get_course_credit($id,$validationDate)
	{
		if ( $validationDate == 3 )
		{
			$this->db->select('creditforthree');
			$this->db->from('coursescredits');
			$this->db->where('course',$id);
		
			$query = $this->db->get();
		
			if ( $query->num_rows() == 1 )
			{	
				$row = $query->row();
				return $row->creditforthree;
			}
			else
			{
				return false;
			}
		}
		else if ( $validationDate == 6 )
		{
			$this->db->select('creditforsix');
			$this->db->from('coursescredits');
			$this->db->where('course',$id);
		
			$query = $this->db->get();
		
			if ( $query->num_rows() == 1 )
			{	
				$row = $query->row();
				return $row->creditforsix;
			}
			else
			{
				return false;
			}
		}
		else if ( $validationDate == 12 )
		{
			$this->db->select('creditforyear');
			$this->db->from('coursescredits');
			$this->db->where('course',$id);
		
			$query = $this->db->get();
			
			if ( $query->num_rows() == 1 )
			{	
				$row = $query->row();
				return $row->creditforyear;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
		
		
	}
	
	function get_unconfirmed_course_list($id)
	{
		$this->db->select('id,authority');
		$this->db->from('users');
		$this->db->where('id',$id);
		$this->db->where('authority',3);
				
		$query = $this->db->get();
				
		if ( $query->num_rows() == 1 )
		{
			$this->db->select('C.id AS idC, C.name AS nameC, C.teacher, C.picture ,
						   U.id AS idU, U.name AS nameU, U.surname,
						   L.description');
			$this->db->from('courses AS C');
			$this->db->join('users AS U','U.id = C.teacher','INNER');
			$this->db->join('coursesinfos AS L','L.course = C.id','INNER');
			$this->db->where('C.status',0);
		
			$query = $this->db->get();
		
			if( $query->num_rows() > 0 )
			{
				return $query->result();
			}
	
		}
	}
	
	
	function activate($id)
	{
		$this->db->select('*');
		$this->db->from('courses');
		$this->db->where('id',$id);
		$this->db->update('courses',array('status'=>1));
	}
	
	function deactivate($id)
	{
		$this->db->select('*');
		$this->db->from('courses');
		$this->db->where('id',$id);
		$this->db->update('courses',array('status'=>0));
	}
	
	function buy_course_now($data)
	{
		$updateDate = array (
			'user' => $data['id'],
			'credit' => $data['userCredit'] - $data['courseCredit'],
			'creditlastchangedate' => $data['buyingdate']
		);
		
		
		$this->db->where('user',$data['id']);
		$this->db->update('userscredits',$updateDate);
		
		$info = array(
				    'course' => $data['course'],
					'user' => $data['id'],
					'validate' => $data['validate'],
					'buyingdate' => $data['buyingdate']
			);
			
		$this->db->insert('userscourses',$info);
	}
}

?>

