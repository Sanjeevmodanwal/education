<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class School_model extends CI_Model {

    public function get_school($uid) { //get school by founder id
        $this->db->where('user_id',$uid);
        $query = $this->db->get('school');
        return $query->result();
    }
	
	//get class by founder id
	public function get_classes_founder($uid) { 
        $this->db->where('user_id',$uid);
        $query = $this->db->get('classes');
        return $query->result();
    }
	
	//get class by founder id
	public function get_subject_founder($uid) { 
        $this->db->where('user_id',$uid);
        $query = $this->db->get('subjects');
        return $query->result();
    }

    //// Add New founder Teacher here ////
    public function add_teacher_new($data) {

        $sid = $data['school_id'];
        $class_idid = $data['class_id'];
        $subject_idid = $data['subject_id'];
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
            'class_id' => $class_idid,
            'subject_id' => $subject_idid,
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
    public function teacher_count($id) {
        $this->db->from("teacher");
        $this->db->where('school_id',$id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    //// get  founder total teacher list here //// 		
    public function get_total_teacher_list($id) {
       $this->db->select("school.school_name, classes.class_name, subjects.subject_name, users.username, users.email, users.mobile, users.image, users.join_date");
        $this->db->from('users');
        $this->db->join('teacher', 'teacher.teacher_id = users.id','left');
        $this->db->join('school', 'school.id = teacher.school_id','left');
        $this->db->join('classes', 'classes.id = teacher.class_id','left');
        $this->db->join('subjects', 'subjects.id = teacher.subject_id','left');
        $this->db->where('teacher.school_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    //// Add New Teacher here ////
    public function add_student_new($data) {

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
    
    
	//// Add student by  founder id ////
    public function add_student($data) {
		$sid = $_SESSION['logged_School_id'];
        $cid = $data['class_id'];
        $data = array(
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => md5($data['password']),
            'role' => 4,
            'mobile' => $data['mobile'],
            'class'=>$data['class'],
            'image' => $data['image'],
            'join_date' => date('Y-m-d')
        );
        $this->db->insert('users', $data);
         $insert_id = $this->db->insert_id();
        if ($this->db->affected_rows() > 0) {
             $data2 = array(
            'role' => 4,
            'school_id' => $sid,
            'user_sid' => $insert_id,
            'classes_id	' => $cid,
            'created_at'=>date('Y-m-d')
        );
        $this->db->insert('student', $data2);
            return true;
        } else {
            return false;
        }
    }

    public function get_teacher($sid) {  //get teacher by founder
        $this->db->from('users');
        $this->db->join('teacher', 'teacher.teacher_id = users.id','left');
        $this->db->where('school_id', $sid);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_subject($id){ //get subject by founder
        $this->db->where('user_id', $id);
        $query = $this->db->get('subjects');
        return $query->result(); 
    }
    
    public function get_class($id){ //get class by founder
        $this->db->where('user_id', $id);
        $query = $this->db->get('class');
        $record=[];
        foreach($query->result() as $r ){
           // print_r($r); exit;
            $record[]=array(
                'id'=>$r->id,
                'school_name'=>$this->get_school_name($r->school_id),
                'class_name'=>$r->class_name,
                'subject'=>$this->get_subject_name($r->subject_id),
                'teacher_name'=>$this->get_teacher_name($r->teacher_id)
            );
        }
        return $record;
    }
    
    public function get_school_name($sid){
        $this->db->where('id',$sid);
        $query = $this->db->get('school')->row();
        return $query->school_name;  
    }
    
     public function get_subject_name($subid){
        $this->db->where('id',$subid);
        $query = $this->db->get('subjects')->row();
        return $query->subject_name;  
    }
    
     public function get_teacher_name($id){
        $this->db->where('id',$id);
        $query = $this->db->get('users')->row();
        return $query->username;  
    }
    
    public function get_school_id($uid) { //get school by founder id
        // echo $uid; exit;
        $this->db->where('user_id',$uid);
        $query = $this->db->get('school')->row();
        return $query;
    }
  
	 //get code used for student by founder id
    public function get_student($sid){
		$this->db->select("school.school_name, classes.class_name, users.username, users.email, users.mobile, users.image, users.join_date");
        $this->db->from('users');
        $this->db->join('student', 'student.user_sid = users.id','left');
        $this->db->join('school', 'school.id = student.school_id','left');
        $this->db->join('classes', 'classes.id = student.classes_id','left');
        $this->db->where('student.school_id',$sid);
        $query = $this->db->get();
        return $query->result();  
    }
	
	public function get_classes($uid){
        $this->db->from('users');
        $this->db->join('classes', 'classes.user_id = users.id','left');
        $this->db->where('classes.user_id',$uid);
        $query = $this->db->get();
        return $query->result();  
    }

}
