<?php
defined('BASEPATH') or exit('No direct script access allowed');

class organisasi_m extends CI_Model
{
    public $id_user = "";
    public $uraian_organisasi = "";
    public $volume = "";
    public $satuan_id = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model organisasi_m
    public function transform($object)
    {
        $organisasi = new organisasi_m();
        $organisasi->id_user = $object->id_user;
        $organisasi->uraian_organisasi = $object->uraian_organisasi;
        $organisasi->satuan_id = $object->satuan_id;
        $organisasi->volume = $object->volume;
        $organisasi->date_created = $object->date_created;
        return $organisasi;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM organisasi WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_user = $data->id_user;
        $this->uraian_organisasi = $data->uraian_organisasi;
        $this->volume = $data->volume;
        $this->satuan_id = $data->satuan_id;
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

        $data = $this->db->query("select * from organisasi " . $where . " $stringlimit")->result();
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
