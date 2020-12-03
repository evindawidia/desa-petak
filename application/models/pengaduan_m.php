<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengaduan_m extends CI_Model
{

    private $table = "pengaduan";

    public $id_pengaduan = "";
    public $sender_name = "";
    public $nik = "";
    public $comment = "";
    public $address = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model pengaduan_m
    public function transform($object)
    {
        $pengaduan = new pengaduan_m();
        $pengaduan->id_pengaduan = $object->id_pengaduan;
        $pengaduan->sender_name = $object->sender_name;
        $pengaduan->comment = $object->comment;
        $pengaduan->nik = $object->nik;
        $pengaduan->address = $object->address;
        $pengaduan->date_created = $object->date_created;
        return $pengaduan;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM pengaduan WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_pengaduan = $data->id_pengaduan;
        $this->sender_name = $data->sender_name;
        $this->nik = $data->nik;
        $this->comment = $data->comment;
        $this->address = $data->address;
        $this->date_created = $data->date_created;
        return $this;
    }
    // funsi mendapat lebih dari satu baris
    public function get($where = "", $groupby="", $orderby="" ,$stringlimit = "")
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

        $data = $this->db->query("select * from pengaduan $where $groupby $orderby $stringlimit")->result();
        $result = [];
        if (count($data) != 0) {
            foreach ($data as $row) {
                array_push($result, $this->transform($row));
            }
        }
        return $result;
    }

    public function update($data){
        $this->id_pengaduan =isset($data['id_pengaduan']) ?$data['id_pengaduan'] : $this->id_pengaduan;
        $this->sender_name = isset($data['sender_name']) ?$data['sender_name'] : $this->sender_name;
        $this->nik = isset($data['nik']) ?$data['nik'] : $this->nik;
        $this->comment = isset($data['comment']) ?$data['comment'] : $this->comment;
        $this->address = isset($data['address']) ?$data['address'] : $this->address;
        $this->date_created = date("Y-m-d");
    }

    public function write(){
        $array = json_decode(json_encode($this), true);
        if ($this->id_pengaduan == "") {
            $this->db->insert($this->table, $array);
            $id = $this->db->insert_id();
            $this->id_pengaduan = $id;
        }else{
            $this->db->where('id_pengaduan', $this->id_pengaduan);
            $this->db->update($this->table, $array);
            return $this->id_pengaduan;
        }
        return $id;
    }

    public function getBalasan(){
        return $this->balasan->get("pengaduan_id = '".$this->id_pengaduan."'");
    }
    
    public function delete(){
        foreach ($this->getBalasan() as $bl){
            $bl->delete();
        }
        $this->db->delete('pengaduan', array('id_pengaduan' => $this->id_pengaduan)); 
        return true;
    }

    
}
