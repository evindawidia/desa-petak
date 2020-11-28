<?php
defined('BASEPATH') or exit('No direct script access allowed');

class comment_m extends CI_Model
{
    public $id_comment = "";
    public $comment = "";
    public $sender_name = "";
    public $address = "";
    public $date_created = "";
    public $berita_id = "";


    //fungsi untuk transformasi object dari CI menjadi model comment_m
    public function transform($object)
    {
        $comment = new comment_m();
        $comment->id_comment = $object->id_comment;
        $comment->comment = $object->comment;
        $comment->address = $object->address;
        $comment->sender_name = $object->sender_name;
        $comment->date_created = $object->date_created;
        $comment->berita_id = $object->berita_id;
        return $comment;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM comment WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_comment = $data->id_comment;
        $this->comment = $data->comment;
        $this->sender_name = $data->sender_name;
        $this->address = $data->address;
        $this->date_created = $data->date_created;
        $this->berita_id = $data->berita_id;
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

        $data = $this->db->query("select * from comment " . $where . " $stringlimit")->result();
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
