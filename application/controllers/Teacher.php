<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Teacher_model');
        // $this->load->model('Dashboard_model');
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
        $this->load->view('templates/teacher_header.php');
        $this->load->view('Teacher/title.php');
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
    
    public function objective(){
        $this->db->where('testpaper_id',3);
        $query=$this->db->get('objectives');
        $result['objective']=$query->result();
        $this->load->view('templates/teacher_header.php');
        $this->load->view('Teacher/objective.php',$result);
        $this->load->view('templates/footer.php');
    }
    
    /*
     * Add Objective
     */
    
    public function add_objective(){
        $user = $_SESSION['user'];
        $data = array(
            'testpaper_id' =>3,
            'question' => $this->input->post('question'),
            'opt_a' => $this->input->post('opt_a'),
            'opt_b' => $this->input->post('opt_b'),
            'opt_c' => $this->input->post('opt_c'),
            'opt_d' => $this->input->post('opt_d'),
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
     public function view_student(){
        $this->load->view('templates/teacher_header.php');
        $this->load->view('Teacher/view_student.php');
        $this->load->view('templates/footer.php');
    }

}
?>

