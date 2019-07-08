<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Models_general','model');
        if (!$this->model->isLoggedIn()) {
            redirect('auth/login');
        }
    }

    public function index(){
        $data['title']      = "satuan";
        $data['subview']    = "unit/index";
        $this->load->view('layouts/main', $data);
    }

    public function showData(){
        $dataUnit = $this->model->showData('unit');
        echo json_encode($dataUnit);
    }

    public function saveData(){
        $unitName = $this->input->post('unit_name'); 
        if ($unitName == '') {
            $result['message'] = "satuan harus diisi";
        }else{
            $result['message'] = "";
            $data = [
                'unit_name' => $unitName,
            ];
            $this->model->saveData('unit', $data);
        }
        echo json_encode($result);
    }

    public function getId(){
        $id = $this->input->post('id');
        $checkId = $this->model->getData('unit','id', $id);
        echo json_encode($checkId);
    }

    public function updateData(){
        $id = $this->input->post('id'); 
        $unitName = $this->input->post('unit_name'); 
        if ($unitName == '') {
            $result['message'] = "satuan harus diisi";
        }else{
            $result['message'] = "";
            $data = [
                'unit_name' => $unitName,
            ];
            $this->model->updateData($id,'unit', $data);
        }
        echo json_encode($result);       
    }

    public function deleteData(){
        $id = $this->input->post('id');
        $this->model->deleteData($id,'unit');
        $result['message'] = "";
        echo json_encode($result);       
    }
}
