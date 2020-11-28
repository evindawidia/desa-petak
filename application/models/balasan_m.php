<?php
defined('BASEPATH') or exit('No direct script access allowed');

class balasan_m extends CI_Model
{
    public $id_balasan = "";
    public $comment = "";
    public $date_created = "";
    public $pengaduan_id = "";

    //fungsi untuk transformasi object dari CI menjadi model balasan_m
    public function transform($object)
    {
        $balasan = new balasan_m();
        $balasan->id_balasan = $object->id_balasan;
        $balasan->comment = $object->comment;
        $balasan->date_created = $object->date_created;
        $balasan->pengaduan_id = $object->pengaduan_id;
        return $balasan;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM balasan WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_balasan = $data->id_balasan;
        $this->comment = $data->comment;
        $this->date_created = $data->date_created;
        $this->pengaduan_id = $data->pengaduan_id;
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

        $data = $this->db->query("select * from balasan " . $where . " $stringlimit")->result();
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
