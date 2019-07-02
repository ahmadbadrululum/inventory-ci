<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Models_general','model');
    }

    public function index(){
        $data['title']      = "gudang";
        $data['subview']    = "gudang/index";
        $this->load->view('layouts/main', $data);
    }

    public function showAllData($type){
        $i = 0;
        switch ($type) {
            case 'gudang':
                foreach ($this->model->showAllData('transaksi') as $key){
                    // $data[$i]['tanggal'] = $key->tanggal;
                    $data[$i]['kode'] = $key->code_product;
                    $data[$i]['nama'] = $key->name_product;
                    $stok_awal = $this->model->getFirstStock($key->product_id, 'BM')->total;
                    $data[$i]['stok_awal'] = $stok_awal;
                    $data[$i]['unit_name'] = $key->unit_name;
                    $stok_masuk = $this->model->getSum($key->product_id, 'BM')->sum - $stok_awal;
                    $data[$i]['stok_masuk'] = $stok_masuk;
                    if (!empty($this->model->getSum($key->product_id, 'BK')->sum)) {
                        $stok_keluar = $this->model->getSum($key->product_id, 'BK')->sum;
                    }else{
                        $stok_keluar = 0;
                    }
                    // $data[$i]['stok_keluar'] = $this->model->getSum($key->product_id, 'BK')->sum - $stok_keluar;
                    $data[$i]['stok_keluar'] = $stok_keluar;                    
                    $data[$i]['stok_akhir'] = $stok_awal + $stok_masuk - $stok_keluar;
                    if($data[$i]['stok_akhir'] <= 5) {
                        $ket = 'kurang';
                    }elseif ($data[$i]['stok_akhir'] >= 6 && $data[$i]['stok_akhir'] <= 10 ) {
                        $ket = 'cukup';
                    }else {
                        $ket = 'lebih';
                    }
                    $data[$i]['keterangan'] = $ket; 
                    $i++;

                }
                echo json_encode($data);
                break;
        }
    }

}
