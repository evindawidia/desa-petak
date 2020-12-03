<?php
defined('BASEPATH') or exit('No direct script access allowed');

class balasan_m extends CI_Model
{
    private $table = "balasan";

    public $id_balasan = "";
    public $comment = "";
    public $date_created = "";
    public $pengaduan_id = "";

    //fungsi untuk transformasi object dari CI menjadi model balasan_m
    public function transform($object)
    {
        $balasan = new balasan_m();
        $balasan->id_balasan = $object->id_balasan;
        $balasan->comment = $object->comment;
        $balasan->date_created = $object->date_created;
        $balasan->pengaduan_id = $object->pengaduan_id;
        return $balasan;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM balasan WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_balasan = $data->id_balasan;
        $this->comment = $data->comment;
        $this->date_created = $data->date_created;
        $this->pengaduan_id = $data->pengaduan_id;
        return $this;
    }
    // funsi mendapat lebih dari satu baris
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

        $data = $this->db->query("select * from balasan $where $groupby $orderby $stringlimit")->result();
        $result = [];
        if (count($data) != 0) {
            foreach ($data as $row) {
                array_push($result, $this->transform($row));
            }
        }
        return $result;
    }

    public function update($data){
        $this->id_balasan =isset($data['id_balasan']) ?$data['id_balasan'] : $this->id_balasan;
        $this->comment = isset($data['comment']) ?$data['comment'] : $this->comment;
        $this->pengaduan_id = isset($data['pengaduan_id']) ?$data['pengaduan_id'] : $this->pengaduan_id;
        $this->date_created = date("Y-m-d");
    }

    public function write(){
        $array = json_decode(json_encode($this), true);
        if ($this->id_balasan == "") {
            $this->db->insert($this->table, $array);
            $id = $this->db->insert_id();
            $this->id_balasan = $id;
            return $id;
        }else{
            $this->db->where('id_balasan', $this->id_balasan);
            $this->db->update($this->table, $array);
            return $this->id_balasan;
        }
        return $id;
    }

    public function delete(){
        $this->db->delete('balasan', array('id_balasan' => $this->id_balasan)); 
        return true;
    }
}
