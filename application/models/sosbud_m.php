<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sosbud_m extends CI_Model
{
    private $table = "sosbud";

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

        $data = $this->db->query("select * from sosbud $where $groupby $orderby $stringlimit")->result();
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
        $this->id_sosbud = isset($data['id_sosbud']) ? $data['id_sosbud'] : $this->id_sosbud;
        $this->uraian_sosbud = isset($data['uraian_sosbud']) ? $data['uraian_sosbud'] : $this->uraian_sosbud;
        $this->volume = isset($data['volume']) ? $data['volume'] : $this->volume;
        $this->satuan_id = isset($data['satuan_id']) ? $data['satuan_id'] : $this->satuan_id;
        $this->date_created = date("Y-m-d");
    }

    public function write()
    {
        $array = json_decode(json_encode($this), true);
        if ($this->id_sosbud == "") {
            $this->db->insert($this->table, $array);
            $id = $this->db->insert_id();
            $this->id_sosbud = $id;
            return $id;
        } else {
            $this->db->where('id_sosbud', $this->id_sosbud);
            $this->db->update($this->table, $array);
            return $this->id_sosbud;
        }
    }

    public function delete()
    {
        $this->db->delete('sosbud', array('id_sosbud' => $this->id_sosbud));
        return true;
    }
    public function getSatuan()
    {
        return $this->satuan->get_one("id_satuan = '" . $this->satuan_id . "'");
    }

    public function getSatuanVolume()
    {
        return $this->volume . " " . $this->getSatuan()->jenis_satuan;
    }
    public function getRandomColor()
    {
        return "rgba(" . rand(100, 255) . "," . rand(100, 255) . "," . rand(100, 255) . ", 0.5)";
    }
}
