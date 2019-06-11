<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->data['subview']   = "layouts/index";
        $this->load->view('layouts/main', $this->data);
    }
}
