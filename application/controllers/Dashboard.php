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
        $users = $_SESSION['user'];
         // print_r($users); exit;
        $school= $this->School_model->get_school_id($users->id);
         // print_r($school->id); exit;
        $_SESSION['logged_School_id'] = $school->id;
        $result['teacher_count'] = $this->School_model->teacher_count($school->id);
        $this->load->view('templates/header.php');
        $this->load->view('Dashboard/index.php', $result);
        $this->load->view('templates/footer.php');
    }

    public function teacher() {
        $users = $_SESSION['user'];
       // print_r($users); exit;
        $result['getSchoolId'] = $_SESSION['logged_School_id'];
        $result['teachers'] = $this->School_model->get_total_teacher_list($_SESSION['logged_School_id']);
        $result['schools'] = $this->School_model->get_school($users->id);
       // print_r($result['school']); exit;
        $this->load->view('templates/header.php');
        $this->load->view('Dashboard/School/teacher.php', $result);
        $this->load->view('templates/footer.php');
    }

    public function add_teacher() {
        $formdata = $this->input->post();
        $filename = $_FILES['image']['name'];
        if (!empty($filename)) {
            $filename = rand(0, 99999) . $_FILES['image']['name'];
            $this->load->helper(array('form', 'url'));
            $config['upload_path'] = 'images/';
            $config['allowed_types'] = 'jpg|png|pdf|doc|docx|xlsx|xls';
            $config['max_size'] = 2000;
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('item', $this->upload->display_errors());
            } else {
                $formdata['image'] = $filename;
                $obj = $this->School_model->add_teacher_new($formdata);
                $this->session->set_flashdata('item', 'Record is  saved');
                redirect('/dashboard/teacher');
            }
        } else {
            $formdata['image'] = '';
            $obj = $this->School_model->add_teacher_new($formdata);
            if ($obj == true) {
                $this->session->set_flashdata('item', 'Record is  saved');
                redirect('/dashboard/teacher');
            } else {
                $this->session->set_flashdata('item', 'Record is not saved');
                redirect('/dashboard/teacher');
            }
        }
    }

    public function total_teacher() {
        $result['techer_list'] = $this->School_model->get_total_teacher_list();
        $this->load->view('templates/superadmin_header.php');
        $this->load->view('Dashboard_sadmin/School/total_teacher.php', $result);
        $this->load->view('templates/footer.php');
    }

    public function student() {
        $users = $_SESSION['user'];
        $school= $this->School_model->get_school_id($users->id);
        $result['schools'] = $this->School_model->get_school($users->id);
        $result['students'] = $this->School_model->get_student($school->id);
       // print_r($result['students']); exit;
        $this->load->view('templates/header.php');
        $this->load->view('Dashboard/School/student.php', $result);
        $this->load->view('templates/footer.php');
    }

    public function add_student() {
        $formdata = $this->input->post();
        $filename = $_FILES['image']['name'];
        if (!empty($filename)) {
            $filename = rand(0, 99999) . $_FILES['image']['name'];
            $this->load->helper(array('form', 'url'));
            $config['upload_path'] = 'images/';
            $config['allowed_types'] = 'jpg|png|pdf|doc|docx|xlsx|xls';
            $config['max_size'] = 2000;
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('item', $this->upload->display_errors());
            } else {
                $formdata['image'] = $filename;
                $obj = $this->School_model->add_student($formdata);
                if ($obj == true) {
                    $this->session->set_flashdata('item', 'Record is  saved');
                    redirect('/dashboard/student');
                } else {
                    $this->session->set_flashdata('item', 'Record is not saved');
                    redirect('/dashboard/student');
                }
            }
        } else {
            $formdata['image'] = '';
            $obj = $this->School_model->add_student($formdata);
            if ($obj == true) {
                $this->session->set_flashdata('item', 'Record is  saved');
                redirect('/dashboard/student');
            } else {
                $this->session->set_flashdata('item', 'Record is not saved');
                redirect('/dashboard/student');
            }
        }
    }

    public function school() {
//        $user = $_SESSION['school_id'];
//        $this->db->where('user_id',$user->id);
        $sid = $_SESSION['logged_School_id'];
        $this->db->where('id', $sid);
        $query = $this->db->get('school');
        $school['schools'] = $query->result();
        // print_r($School); exit;
        $this->load->view('templates/header.php');
        $this->load->view('Dashboard/School/school.php', $school);
        $this->load->view('templates/footer.php');
    }

    public function createCls() {  //create class by founder
        $user=$_SESSION['user'];
        $sid = $_SESSION['logged_School_id'];
        $result['school']= $this->School_model->get_school($user->id);
       // print_r($result); exit;
        $result['subjects']= $this->School_model->get_subject($user->id);
        $result['teachers']= $this->School_model->get_teacher($sid);
        $result['class']= $this->School_model->get_class($user->id);
       
        $this->load->view('templates/header.php');
        $this->load->view('Dashboard/School/classes.php',$result);
        $this->load->view('templates/footer.php');
    }

    public function subject() {
        $user = $_SESSION['user'];
        $this->db->where('user_id', $user->id);
        $query = $this->db->get('subjects');
        $subject['subjects'] = $query->result();
        $this->load->view('templates/header.php');
        $this->load->view('Dashboard/School/subject.php', $subject);
        $this->load->view('templates/footer.php');
    }

    public function add_subject() {
        $user = $_SESSION['user'];
        $data = array(
            'user_id' =>$user->id,
            'subject_name' => $this->input->post('subject_name'),
            'create_date' => date('Y-m-d')
        );
        $this->db->insert('subjects', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('item', 'Record is  saved');
            redirect('/Dashboard/subject');
        } else {
            $this->session->set_flashdata('item', 'Record is  saved');
            redirect('/Dashboard/subject');
        }
    }
    
    /*
     * add class by founder
     */
    
    public function add_class(){
        $user = $_SESSION['user'];
        $data = array(
            'user_id' =>$user->id,
            'school_id' => $this->input->post('school_id'),
            'teacher_id' => $this->input->post('teacher_id'),
            'subject_id' => $this->input->post('subject_id'),
            'class_name' => $this->input->post('class_name'),
            'created_date' => date('Y-m-d')
        );
        $this->db->insert('class', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('item', 'Record is  saved');
            redirect('/Dashboard/createCls');
        } else {
            $this->session->set_flashdata('item', 'Record is  saved');
            redirect('/Dashboard/createCls');
        }  
    }

}
