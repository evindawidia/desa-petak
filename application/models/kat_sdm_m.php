<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kat_sdm_m extends CI_Model
{
    public $id_kat_sdm = "";
    public $kat_sdm = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model kat_sdm_m
    public function transform($object)
    {
        $kat_sdm = new kat_sdm_m();
        $kat_sdm->id_kat_sdm = $object->id_kat_sdm;
        $kat_sdm->kat_sdm = $object->kat_sdm;
        $kat_sdm->date_created = $object->date_created;
        return $kat_sdm;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM kat_sdm WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_kat_sdm = $data->id_kat_sdm;
        $this->kat_sdm = $data->kat_sdm;
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

        $data = $this->db->query("select * from kat_sdm " . $where . " $stringlimit")->result();
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
