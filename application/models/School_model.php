<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class School_model extends CI_Model {


    public function get_school_id() {
        $users = $_SESSION['user'];
        $this->db->where('user_id', $users->id);
        $query = $this->db->get('school');
        return $query->result();
    }
	
	//// Add New Teacher here ////
    public function add_teacher_new($data){

        $sid = $data['school_id'];
        $role2 = $data['role'];
        $data = array(
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => md5($data['password']),
            'role' => $role2,
            'mobile' => $data['mobile'],
            'image' => $data['image'],
            'join_date' => date('Y-m-d')
        );
        $this->db->insert('users', $data);
        $insert_id = $this->db->insert_id();

        $data2 = array(
            'school_id' => $sid,
            'teacher_id' => $insert_id,
            'role' => $role2
        );
        $this->db->insert('teacher', $data2);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	//// total teacher count here //// 	
    public function teacher_count() {
		$logged_school_id = $_SESSION['logged_school_id'];
        $this->db->from("teacher");
		$this->db->where('school_id', $logged_school_id);
        $query = $this->db->get();
		return $query->num_rows();
    }
	
	//// get total teacher list here //// 		
    public function get_total_teacher_list() {
		$logged_school_id = $_SESSION['logged_school_id'];
        $this->db->select("school.school_name, users.username, users.email, users.mobile, users.join_date");
        $this->db->from('users');
        $this->db->join('teacher', 'teacher.teacher_id = users.id');
        $this->db->join('school', 'school.id = teacher.school_id');
		$this->db->where('teacher.school_id', $logged_school_id);
        $query = $this->db->get();
        return $query->result();
    }
	
	//// Add New Teacher here ////
    public function add_student_new($data){

        $sid = $data['school_id'];
        $role2 = $data['role'];
        $data = array(
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => md5($data['password']),
            'role' => $role2,
            'mobile' => $data['mobile'],
            'image' => $data['image'],
            'join_date' => date('Y-m-d')
        );
        $this->db->insert('users', $data);
        $insert_id = $this->db->insert_id();

        $data2 = array(
            'user_id' => $sid,
            'teacher_id' => $insert_id,
            'role' => $role2
        );
        $this->db->insert('teacher', $data2);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
