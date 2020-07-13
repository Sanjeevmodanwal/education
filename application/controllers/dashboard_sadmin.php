<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_sadmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SuperAdmin_School_model');
        // $this->load->model('Dashboard_model');
        //$this->load->library('form_validation');
    }

    public function index() {
        $result['school_count'] = $this->SuperAdmin_School_model->school_count();
        $result['teacher_count'] = $this->SuperAdmin_School_model->teacher_count();
        $result['class_count'] = $this->SuperAdmin_School_model->class_count();
        $result['class_student'] = $this->SuperAdmin_School_model->class_student();
        $this->load->view('templates/superadmin_header.php');
        $this->load->view('Dashboard_sadmin/index.php', $result);
        $this->load->view('templates/footer.php');
    }

    public function lists() {
        $result['school_list'] = $this->SuperAdmin_School_model->get_School();
        $this->load->view('templates/superadmin_header.php');
        $this->load->view('Dashboard_sadmin/School/lists.php', $result);
        $this->load->view('templates/footer.php');
    }

    public function teacher() {
        if (!empty($this->input->get('sid'))) {
            $School_id = $this->input->get('sid');
            $result['techer_list'] = $this->SuperAdmin_School_model->get_techer_list($School_id);
            $this->load->view('templates/superadmin_header.php');
            $this->load->view('Dashboard_sadmin/School/teacher.php', $result);
            $this->load->view('templates/footer.php');
        } else {
            redirect('/dashboard_sadmin/');
        }
    }

    public function add_teacher() {
        $formdata = $this->input->post();
        $sid = $formdata['School_id'];
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
                // $formdata['image'] = $filename;
                $obj = $this->SuperAdmin_School_model->add_teacher_new($formdata);
            }
        }
        $formdata['image'] = '';
        $obj = $this->SuperAdmin_School_model->add_teacher_new($formdata);
        if ($obj == true) {
            $this->session->set_flashdata('item', 'Record is  saved');
            redirect('/Dashboard_sadmin/teacher?sid=' . $sid);
        } else {
            $this->session->set_flashdata('item', 'Record is not saved');
            redirect('/Dashboard_sadmin/teacher?sid=' . $sid);
        }
    }

    public function supschool() {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('school');
        $this->load->view('templates/superadmin_header.php');
        $this->load->view('Dashboard_sadmin/School/school.php');
        $this->load->view('templates/footer.php');
    }

    public function add_School() {
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
            $data = array(
                'School_name' => $this->input->post('school_name'),
                'School_session' => $this->input->post('school_session'),
                'image' => $filename,
                'date' => date('Y-m-d')
            );
            $this->db->insert('school', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('item', 'Record is  saved');
            } else {
                $this->session->set_flashdata('item', 'Record is not saved');
            }
        }
        redirect('/Dashboard_sadmin/');
    }

    public function total_teacher() {
        $result['techer_list'] = $this->SuperAdmin_School_model->get_total_teacher_list();
        $this->load->view('templates/superadmin_header.php');
        $this->load->view('Dashboard_sadmin/School/total_teacher.php', $result);
        $this->load->view('templates/footer.php');
    }

    public function classes() {
        if (!empty($this->input->get('sid'))) {
            $School_id = $this->input->get('sid');
            $result['techer_list'] = $this->SuperAdmin_School_model->get_techer_list($School_id);
            $result['get_class_list'] = $this->SuperAdmin_School_model->get_class_list($School_id);
            $this->load->view('templates/superadmin_header.php');
            $this->load->view('Dashboard_sadmin/School/classes.php', $result);
            $this->load->view('templates/footer.php');
        } else {
            redirect('/dashboard_sadmin/');
        }
    }

    public function add_class() {
        $formdata = $this->input->post();
        $sid = $formdata['School_id'];
        $obj = $this->SuperAdmin_School_model->add_class_fields($formdata);
        if ($obj == true) {
            $this->session->set_flashdata('item', 'Record is  saved');
            redirect('/Dashboard_sadmin/classes?sid=' . $sid);
        } else {
            $this->session->set_flashdata('item', 'Record is not saved');
            redirect('/Dashboard_sadmin/classes?sid=' . $sid);
        }
    }

    public function total_class() {
        $result['class_list'] = $this->SuperAdmin_School_model->get_total_class_list();
        $this->load->view('templates/superadmin_header.php');
        $this->load->view('Dashboard_sadmin/School/total_class.php', $result);
        $this->load->view('templates/footer.php');
    }

    public function student() {
        if (!empty($this->input->get('sid'))) {
            $School_id = $this->input->get('sid');
            $result['techer_list'] = $this->SuperAdmin_School_model->get_techer_list($School_id);
            $result['get_class_list'] = $this->SuperAdmin_School_model->get_class_list($School_id);
            $result['get_student_list'] = $this->SuperAdmin_School_model->get_student_list($School_id);
            $this->load->view('templates/superadmin_header.php');
            $this->load->view('Dashboard_sadmin/School/student.php', $result);
            $this->load->view('templates/footer.php');
        } else {
            redirect('/Dashboard_sadmin/');
        }
    }

    public function add_student() {
        $formdata = $this->input->post();
        $sid = $formdata['school_id'];
        $obj = $this->SuperAdmin_School_model->add_student_fields($formdata);
        if ($obj == true) {
            $this->session->set_flashdata('item', 'Record is  saved');
            redirect('/Dashboard_sadmin/student?sid=' . $sid);
        } else {
            $this->session->set_flashdata('item', 'Record is not saved');
            redirect('/Dashboard_sadmin/student?sid=' . $sid);
        }
    }

    public function total_student() {
        $result['student_list'] = $this->SuperAdmin_School_model->get_total_student_list();
        $this->load->view('templates/superadmin_header.php');
        $this->load->view('Dashboard_sadmin/School/total_student.php', $result);
        $this->load->view('templates/footer.php');
    }

    public function founder() {
        if (!empty($this->input->get('sid'))) {
            $school_id = $this->input->get('sid');
            $result['founders'] = $this->SuperAdmin_School_model->get_founder_list($school_id);
           // print_r($result); exit;
            $this->load->view('templates/superadmin_header.php');
            $this->load->view('Dashboard_sadmin/School/founder.php', $result);
            $this->load->view('templates/footer.php');
        } else {
            redirect('/dashboard_sadmin/');
        }
    }

    /*
     * Add founder
     */

    public function add_founder() {
        $formdata = $this->input->post();
        $data = array(
            'username' => $formdata['username'],
            'email' => $formdata['email'],
            'mobile' => $formdata['mobile'],
            'password' => md5($formdata['password']),
            'role' => 2,
            'join_date' => date('Y-m-d')
        );
        $this->db->insert('users', $data);
        $insert_id = $this->db->insert_id();
        if ($this->db->affected_rows() > 0) {
            $updata = array(
                'user_id' => $insert_id, 
            );
            $this->db->where('id', $formdata['school_id']);
            $this->db->update('school', $updata);
            $this->session->set_flashdata('item', 'Record is  saved');
            redirect('/Dashboard_sadmin/founder?sid=' . $formdata['school_id']);
        } else {
            return false;
        }
    }

}
