<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Invoice extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Models_general','model');
        $this->load->model('Models_invoice', 'minvoice');
        if (!$this->model->isLoggedIn()) {
            redirect('auth/login');
        }
    }

    public function index(){
        $data['title']      = "invoice";
        $data['subview']    = "invoice/index";
        $this->load->view('layouts/main', $data);
    }

    public function showData(){
        $data = $this->model->showData('invoice');
        echo json_encode($data);
    }

    public function getId(){
        $result = $this->model->getIdLimit('invoice', 'INV', 'no_invoice')->jml;
        echo $result;
    }

    public function saveData(){
        $no_invoice = $this->input->post('nomor_invoice');
        $keterangan = $this->input->post('keterangan');
        if ($keterangan == "") {
            $result['message'] = "keterangan harus diisi";
        }else{
            $result['message'] = "";
            $data = [
                'no_invoice'    => $no_invoice,
                'keterangan'    => $keterangan,
                'status_1'        => 0,
                'status_1'        => 0,
            ];
            $this->model->saveData('invoice', $data);
        }
        echo json_encode($result);
    }

    public function getIdData(){
        $id = $this->input->post('id');
        $result = $this->model->getData('invoice', 'id', $id);
        echo json_encode($result);
    }


    public function update(){
        $id   = $this->input->post('id');
        $no_invoice = $this->input->post('nomor_invoice');
        $keterangan = $this->input->post('keterangan');
        if ($keterangan == "") {
            $result['message'] = "keterangan harus diisi";
        }else{
            $result['message'] = "";
            $data = [
                'no_invoice'    => $no_invoice,
                'keterangan'    => $keterangan,
                // 'status_1'        => 0,
                // 'status_1'        => 0,
            ];
            $this->model->updateData($id,'invoice', $data);
        }
        echo json_encode($result);
    }


    public function delete(){
        $id = $this->input->post('id');      
        $this->model->deleteData($id,'invoice');
        $result['message'] = "";
        echo json_encode($result);  
    }

// ====================
    public function detail($id){
        $data['title']      = "invoice";
        $data['subview']    = "invoice/detail";
        $data['invoice']    = $this->model->getData('invoice', 'id', $id);
        $data['data']       = $this->model->getDataResult('detail_invoice', 'invoice_detail_id', $id);
        $data['id']         = $id;
        $this->load->view('layouts/main', $data);
    }
    
    public function detailShow($id){
        $data['invoice']    = $this->model->getData('invoice', 'id', $id);
        $data['data']  = $this->model->getDataResult('detail_invoice', 'invoice_detail_id', $id);
        $data['sum']   = $this->minvoice->getSum($id);        
        echo json_encode($data);        
    }

    public function detailInsert(){
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga'),
            'quantity' => $this->input->post('qty'),
            'satuan' => $this->input->post('satuan'),
            'total' => $this->input->post('total'),
            'invoice_detail_id' => $this->input->post('invoice_id'),
        ];
        $this->model->saveData('detail_invoice', $data);
        $data['message'] = 'success';
        echo json_encode($data);
    }

    public function detailUpdate(){
        $table_column = $this->input->post('table_column');
        $value = $this->input->post('value');
        $id = $this->input->post('id');
        $total = $this->input->post('total');

        $data = [
            $table_column => $value,
            'total' => $total,
        ];
        $this->model->updateData($id, 'detail_invoice', $data);
        $data['message'] = 'success';
        echo json_encode($data);
    }

    public function deleteData(){
        $this->model->deleteData($this->input->post('id'), 'detail_invoice');
        $data['message'] = 'success';
        echo json_encode($data);
    }

    public function catatan(){
        $data = [
            'catatan' => $this->input->post('catatan')
        ];
        $update = $this->model->updateData($this->input->post('invoice_id'), 'invoice', $data);
    }

    public function updatestatus($colomn){
        $data = [
            $colomn => $this->input->post('status')
        ];
        $update = $this->model->updateData($this->input->post('invoice_id'), 'invoice', $data);
        $data['message'] = 'success';
        echo json_encode($data);
    }

}
?>
