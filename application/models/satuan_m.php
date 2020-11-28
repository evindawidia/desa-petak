<?php
defined('BASEPATH') or exit('No direct script access allowed');

class satuan_m extends CI_Model
{
    public $id_satuan = "";
    public $jenis_satuan = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model satuan_m
    public function transform($object)
    {
        $satuan = new satuan_m();
        $satuan->id_satuan = $object->id_satuan;
        $satuan->jenis_satuan = $object->jenis_satuan;
        $satuan->date_created = $object->date_created;
        return $satuan;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM satuan WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_satuan = $data->id_satuan;
        $this->jenis_satuan = $data->jenis_satuan;
        $this->date_created = $data->date_created;
        return $this;
    }
    // funsi mendapat lebih dari satu baris
    public function get($where = "", $stringlimit = "")
    {
        // dibuat default value "" karena tidak semuanya butuh where atau limit 

        // maksud dari string limit untuk memberi batasan berapa sampai berapa baris
        if ($stringlimit != "") {
            $stringlimit = "limit " . $stringlimit;
        }

        //set untuk where
        if ($where != "") {
            $where = "where " . $where;
        }

        $data = $this->db->query("select * from satuan " . $where . " $stringlimit")->result();
        if (count($data) != 0) {
            $result = [];
            foreach ($data as $row) {
                array_push($result, $this->transform($row));
            }
            return $result;
        } else {
            return null;
        }
    }
}
