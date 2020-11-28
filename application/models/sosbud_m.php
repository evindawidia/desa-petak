<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sosbud_m extends CI_Model
{
    public $id_sosbud = "";
    public $uraian_sosbud = "";
    public $volume = "";
    public $satuan_id = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model sosbud_m
    public function transform($object)
    {
        $sosbud = new sosbud_m();
        $sosbud->id_sosbud = $object->id_sosbud;
        $sosbud->uraian_sosbud = $object->uraian_sosbud;
        $sosbud->satuan_id = $object->satuan_id;
        $sosbud->volume = $object->volume;
        $sosbud->date_created = $object->date_created;
        return $sosbud;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM sosbud WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_sosbud = $data->id_sosbud;
        $this->uraian_sosbud = $data->uraian_sosbud;
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

        $data = $this->db->query("select * from sosbud " . $where . " $stringlimit")->result();
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
