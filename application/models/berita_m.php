<?php
defined('BASEPATH') or exit('No direct script access allowed');

class berita_m extends CI_Model
{
    public $id_berita = "";
    public $judul_berita = "";
    public $content_berita = "";
    public $date_created = "";
    public $url_segment = "";
    public $kat_berita_id = "";
    public $image = "";



    //fungsi untuk transformasi object dari CI menjadi model berita_m
    public function transform($object)
    {
        $berita = new berita_m();
        $berita->id_berita = $object->id_berita;
        $berita->judul_berita = $object->judul_berita;
        $berita->content_berita = $object->content_berita;
        $berita->date_created = $object->date_created;
        $berita->url_segment = $object->url_segment;
        $berita->kat_berita_id = $object->kat_berita_id;
        $berita->image = $object->image;
        return $berita;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM berita WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_berita = $data->id_berita;
        $this->judul_berita = $data->judul_berita;
        $this->content_berita = $data->content_berita;
        $this->date_created = $data->date_created;
        $this->url_segment = $data->url_segment;
        $this->kat_berita_id = $data->kat_berita_id;
        $this->image = $data->image;

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

        $data = $this->db->query("select * from berita " . $where . " $stringlimit")->result();
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
