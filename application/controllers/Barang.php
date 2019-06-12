<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function index()
    {
        $this->data['subview']   = "barang/index";
        $this->load->view('layouts/main', $this->data);
    }
}
