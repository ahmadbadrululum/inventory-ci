<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Models_general','model');
        $this->load->library('encryption');
        
    }

    public function harusLogin(){
        if (!$this->model->isLoggedIn() || $_SESSION['role'] == 'admin') {
            redirect('auth/login');
        }
    }

    public function index(){
        $this->harusLogin();
        $data['title']      = "login";
        $data['subview']    = "auth/index";
        $this->load->view('layouts/main', $data);
    }

    public function showData($role){
        $this->harusLogin();
        if ($role == 'cfo') {
            $data = $this->model->showDataUser('users',$role,'admin');
            echo json_encode($data);
        }else {
            $data = $this->model->showData('users');
            echo json_encode($data);
        }

    }
    public function register(){
        $this->harusLogin();
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $role = $this->input->post('role');
        $data = [
            'username' => $username,
            'role' => $role,
            'status' => 'aktif',
            'password' => $password,
        ];
        $this->model->saveData('users', $data);
        $res['message'] = 'success';
        echo json_encode($res);
    }

    public function getId(){
        $this->harusLogin();
        $getuser = $this->model->getData('users', 'id', $this->input->post('id'));
        echo json_encode($getuser); 
    }

    public function updateUser(){
        $this->harusLogin();
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $role = $this->input->post('role');
        $data = [
            'username' => $username,
            'role' => $role,
            'status' => 'aktif',
            'password' => $password,
        ];
        $this->model->updateData($id, 'users', $data);
        $res['message'] = 'success';
        echo json_encode($res);
    }

    public function deleteData(){
        $this->model->deleteData($this->input->post('id'), 'users');
        $res['message'] = 'success';
        echo json_encode($res);       
    }

    public function login(){
        if ($this->model->isLoggedIn()) {
            redirect('dashboard');
        }
        $data['title']  = "login";
        $data['subview']= "auth/login";
        $this->load->view('auth/main', $data);
    }

    public function loginSubmit(){   
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $result = $this->model->getDataUser('users', $username, $password);
        $id     = $this->model->getDataUser('users', $username, $password, 'username');
        // var_dump($id);
        if ($result > 0) {
            echo "ok";
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role']     = $id['role'];
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
