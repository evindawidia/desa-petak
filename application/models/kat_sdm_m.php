<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kat_sdm_m extends CI_Model
{
    private $table = "kat_sdm";

    public $id_kat_sdm = "";
    public $kat_sdm = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model kat_sdm_m
    public function transform($object)
    {
        $kat_sdm = new kat_sdm_m();
        $kat_sdm->id_kat_sdm = $object->id_kat_sdm;
        $kat_sdm->kat_sdm = $object->kat_sdm;
        $kat_sdm->date_created = $object->date_created;
        return $kat_sdm;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM kat_sdm WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_kat_sdm = $data->id_kat_sdm;
        $this->kat_sdm = $data->kat_sdm;
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

        $data = $this->db->query("select * from kat_sdm $where $groupby $orderby $stringlimit")->result();
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
        $this->id_kat_sdm = isset($data['id_kat_sdm']) ? $data['id_kat_sdm'] : $this->id_kat_sdm;
        $this->kat_sdm = isset($data['kat_sdm']) ? $data['kat_sdm'] : $this->id_kat_sdm;
        $this->date_created = date("Y-m-d");
    }

    public function write()
    {
        $array = json_decode(json_encode($this), true);
        if ($this->id_kat_sdm == "") {
            $this->db->insert($this->table, $array);
            $id = $this->db->insert_id();
            $this->id_kat_sdm = $id;
            return $id;
        } else {
            $this->db->where('id_kat_sdm', $this->id_kat_sdm);
            $this->db->update($this->table, $array);
            return $this->id_kat_sdm;
        }
    }

    public function delete()
    {
        $this->db->delete('kat_sdm', array('id_kat_sdm' => $this->id_sdm));
        return true;
    }
}
