<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('School_model');
       // $this->load->model('Dashboard_model');
        //$this->load->library('form_validation');
    }
    
    
    public function add_user(){
        echo 'me'; 
    }

   

}