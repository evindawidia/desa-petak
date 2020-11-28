<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kat_sarana_m extends CI_Model
{
    public $id_kat_sarana = "";
    public $kat_sarana = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model kat_sarana_m
    public function transform($object)
    {
        $kat_sarana = new kat_sarana_m();
        $kat_sarana->id_kat_sarana = $object->id_kat_sarana;
        $kat_sarana->kat_sarana = $object->kat_sarana;
        $kat_sarana->date_created = $object->date_created;
        return $kat_sarana;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM kat_sarana WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_kat_sarana = $data->id_kat_sarana;
        $this->kat_sarana = $data->kat_sarana;
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

        $data = $this->db->query("select * from kat_sarana " . $where . " $stringlimit")->result();
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
