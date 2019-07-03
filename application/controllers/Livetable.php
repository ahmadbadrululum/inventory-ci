<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Livetable extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('Models_crud','model');
    }

    public function index(){
        $data['title']      = "dashboard";
        $data['subview']    = "live_crud";
        $this->load->view('layouts/main', $data);
    }

    public function showData(){
        $data = $this->model->getData('sample_data');
        echo json_encode($data);
    }

    public function insertData(){
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $age = $this->input->post('age');
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'age' => $age,
        ];
        $this->model->insertData('sample_data', $data);
        $data['message'] = 'success';
        echo json_encode($data);
    }

    public function updateData(){
        $table_column = $this->input->post('table_column');
        $value = $this->input->post('value');
        $id = $this->input->post('id');
        $data = [
            $table_column => $value,
        ];
        $this->model->updateData('sample_data', $data, $id);
        $data['message'] = 'success';
        echo json_encode($data);
    }

    public function deleteData(){
        $this->model->deleteData('sample_data', $this->input->post('id'));
        $data['message'] = 'success';
        echo json_encode($data);
    }
}
?>
