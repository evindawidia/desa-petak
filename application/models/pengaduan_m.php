<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengaduan_m extends CI_Model
{
    public $id_pengaduan = "";
    public $sender_name = "";
    public $nik = "";
    public $comment = "";
    public $address = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model pengaduan_m
    public function transform($object)
    {
        $pengaduan = new pengaduan_m();
        $pengaduan->id_pengaduan = $object->id_pengaduan;
        $pengaduan->sender_name = $object->sender_name;
        $pengaduan->comment = $object->comment;
        $pengaduan->nik = $object->nik;
        $pengaduan->address = $object->address;
        $pengaduan->date_created = $object->date_created;
        return $pengaduan;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM pengaduan WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_pengaduan = $data->id_pengaduan;
        $this->sender_name = $data->sender_name;
        $this->nik = $data->nik;
        $this->comment = $data->comment;
        $this->address = $data->address;
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

        $data = $this->db->query("select * from pengaduan " . $where . " $stringlimit")->result();
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
