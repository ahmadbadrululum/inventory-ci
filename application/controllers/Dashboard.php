<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Models_general','model');
        if (!$this->model->isLoggedIn()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['title']      = "dashboard";
        $data['subview']    = "layouts/page";
        $data['sum_product']    = $this->model->count('product');
        $data['sum_invoice']    = $this->model->count('invoice');
        $data['sum_masuk']      = $this->model->countTransaksi('transaksi', 'nomor_invoice', 'BM');
        $data['sum_keluar']     = $this->model->countTransaksi('transaksi', 'nomor_invoice', 'BK');
        // var_dump($data['sum_product']);
        // die;
        $this->load->view('layouts/main', $data);
    }
}
