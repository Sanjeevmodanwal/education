<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Student_model');
    }	
    
    public function index(){
      $result['student_details']=$_SESSION['user'];
	  $result['get_assign_list'] = $this->Student_model->get_assign_list();
      $this->load->view('templates/student_header.php', $result);
       $this->load->view('Student/index.php');
        $this->load->view('templates/footer.php');
    }
	
	public function assign_work(){
		if (!empty($this->input->get('tpid'))) {
			$test_paper_id = $this->input->get('tpid');
            $result['test_paper_id_list'] = $this->Student_model->get_test_paper_list($test_paper_id);
			$this->load->view('templates/student_header.php');
			$this->load->view('Student/assign_work.php', $result);
			$this->load->view('templates/footer.php');
		}else{
			redirect('/Student/');
		}
    }
	
	
	
}


