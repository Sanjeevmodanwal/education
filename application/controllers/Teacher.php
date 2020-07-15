<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Teacher_model');
        // $this->load->model('School_model');
        //$this->load->library('form_validation');
    }

    public function index() {
        $user = $_SESSION['user'];
        $result['classs'] = $this->Teacher_model->get_assign_subject($user->id);
        $this->load->view('templates/teacher_header.php');
        $this->load->view('Teacher/index.php', $result);
        $this->load->view('templates/footer.php');
    }

    public function title() {
        $user = $_SESSION['user'];
        $this->db->from('subjects');
        $this->db->join('testpapers', 'testpapers.subject_id = subjects.id');
        $this->db->where('testpapers.user_id', $user->id);
        $result = $this->db->get();
        $paper['papers'] = $result->result();
        //print_r($paper); exit;
        $this->load->view('templates/teacher_header.php');
        $this->load->view('Teacher/title.php', $paper);
        $this->load->view('templates/footer.php');
    }

    /*
     * Add Question paper title
     */

    public function add_title() {
        $user = $_SESSION['user'];
        $data = array(
            'user_id' => $user->id,
            'class' => $this->input->post('class'),
            'subject_id' => $this->input->post('subject_id'),
            'title' => $this->input->post('title'),
            'status' => 0
        );
        $this->db->insert('testpapers', $data);
        $_SESSION['obj_id'] = $this->db->insert_id();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('item', 'Record is  saved');
            redirect('/home/objective');
        } else {
            $this->session->set_flashdata('item', 'Record is  saved');
            redirect('/home/title');
        }
    }

    /*
     * create objective papaer
     */

    public function objective() {
        if ($_SESSION['paper_id']) {
            $this->db->where('testpaper_id', $_SESSION['paper_id']);
            $this->db->where('status', 0);
            $query = $this->db->get('objectives');
            $result['objective'] = $query->result();
            $this->load->view('templates/teacher_header.php');
            $this->load->view('Teacher/objective.php', $result);
            $this->load->view('templates/footer.php');
        } else {
            redirect('/home/title');
        }
    }

    /*
     * Add Objective
     */

    public function add_objective() {
        $user = $_SESSION['user'];
        $data = array(
            'testpaper_id' => $_SESSION['paper_id'],
            'user_id' => $user->id,
            'question' => $this->input->post('question'),
            'opt_a' => $this->input->post('opt_a'),
            'opt_b' => $this->input->post('opt_b'),
            'opt_c' => $this->input->post('opt_c'),
            'opt_d' => $this->input->post('opt_d'),
            'ans' => $this->input->post('ans'),
            'status' => 0
        );
        $this->db->insert('objectives', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('item', 'Record is  saved');
            redirect('/home/objective');
        } else {
            $this->session->set_flashdata('item', 'Record is  saved');
            redirect('/home/objective');
        }
    }

    /*
     * View Student
     */

    public function view_student() {
        $user = $_SESSION['user'];
        $this->db->where('teacher_id', $user->id);
        $teacher = $this->db->get('teacher')->row();

        $this->db->from('users');
        $this->db->join('student', 'student.user_id = users.id');
        $this->db->where('school_id', $teacher->school_id);
        $result = $this->db->get();

        $student['students'] = $result->result();
        $this->load->view('templates/teacher_header.php');
        $this->load->view('Teacher/view_student.php', $student);
        $this->load->view('templates/footer.php');
    }

    public function store() {
        $id = $this->input->post('id');
        if ($id) {
            $_SESSION['paper_id'] = $id;
            $res = ['status' => 200];
        } else {
            $res = ['status' => 200];
        }
        echo json_encode($res);
    }

    /*
     * Release Paper
     */

    public function release() {
        $pid = $_SESSION['paper_id'];
        $this->db->where('testpaper_id', $pid);
        $result = $this->db->get('objectives');
        foreach ($result->result() as $res) {
            $data['status'] = 1;
            $this->db->where('id', $res->id);
            $obj = $this->db->update('objectives', $data);
        }
        if ($obj) {
            $data['status'] = 1;
            $this->db->where('id', $pid);
            $this->db->update('testpapers', $data);
            $res = ['status' => 200];
        } else {
            $res = ['status' => 500];
        }
        echo json_encode($res);
    }

    /*
     * Assign test paper to student
     */

    public function assign() {
        $user = $_SESSION['user'];
        $pid = $this->input->post('id');
        $shid = $this->Teacher_model->get_school_id($user->id);
        $this->db->where('paper_id', $pid);
        $this->db->where('status', 1);
        $query = $this->db->get('assign')->row();
        if ($query) {
            $res = ['status' => 500, 'msg' => 'Already Assigned paper'];
        } else {
            $data = array(
                'school_id' => $shid,
                'teacher_id' => $user->id,
                'subject_id' => $this->input->post('sub_id'),
                'paper_id' => $pid,
                'class' => $this->input->post('cls'),
                'date' => date('Y-m-d'),
                'status' => 1
            );
        }
        $this->db->insert('assign', $data);
        if ($this->db->affected_rows() > 0) {
            $res = ['status' => 200, 'msg' => 'Assigned Successfuuly !'];
        } else {
            $this->session->set_flashdata('item', 'Record is  saved');
            $res = ['status' => 500, 'msg' => 'Already Assigned paper'];
        }
        echo json_encode($res);
    }

}
?>

