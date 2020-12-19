<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sdm_m extends CI_Model
{
    private $table = "sdm";

    public $id_sdm = "";
    public $uraian_sdm = "";
    public $volume = "";
    public $satuan_id = "";
    public $date_created = "";
    public $kat_sdm_id = "";


    //fungsi untuk transformasi object dari CI menjadi model sdm_m
    public function transform($object)
    {
        $sdm = new sdm_m();
        $sdm->id_sdm = $object->id_sdm;
        $sdm->uraian_sdm = $object->uraian_sdm;
        $sdm->satuan_id = $object->satuan_id;
        $sdm->volume = $object->volume;
        $sdm->date_created = $object->date_created;
        $sdm->kat_sdm_id = $object->kat_sdm_id;
        return $sdm;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM sdm WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_sdm = $data->id_sdm;
        $this->uraian_sdm = $data->uraian_sdm;
        $this->volume = $data->volume;
        $this->satuan_id = $data->satuan_id;
        $this->date_created = $data->date_created;
        $this->kat_sdm_id = $data->kat_sdm_id;
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
        $data = $this->db->query("select * from sdm $where $groupby $orderby $stringlimit")->result();
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
        $this->id_sdm = isset($data['id_sdm']) ? $data['id_sdm'] : $this->id_sdm;
        $this->uraian_sdm = isset($data['uraian_sdm']) ? $data['uraian_sdm'] : $this->uraian_sdm;
        $this->volume = isset($data['volume']) ? $data['volume'] : $this->volume;
        $this->satuan_id = isset($data['satuan_id']) ? $data['satuan_id'] : $this->satuan_id;
        $this->kat_sdm_id = isset($data['kat_sdm_id']) ? $data['kat_sdm_id'] : $this->kat_sdm_id;
        $this->date_created = date("Y-m-d");
    }

    public function write()
    {
        $array = json_decode(json_encode($this), true);
        if ($this->id_sdm == "") {
            $this->db->insert($this->table, $array);
            $id = $this->db->insert_id();
            $this->id_sdm = $id;
            return $id;
        } else {
            $this->db->where('id_sdm', $this->id_sdm);
            $this->db->update($this->table, $array);
            return $this->id_sdm;
        }
    }

    public function delete()
    {
        $this->db->delete('sdm', array('id_sdm' => $this->id_sdm));
        return true;
    }
    public function getSatuan()
    {
        return $this->satuan->get_one("id_satuan = '" . $this->satuan_id . "'");
    }
    public function getKatSdm()
    {
        return $this->kat_sdm->get_one("id_kat_sdm = '" . $this->kat_sdm_id . "'");
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
