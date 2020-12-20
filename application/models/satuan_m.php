<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_m extends CI_Model
{

    private $table = "satuan";

    public $id_satuan = "";
    public $jenis_satuan = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model satuan_m
    public function transform($object)
    {
        $satuan = new satuan_m();
        $satuan->id_satuan = $object->id_satuan;
        $satuan->jenis_satuan = $object->jenis_satuan;
        $satuan->date_created = $object->date_created;
        return $satuan;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM satuan WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_satuan = $data->id_satuan;
        $this->jenis_satuan = $data->jenis_satuan;
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

        $data = $this->db->query("select * from satuan $where $groupby $orderby $stringlimit")->result();
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
        $this->id_satuan = isset($data['id_satuan']) ? $data['id_satuan'] : $this->id_satuan;
        $this->jenis_satuan = isset($data['jenis_satuan']) ? $data['jenis_satuan'] : $this->jenis_satuan;
        $this->date_created = date("Y-m-d");
    }

    public function write()
    {
        $array = json_decode(json_encode($this), true);
        if ($this->id_satuan == "") {
            $this->db->insert($this->table, $array);
            $id = $this->db->insert_id();
            $this->id_satuan = $id;
            return $id;
        } else {
            $this->db->where('id_satuan', $this->id_satuan);
            $this->db->update($this->table, $array);
            return $this->id_satuan;
        }
        return $id;
    }

    public function delete()
    {
        $this->db->delete('satuan', array('id_satuan' => $this->id_satuan));
        return true;
    }
}
