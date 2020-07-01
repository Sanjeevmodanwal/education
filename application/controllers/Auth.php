<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//header('Content-Type: application/json');
/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Auth extends CI_Controller {
    /**
     * Redirect if needed, otherwise display the user list
     */
    
       public function __construct() {
        parent::__construct();
         $this->load->library('session');
    }


    /**
     * Log the user in
     */
    public function login() {
        $email = $this->input->post('email');
        //$pass = md5($this->input->post('password'));
        //  echo $pass; exit;
        $pass = $this->input->post('password');
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
        $result = $this->db->get('users')->row();
        if ($result) {
            $_SESSION['user']=$result;
            $res = array('status' => 200);
        } else {
            $res = array('status' => 500, 'msg' => 'email or password are not matched');
        }
        echo json_encode($res);
    }

    /**
     * Log the user out
     */
    public function logout() {
        $this->session->sess_destroy();
        redirect('/', 'refresh');
    }

}
