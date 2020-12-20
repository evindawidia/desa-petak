<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sda_m extends CI_Model
{
    private $table = "sda";

    public $id_sda = "";
    public $uraian_sda = "";
    public $volume = "";
    public $satuan_id = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model sda_m
    public function transform($object)
    {
        $sda = new sda_m();
        $sda->id_sda = $object->id_sda;
        $sda->uraian_sda = $object->uraian_sda;
        $sda->satuan_id = $object->satuan_id;
        $sda->volume = $object->volume;
        $sda->date_created = $object->date_created;
        return $sda;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM sda WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_sda = $data->id_sda;
        $this->uraian_sda = $data->uraian_sda;
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

        $data = $this->db->query("select * from sda $where $groupby $orderby $stringlimit")->result();
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
        $this->id_sda = isset($data['id_sda']) ? $data['id_sda'] : $this->id_sda;
        $this->uraian_sda = isset($data['uraian_sda']) ? $data['uraian_sda'] : $this->uraian_sda;
        $this->volume = isset($data['volume']) ? $data['volume'] : $this->volume;
        $this->satuan_id = isset($data['satuan_id']) ? $data['satuan_id'] : $this->satuan_id;
        $this->date_created = date("Y-m-d");
    }

    public function write()
    {
        $array = json_decode(json_encode($this), true);
        if ($this->id_sda == "") {
            $this->db->insert($this->table, $array);
            $id = $this->db->insert_id();
            $this->id_sda = $id;
            return $id;
        } else {
            $this->db->where('id_sda', $this->id_sda);
            $this->db->update($this->table, $array);
            return $this->id_sda;
        }
    }

    public function delete()
    {
        $this->db->delete('sda', array('id_sda' => $this->id_sda));
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
