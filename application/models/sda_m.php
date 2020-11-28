<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sda_m extends CI_Model
{
    public $id_user = "";
    public $uraian_sda = "";
    public $volume = "";
    public $satuan_id = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model sda_m
    public function transform($object)
    {
        $sda = new sda_m();
        $sda->id_user = $object->id_user;
        $sda->uraian_sda = $object->uraian_sda;
        $sda->satuan_id = $object->satuan_id;
        $sda->volume = $object->volume;
        $sda->date_created = $object->date_created;
        return $sda;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM sda WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_user = $data->id_user;
        $this->uraian_sda = $data->uraian_sda;
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

        $data = $this->db->query("select * from sda " . $where . " $stringlimit")->result();
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
