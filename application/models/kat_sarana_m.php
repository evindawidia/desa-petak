<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kat_sarana_m extends CI_Model
{
    private $table = "kat_sarana";

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

        $data = $this->db->query("select * from kat_sarana $where $groupby $orderby $stringlimit")->result();
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
        $this->id_kat_sarana = isset($data['id_kat_sarana']) ? $data['id_kat_sarana'] : $this->id_kat_sarana;
        $this->kat_sarana = isset($data['kat_sarana']) ? $data['kat_sarana'] : $this->id_kat_sarana;
        $this->date_created = date("Y-m-d");
    }

    public function write()
    {
        $array = json_decode(json_encode($this), true);
        if ($this->id_kat_sarana == "") {
            $this->db->insert($this->table, $array);
            $id = $this->db->insert_id();
            $this->id_kat_sarana = $id;
            return $id;
        } else {
            $this->db->where('id_kat_sarana', $this->id_kat_sarana);
            $this->db->update($this->table, $array);
            return $this->id_kat_sarana;
        }
    }

    public function delete()
    {
        $this->db->delete('kat_sarana', array('id_kat_sarana' => $this->id_sarana));
        return true;
    }
}
