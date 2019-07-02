<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Models_general','model');
        $this->load->library('encryption');
    }

    public function login(){
        if ($this->model->isLoggedIn()) {
            redirect('dashboard');
        }
        $data['title']      = "login";
        $data['subview']= "auth/login";
        $this->load->view('auth/main', $data);
    }

    public function loginSubmit(){   
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $result = $this->model->getDataUser('users', $username, $password);
        if ($result > 0) {
            echo "ok";
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $username;
            // $dataSession = [
            //     'log' => true,
            //     'username' => $username,
            //     'password' => $password,
            // ];
            // $this->session->set_userdata($dataSession);
        }else {
            echo "not";
        }
    }

    public function logout(){
        session_destroy();
    }
}
