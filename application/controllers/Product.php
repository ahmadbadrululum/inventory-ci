<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Models_general','model');
    }

    public function index(){
        $data['title']      = "barang";
        $data['subview']    = "product/index";
        $data['unit']    = $this->model->showData('unit');
        $this->load->view('layouts/main', $data);
    }

    public function showData(){
        $dataProduct = $this->model->showDataProduct();
        echo json_encode($dataProduct);
    }

    public function saveData(){
        $productCode = $this->input->post('product_code');
        $productName = $this->input->post('product_name'); 
        $unitId = $this->input->post('select_satuan'); 
        $checkKode = $this->model->getData('product', 'code_product', $productCode);
        if ($productCode == '') {
            $result['message'] = "kode barang harus diisi";
        }elseif ($checkKode != '') {
            $result['message'] = "kode barang sudah ada";
        }elseif ($productName == '') {
            $result['message'] = "nama barang harus diisi";
        }elseif ($unitId == '') {
            $result['message'] = "satuan barang harus diisi";
        }else{
            $result['message'] = "";
            $data = [
                'code_product' => $productCode,
                'name_product' => $productName,
                'unit_product_id' => $unitId,
            ];
            $this->model->saveData('product', $data);
        }
        echo json_encode($result);
    }

    public function getId(){
        $id = $this->input->post('id');
        $checkId = $this->model->getData('product','id', $id);
        echo json_encode($checkId);
    }
    
    public function getIdSatuan(){
        $checkId = $this->model->showDataProduct($this->input->post('id'));
        echo json_encode($checkId);
    }
    
    public function updateData(){
        $id = $this->input->post('id');        
        $productCode = $this->input->post('product_code');
        $productName = $this->input->post('product_name');
        $unitId = $this->input->post('select_satuan'); 
        if ($productCode == '') {
            $result['message'] = "kode barang harus diisi";
        }elseif ($productName == '') {
            $result['message'] = "nama barang harus diisi";
        }elseif ($unitId == '') {
            $result['message'] = "satuan barang harus diisi";
        }else{
            $result['message'] = "";
            $data = [
                'code_product' => $productCode,
                'name_product' => $productName,
                'unit_product_id' => $unitId,
            ];
            $this->model->updateData($id,'product', $data);
        }
        echo json_encode($result);
    }

    public function deleteData(){
        $id = $this->input->post('id');      
        $this->model->deleteData($id,'product');
        $result['message'] = "";
        echo json_encode($result);
    }

}
