<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('School_model');
       // $this->load->model('Dashboard_model');
        //$this->load->library('form_validation');
    }

    public function index() {
       $user=$_SESSION['user'];
       $this->db->where('user_id',$user->id);
       $query=$this->db->get('school')->row();
       $_SESSION['school_id']=$query->id;
//        $founder['school']=$query->result();
        $this->load->view('templates/header.php');
        $this->load->view('Dashboard/index.php');
        $this->load->view('templates/footer.php');
    }

    public function school() {
        $users=$_SESSION['user'];
      //  print_r($users); exit;
        $this->db->where('user_id',$users->id);
        $query = $this->db->get('school');
        $data['schools'] = $query->result_array();
        $this->load->view('templates/header.php');
        $this->load->view('Dashboard/school/school.php', $data);
        $this->load->view('templates/footer.php');
    }
    
    public function teacher() {		
        $result['school_list']=$this->School_model->get_school();
        $result['teachers']=$this->School_model->get_teacher();
        $this->load->view('templates/header.php');
        $this->load->view('Dashboard/school/teacher.php', $result);
        $this->load->view('templates/footer.php');
    }
    
    public function student() {
        $this->load->view('templates/header.php');
        $this->load->view('Dashboard/school/student.php');
        $this->load->view('templates/footer.php');  
    }
    
    public function view_class() {
        $this->load->view('templates/header.php');
        $this->load->view('Dashboard/school/view_class.php');
        $this->load->view('templates/footer.php');  
    }

}
