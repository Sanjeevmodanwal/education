<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SuperAdmin_School_model extends CI_Model {

//// Add New Teacher here ////
    public function add_teacher_new($data) {
		$sid = $data['school_id'];
		$role2 = $data['role'];
        $data = array(
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role'=>$role2,
            'mobile' => $data['mobile'],
            'image' => $data['image'],
            'join_date' => date('Y-m-d')
        );
        $this->db->insert('users', $data);
		$insert_id = $this->db->insert_id();
		
		$data2 = array(
            'school_id' => $sid,
            'teacher_id' => $insert_id,
			'role'=>$role2
        );
		$this->db->insert('teacher', $data2);
		
        if ($this->db->affected_rows() > 0) {
           return true;
        } else {
            return false;
        }
    }

//// total school count here ////   
    public function school_count(){
        $query = $this->db->get('school');
		return $query->num_rows();
    } 

//// total teacher count here //// 	
	public function teacher_count(){
        $query = $this->db->get('teacher');
		return $query->num_rows();
    }
	
//// total class count here //// 	
	public function class_count(){
        $query = $this->db->get('class');
		return $query->num_rows();
    }
//// total student count here //// 	
	public function class_student(){
        $query = $this->db->get('student');
		return $query->num_rows();
    }	

//// get school list here //// 	
	public function get_school(){
        $query = $this->db->get('school');
		return $query->result();
    }

//// get teacher list via school wise list here //// 	
	public function get_techer_list($school_id){
		$this->db->select("school.school_name, users.id, users.username, users.email, users.mobile, users.join_date");
		$this->db->from('users');
		$this->db->join('teacher', 'teacher.teacher_id = users.id');
		$this->db->join('school', 'school.id = teacher.school_id');
		$this->db->where('teacher.school_id', $school_id);
		$query = $this->db->get();
		return $query->result();
    } 

//// get total teacher list here //// 		
	public function get_total_teacher_list(){
		$this->db->select("school.school_name, users.username, users.email, users.mobile, users.join_date");
		$this->db->from('users');
		$this->db->join('teacher', 'teacher.teacher_id = users.id');
		$this->db->join('school', 'school.id = teacher.school_id');
		$query = $this->db->get();
		return $query->result();
    }

//// add New class here ////	
	public function add_class_fields($data) {
		$users=$_SESSION['user'];
        $data = array(
            'user_id' => $users->id,
            'school_id' => $data['school_id'],
            'teacher_id' => $data['teacher_id'],
            'class_name' => $data['class_name'],
            'created_date' => date('Y-m-d')
        );
        $this->db->insert('class', $data);
		$insert_id = $this->db->insert_id();
		
        if ($this->db->affected_rows() > 0) {
           return true;
        } else {
            return false;
        }
    }

//// get class via school wise list here ////	
	public function get_class_list($school_id){
		$this->db->select("school.school_name, users.username, class.id, class.class_name, class.created_date");
		$this->db->from('users');
		$this->db->join('class', 'class.teacher_id = users.id');
		$this->db->join('school', 'school.id = class.school_id');
		$this->db->where('class.school_id', $school_id);
		$query = $this->db->get();
		return $query->result();
    }
	
//// get total class list here //// 		
	public function get_total_class_list(){
		$this->db->select("school.school_name, users.username, class.class_name, class.created_date");
		$this->db->from('users');
		$this->db->join('class', 'class.teacher_id = users.id');
		$this->db->join('school', 'school.id = class.school_id');
		$query = $this->db->get();
		return $query->result();
    }

//// add New student here ////	
	public function add_student_fields($data) {
		$users=$_SESSION['user'];
        $data = array(
            'user_id' => $users->id,
            'school_id' => $data['school_id'],
            'class_id' => $data['class_id'],
            'teacher_id' => $data['teacher_id'],
            'student_name' => $data['student_name'],
            'created_at' => date('Y-m-d')
        );
        $this->db->insert('student', $data);
		$insert_id = $this->db->insert_id();
		
        if ($this->db->affected_rows() > 0) {
           return true;
        } else {
            return false;
        }
    }

//// get student via school and teacher wise list here ////	
	public function get_student_list($school_id){
		$this->db->select("school.school_name, class.class_name, users.username, student.id, student.student_name, student.created_at");
		$this->db->from('users');
		$this->db->join('student', 'student.teacher_id = users.id');
		$this->db->join('school', 'school.id = student.school_id');
		$this->db->join('class', 'class.id = student.school_id');
		$this->db->where('student.school_id', $school_id);
		$query = $this->db->get();
		return $query->result();
    }

//// get total student list here //// 		
	public function get_total_student_list(){
		$this->db->select("school.school_name, class.class_name, users.username, student.id, student.student_name, student.created_at");
		$this->db->from('users');
		$this->db->join('student', 'student.teacher_id = users.id');
		$this->db->join('school', 'school.id = student.school_id');
		$this->db->join('class', 'class.id = student.school_id');
		$query = $this->db->get();
		return $query->result();
    }	

}
