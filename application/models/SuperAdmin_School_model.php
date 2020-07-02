<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SuperAdmin_School_model extends CI_Model {

    public function add_teacher($data) {
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
    
    public function school_count(){
        $query = $this->db->get('school');
		return $query->num_rows();
    } 
	
	public function get_school(){
        $query = $this->db->get('school');
		return $query->result();
    }
	
	public function get_techer_list($school_id){
		$this->db->select("school.school_name, users.username, users.email, users.mobile, users.join_date");
		$this->db->from('users');
		$this->db->join('teacher', 'teacher.teacher_id = users.id');
		$this->db->join('school', 'school.id = teacher.school_id');
		$this->db->where('teacher.school_id', $school_id);
		$query = $this->db->get();
		return $query->result();
    } 
	
	public function get_total_teacher_list(){
		$this->db->select("school.school_name, users.username, users.email, users.mobile, users.join_date");
		$this->db->from('users');
		$this->db->join('teacher', 'teacher.teacher_id = users.id');
		$this->db->join('school', 'school.id = teacher.school_id');
		$query = $this->db->get();
		return $query->result();
    }  

}
