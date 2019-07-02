<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Models_general','model');
    }

    public function index()
    {
        if (!$this->model->isLoggedIn()) {
            redirect('auth/login');
        }
        $data['title']      = "dashboard";
        $data['subview']    = "layouts/page";
        $this->load->view('layouts/main', $data);
    }
}
