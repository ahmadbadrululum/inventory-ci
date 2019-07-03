<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Models_general','model');
    }

    public function home($type){
        switch ($type) {
            case 'masuk':
                $data['title']      = "data masuk";
                $data['subview']    = "transaksi/masuk";
                $data['product']    = $this->model->showData('product');
                $data['unit']    = $this->model->showData('unit');
                $this->load->view('layouts/main', $data);
                break;

            case 'keluar':
                $data['title']      = "data keluar";
                $data['subview']    = "transaksi/keluar";
                $data['product']    = $this->model->showData('product');
                $data['productid']  = $this->model->getIdproduct();
                $data['unit']    = $this->model->showData('unit');
                $this->load->view('layouts/main', $data);
                break;
        }
    }


    public function getId($type){
        switch ($type) {
            case 'masuk':
                $result = $this->model->getIdLimit('transaksi', 'BM')->jml;
                echo $result;
                break;
            case 'keluar':
                $result = $this->model->getIdLimit('transaksi', 'BK')->jml;
                echo $result;
                break;
        }
    }

    public function showAllData($type){
        switch ($type) {
            case 'masuk':
                $dataMasuk = $this->model->showAllData('transaksi', 'BM');
                echo json_encode($dataMasuk);
                break;
            case 'keluar':
                $dataKeluar = $this->model->showAllData('transaksi', 'BK');
                echo json_encode($dataKeluar);
                break;
        }
    }

    public function saveData($type){
        $noInvoice   = $this->input->post('nomor_invoice');
        $idBarang = $this->input->post('selectBarang');
        $jumlah = $this->input->post('jumlah');
        switch ($type) {
            case 'masuk':
                $tanggal_masuk = $this->input->post('tanggal_masuk');
                if ($tanggal_masuk == "") {
                    $result['message'] = "tanggal harus diisi";
                }elseif ($idBarang == "") {
                    $result['message'] = "barang harus disi";
                }elseif ($jumlah == '') {
                    $result['message'] = "jumlah harus diisi";
                }else{
                    $result['message'] = "";
                    $ArrTanggal = explode("/",$tanggal_masuk);
                    $tanggal = $ArrTanggal[2].'-'.$ArrTanggal[1].'-'.$ArrTanggal[0];
                    $data = [
                        'nomor_invoice' => $noInvoice,
                        'tanggal'       => $tanggal,
                        'product_id'    => $idBarang,
                        'total'         => $jumlah,
                    ];
                    $this->model->saveData('transaksi', $data);
                }
                echo json_encode($result);
                break;

            case 'keluar':
                $tanggal_keluar = $this->input->post('tanggal_keluar');
                if ($tanggal_keluar == "") {
                    $result['message'] = "tanggal harus diisi";
                }elseif ($idBarang == "") {
                    $result['message'] = "barang harus disi";
                }elseif ($jumlah == '') {
                    $result['message'] = "jumlah harus diisi";
                }else{
                    $result['message'] = "";
                    $ArrTanggal = explode("/",$tanggal_keluar);
                    $tanggal = $ArrTanggal[2].'-'.$ArrTanggal[1].'-'.$ArrTanggal[0];
                    $data = [
                        'nomor_invoice' => $noInvoice,
                        'tanggal'       => $tanggal,
                        'product_id'    => $idBarang,
                        'total'         => $jumlah,
                    ];
                    $this->model->saveData('transaksi', $data);
                }

                echo json_encode($result);
                break;
        }
        
    }

    public function getIdData($type){
        switch ($type) {
            case 'masuk':
                $id = $this->input->post('id');
                $result = $this->model->getData('transaksi', 'id', $id, 'JOIN');
                echo json_encode($result);
                break;
            case 'keluar':

                $id = $this->input->post('id');
                $data['result'] = $this->model->getData('transaksi', 'id', $id, 'JOIN');
                $productid = $data['result']['product_id'];
                $masuk = $this->model->getSum($productid, 'BM')->sum;
                $keluar = $this->model->getSum($productid, 'BK')->sum;
                $data['total'] = $masuk - $keluar;
                // $data['cekid'] = $this->model->showDataProduct($productid);
                echo json_encode($data);
                break;
        }
        
    }

    public function updateData($type){
        $id   = $this->input->post('id');
        $noInvoice   = $this->input->post('nomor_invoice');
        $idBarang = $this->input->post('selectBarang');
        $jumlah = $this->input->post('jumlah');
        switch ($type) {
            case 'masuk':
                $tanggal_masuk = $this->input->post('tanggal_masuk');
                if ($tanggal_masuk == "") {
                    $result['message'] = "tanggal harus diisi";
                }elseif ($idBarang == "") {
                    $result['message'] = "barang harus disi";
                }elseif ($jumlah == '') {
                    $result['message'] = "jumlah harus diisi";
                }else{
                    $result['message'] = "";
                    $ArrTanggal = explode("/",$tanggal_masuk);
                    $tanggal = $ArrTanggal[2].'-'.$ArrTanggal[1].'-'.$ArrTanggal[0];
                    $data = [
                        'nomor_invoice' => $noInvoice,
                        'tanggal' => $tanggal,
                        'product_id'    => $idBarang,
                        'total'         => $jumlah,
                    ];
                    $this->model->updateData($id,'transaksi', $data);
                }
                echo json_encode($result);
                break;
            case 'keluar':
                $tanggal_keluar = $this->input->post('tanggal_keluar');
                if ($tanggal_keluar == "") {
                    $result['message'] = "tanggal harus diisi";
                }elseif ($idBarang == "") {
                    $result['message'] = "barang harus disi";
                }elseif ($jumlah == '') {
                    $result['message'] = "jumlah harus diisi";
                }else{
                    $result['message'] = "";
                    $ArrTanggal = explode("/",$tanggal_keluar);
                    $tanggal = $ArrTanggal[2].'-'.$ArrTanggal[1].'-'.$ArrTanggal[0];
                    $data = [
                        'nomor_invoice' => $noInvoice,
                        'tanggal' => $tanggal,
                        'product_id'    => $idBarang,
                        'total'         => $jumlah,
                    ];
                    $this->model->updateData($id,'transaksi', $data);
                }
                echo json_encode($result);
                break;
        }
    }


    public function deleteData($type){
        switch ($type) {
            case 'masuk':
                $id = $this->input->post('id');      
                $this->model->deleteData($id,'transaksi');
                $result['message'] = "";
                echo json_encode($result);                
                break;
            case 'keluar':
                $id = $this->input->post('id');      
                $this->model->deleteData($id,'transaksi');
                $result['message'] = "";
                echo json_encode($result);    
                break;
        }
    }

    public function getIdSatuan(){
        $masuk = $this->model->getSum($this->input->post('id'), 'BM')->sum;
        $keluar = $this->model->getSum($this->input->post('id'), 'BK')->sum;
        $data['total'] = $masuk - $keluar;
        $data['cekid'] = $this->model->showDataProduct($this->input->post('id'));
        echo json_encode($data);
    }
    
}
