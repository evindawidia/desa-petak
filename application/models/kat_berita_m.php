<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kat_berita_m extends CI_Model
{
    private $table = "kat_berita";

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

        $data = $this->db->query("select * from kat_berita $where $groupby $orderby $stringlimit")->result();
        $result = [];
        if (count($data) != 0) {
            foreach ($data as $row) {
                array_push($result, $this->transform($row));
            }
        }
        return $result;
    }
    public function update($data)
    {
        $this->id_kat_berita = isset($data['id_kat_berita']) ? $data['id_kat_berita'] : $this->id_kat_berita;
        $this->kat_berita = isset($data['kat_berita']) ? $data['kat_berita'] : $this->id_kat_berita;
        $this->date_created = date("Y-m-d");
    }

    public function write()
    {
        $array = json_decode(json_encode($this), true);
        if ($this->id_kat_berita == "") {
            $this->db->insert($this->table, $array);
            $id = $this->db->insert_id();
            $this->id_kat_berita = $id;
            return $id;
        } else {
            $this->db->where('id_kat_berita', $this->id_kat_berita);
            $this->db->update($this->table, $array);
            return $this->id_kat_berita;
        }
    }

    public function delete()
    {
        $this->db->delete('kat_berita', array('id_kat_berita' => $this->id_berita));
        return true;
    }
}
