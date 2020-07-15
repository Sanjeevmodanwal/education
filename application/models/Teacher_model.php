<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Teacher_model extends CI_Model {
    
    public function get_assign_subject($uid){
        $this->db->from('subjects');
        $this->db->join('class', 'class.subject_id = subjects.id','left');
        $this->db->where('class.teacher_id', $uid);
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function get_school_id($uid) { //get school by founder id
        $this->db->where('teacher_id',$uid);
        $query = $this->db->get('teacher')->row();
        return $query->school_id;
    }
    
    
   
}

