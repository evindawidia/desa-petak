<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sarana_m extends CI_Model
{
    public $id_sarana = "";
    public $uraian_sarana = "";
    public $volume = "";
    public $satuan_id = "";
    public $kat_sarana_id = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model sarana_m
    public function transform($object)
    {
        $sarana = new sarana_m();
        $sarana->id_sarana = $object->id_sarana;
        $sarana->uraian_sarana = $object->uraian_sarana;
        $sarana->satuan_id = $object->satuan_id;
        $sarana->volume = $object->volume;
        $sarana->kat_sarana_id = $object->kat_sarana_id;
        $sarana->date_created = $object->date_created;
        return $sarana;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM sarana WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_sarana = $data->id_sarana;
        $this->uraian_sarana = $data->uraian_sarana;
        $this->volume = $data->volume;
        $this->satuan_id = $data->satuan_id;
        $this->kat_sarana_id = $data->kat_sarana_id;
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

        $data = $this->db->query("select * from sarana " . $where . " $stringlimit")->result();
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
