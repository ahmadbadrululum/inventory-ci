<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Models_crud extends CI_Model{
    
    public function getData($table){
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($table);
        return $query->result();
    }

    public function insertData($table, $data){
        $this->db->insert($table, $data);
    }

    public function updateData($table, $data, $id){
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    public function deleteData($table, $id){
        $this->db->delete($table, ['id' => $id]);
    }

}


