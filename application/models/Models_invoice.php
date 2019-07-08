<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Models_invoice extends CI_Model{

    public function getSum($id){
        $query = "SELECT SUM(total) as total_akhir FROM `detail_invoice` WHERE invoice_detail_id = $id";
        return $this->db->query($query)->row();
    }

}


