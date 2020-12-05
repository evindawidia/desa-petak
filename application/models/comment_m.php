<?php
defined('BASEPATH') or exit('No direct script access allowed');

class comment_m extends CI_Model
{
    private $table = "comment";

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
    public function get($where = "", $groupby = "", $orderby = "", $stringlimit = "")
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

        $data = $this->db->query("select * from comment $where $groupby $orderby $stringlimit")->result();
        $result = [];
        if (count($data) != 0) {
            foreach ($data as $row) {
                array_push($result, $this->transform($row));
            }
        }
        return $result;
    }
    public function update($data){
        $this->id_comment =isset($data['id_comment']) ?$data['id_comment'] : $this->id_comment;
        $this->comment = isset($data['comment']) ?$data['comment'] : $this->comment;
        $this->sender_name = isset($data['sender_name']) ?$data['sender_name'] : $this->sender_name;
        $this->address = isset($data['address']) ?$data['address'] : $this->address;
        $this->date_created = date("Y-m-d");
        $this->berita_id = isset($data['id_berita']) ?$data['id_berita'] : $this->id_berita;
    }

    public function write(){
        $array = json_decode(json_encode($this), true);
        if ($this->id_comment == "") {
            $this->db->insert($this->table, $array);
            $id = $this->db->insert_id();
            $this->id_comment = $id;
            return $id;
        }else{
            $this->db->where('id_comment', $this->id_comment);
            $this->db->update($this->table, $array);
            return $this->id_comment;
        }
        return $id;
    }

    public function delete(){
        $this->db->delete('comment', array('id_comment' => $this->id_comment)); 
        return true;
    }
    public function getBerita()
    {
        return $this->berita->get_one("id_berita = '".$this->berita_id."'")
    }
}
