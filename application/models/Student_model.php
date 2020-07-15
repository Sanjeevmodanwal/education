<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Student_model extends CI_Model {
		
    public function get_assign_list() {
	    $user = $_SESSION['user'];
        $this->db->select("subjects.subject_name, assign.paper_id");
		$this->db->from('assign');
        $this->db->join('student', 'student.school_id = assign.school_id');
        $this->db->join('class', 'class.id = assign.class');
        $this->db->join('subjects', 'subjects.id = assign.subject_id');
        $this->db->where('student.user_id', $user->id);
        $this->db->where('assign.class', $user->class);
        $query = $this->db->get();
        return $query->result();
    }
  
	public function get_test_paper_list($tpid) {
        $this->db->select("objectives.testpaper_id, objectives.question, objectives.opt_a, objectives.opt_b, objectives.opt_c, objectives.opt_d, objectives.ans");
        $this->db->from('assign');
		$this->db->join('objectives', 'objectives.testpaper_id = assign.paper_id');
        $this->db->where('objectives.testpaper_id', $tpid);
        $query = $this->db->get();
        return $query->result();
    }
	
}
