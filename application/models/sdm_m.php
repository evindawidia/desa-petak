<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sdm_m extends CI_Model
{
    public $id_sdm = "";
    public $uraian_sdm = "";
    public $volume = "";
    public $satuan_id = "";
    public $date_created = "";
    public $kat_sdm_id = "";


    //fungsi untuk transformasi object dari CI menjadi model sdm_m
    public function transform($object)
    {
        $sdm = new sdm_m();
        $sdm->id_sdm = $object->id_sdm;
        $sdm->uraian_sdm = $object->uraian_sdm;
        $sdm->satuan_id = $object->satuan_id;
        $sdm->volume = $object->volume;
        $sdm->date_created = $object->date_created;
        $sdm->kat_sdm_id = $object->kat_sdm_id;
        return $sdm;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM sdm WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_sdm = $data->id_sdm;
        $this->uraian_sdm = $data->uraian_sdm;
        $this->volume = $data->volume;
        $this->satuan_id = $data->satuan_id;
        $this->date_created = $data->date_created;
        $this->kat_sdm_id = $data->kat_sdm_id;
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

        $data = $this->db->query("select * from sdm " . $where . " $stringlimit")->result();
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
