<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('School_model');
        // $this->load->model('Dashboard_model');
        //$this->load->library('form_validation');
    }

    public function add_school() {  //add school by founder
        $users=$_SESSION['user'];
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
                'user_id' =>$users->id,
                'school_name' => $this->input->post('school_name'),
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
        redirect('/dashboard/school/school.php');
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
               // $formdata['image'] = $filename;
                $obj = $this->School_model->add_teacher($formdata);
            }
        }
        $formdata['image'] = '';
        $obj = $this->School_model->add_teacher($formdata);
        if ($obj == true) {
            $this->session->set_flashdata('item', 'Record is  saved');
            redirect('/dashboard/teacher');
        } else {
            $this->session->set_flashdata('item', 'Record is not saved');
            redirect('/dashboard/teacher');
        }
    }

    public function add_class() {
        print_r($this->input->post());
        exit;
        $filename = rand(0, 99999) . $_FILES['image']['name'];
        $this->load->helper(array('form', 'url'));
        $config['upload_path'] = 'images/';
        $config['allowed_types'] = 'jpg|png|pdf|doc|docx|xlsx|xls';
        $config['max_size'] = 2000;
        $config['file_name'] = $filename;
        $this->load->view('templates/header.php');
        $this->load->view('dashboard/school/school.php');
        $this->load->view('templates/footer.php');
    }
    
   
}
