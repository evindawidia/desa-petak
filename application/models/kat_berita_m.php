<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kat_berita_m extends CI_Model
{
    public $id_kat_berita = "";
    public $kat_berita = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model kat_berita_m
    public function transform($object)
    {
        $kat_berita = new kat_berita_m();
        $kat_berita->id_kat_berita = $object->id_kat_berita;
        $kat_berita->kat_berita = $object->kat_berita;
        $kat_berita->date_created = $object->date_created;
        return $kat_berita;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM kat_berita WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_kat_berita = $data->id_kat_berita;
        $this->kat_berita = $data->kat_berita;
        $this->date_created = $data->date_created;
        return $this;
    }
    // funsi mendapat lebih dari satu baris
    public function get($where = "", $groupby="", $orderby="" ,$stringlimit = "")
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
        if ($groupby != "") {
            $groupby = "group by " . $groupby;
        }
        if ($orderby != "") {
            $orderby = "order by " . $orderby;
        }

        $data = $this->db->query("select * from kat_berita $where $groupby $orderby $stringlimit")->result();
        $result = [];
        if (count($data) != 0) {
            foreach ($data as $row) {
                array_push($result, $this->transform($row));
            }
        }
        return $result;
    }
}
