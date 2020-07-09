<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class School_model extends CI_Model {

    public function add_teacher($data) {
        $data = array(
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => md5($data['password']),
            'role' => $data['role'],
            'mobile' => $data['mobile'],
            'image' => $data['image'],
            'join_date' => date('Y-m-d')
        );
        $this->db->insert('users', $data);
        $insert_id = $this->db->insert_id();

        $data = array(
            'school_id' => $data['username'],
            'teacher_id' => $insert_id,
            'role' => $data['role']
        );
        $this->db->insert('teacher', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_school() {
        $users = $_SESSION['user'];
        $this->db->where('user_id', $users->id);
        $query = $this->db->get('school');
        return $query->result();
    }

}
