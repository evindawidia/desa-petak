<?php
defined('BASEPATH') or exit('No direct script access allowed');

class organisasi_m extends CI_Model
{
    private $table = "organisasi";

    public $id_organisasi = "";
    public $uraian_organisasi = "";
    public $volume = "";
    public $satuan_id = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model organisasi_m
    public function transform($object)
    {
        $organisasi = new organisasi_m();
        $organisasi->id_organisasi = $object->id_organisasi;
        $organisasi->uraian_organisasi = $object->uraian_organisasi;
        $organisasi->satuan_id = $object->satuan_id;
        $organisasi->volume = $object->volume;
        $organisasi->date_created = $object->date_created;
        return $organisasi;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM organisasi WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_organisasi = $data->id_organisasi;
        $this->uraian_organisasi = $data->uraian_organisasi;
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

        $data = $this->db->query("select * from organisasi $where $groupby $orderby $stringlimit")->result();
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
        $this->id_organisasi = isset($data['id_organisasi']) ? $data['id_organisasi'] : $this->id_organisasi;
        $this->uraian_organisasi = isset($data['uraian_organisasi']) ? $data['uraian_organisasi'] : $this->uraian_organisasi;
        $this->volume = isset($data['volume']) ? $data['volume'] : $this->volume;
        $this->satuan_id = isset($data['satuan_id']) ? $data['satuan_id'] : $this->satuan_id;
        $this->date_created = date("Y-m-d");
    }

    public function write()
    {
        $array = json_decode(json_encode($this), true);
        if ($this->id_organisasi == "") {
            $this->db->insert($this->table, $array);
            $id = $this->db->insert_id();
            $this->id_organisasi = $id;
            return $id;
        } else {
            $this->db->where('id_organisasi', $this->id_organisasi);
            $this->db->update($this->table, $array);
            return $this->id_organisasi;
        }
    }

    public function delete()
    {
        $this->db->delete('organisasi', array('id_organisasi' => $this->id_organisasi));
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
