<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Models_general extends CI_Model
{
    public function showData($table, $type = null)
    {
        if ($type == null) {
            $this->db->order_by('id', 'DESC');
            return $this->db->get($table)->result();
        }
        $this->db->where("nomor_invoice like '%$type%'");
        return $this->db->get($table)->result();
    }
    public function showDataProduct($id = null){
        if ($id == null) {
            $query = "SELECT product.id, code_product, name_product, unit.unit_name FROM product JOIN unit on unit.id = product.unit_product_id order by id desc";
            return $this->db->query($query)->result();
        }
        $query = "SELECT product.id, code_product, name_product, unit.unit_name FROM product JOIN unit on unit.id = product.unit_product_id WHERE product.id = $id";
        return $this->db->query($query)->row();
    }

    public function saveData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function getData($table, $field, $records)
    {
        $query = "SELECT * FROM $table WHERE $field = '$records'";
        return $this->db->query($query)->row_array();
    }

    public function updateData($id, $table, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    public function deleteData($id, $table)
    {
        $this->db->delete($table, ['id' => $id]);
    }

    // TRANSAKSI
    public function getIdLimit($table, $flag)
    {
        $query = "SELECT count(*) as jml FROM $table where nomor_invoice like '%$flag%'";
        return $this->db->query($query)->row();
    }


    public function showAllData($table, $type = null)
    {
        if ($type == null) {
            $query = "SELECT $table.product_id, product.code_product, product.name_product, unit.unit_name FROM $table left join product on $table.product_id=product.id left join unit on product.unit_product_id=unit.id GROUP BY product_id DESC";
            return $this->db->query($query)->result();
        } else {
            $query = "SELECT $table.nomor_invoice, $table.id, $table.tanggal, product.code_product, product.name_product, unit.unit_name, $table.total from product join $table on $table.product_id = product.id join unit on unit.id = product.unit_product_id where nomor_invoice like '%$type%' ORDER BY $table.id DESC";
            return $this->db->query($query)->result();
        }
    }

    public function getFirstStock($product_id, $type)
    {
        $this->db->where("product_id = $product_id and nomor_invoice like '%$type%'");
        $this->db->order_by("tanggal");
        $this->db->limit(1);
        return $this->db->get("transaksi")->row();
    }

    public function getSum($product_id, $type)
    {
        $this->db->select("sum(total) as sum");
        $this->db->where("nomor_invoice like '%$type%' and product_id = $product_id");
        return $this->db->get("transaksi")->row();
    }

    public function getIdproduct()
    {
        $query = "SELECT DISTINCT product_id FROM transaksi";
        return $this->db->query($query)->result();
    }


    public function getDataUser($table, $username, $password)
    {
        $query = "SELECT * FROM $table WHERE username = '$username' AND password ='$password'";
        return $this->db->query($query)->num_rows();
    }

    public function isLoggedIn()
    {
        if (!isset($_SESSION['loggedIn'])) {
            return false;
        } else {
            return true;
        }
        // if (isset($this->session->userdata('log'))) {
        //     return true;
        // }
        // else return false;
    }
}


