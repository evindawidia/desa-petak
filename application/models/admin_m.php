<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_m extends CI_Model
{
    public $id_user = "";
    public $nama = "";
    public $password = "";
    public $email = "";
    public $date_created = "";

    //fungsi untuk transformasi object dari CI menjadi model admin_m
    public function transform($object)
    {
        $admin = new admin_m();
        $admin->id_user = $object->id_user;
        $admin->nama = $object->nama;
        $admin->email = $object->email;
        $admin->password = $object->password;
        $admin->date_created = $object->date_created;
        return $admin;
    }
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM admin WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_user = $data->id_user;
        $this->nama = $data->nama;
        $this->password = $data->password;
        $this->email = $data->email;
        $this->date_created = $data->date_created;
        return $this;
    }
    // funsi mendapat lebih dari satu baris
    public function get($where = "", $stringlimit = "")
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

        $data = $this->db->query("select * from admin " . $where . " $stringlimit")->result();
        if (count($data) != 0) {
            $result = [];
            foreach ($data as $row) {
                array_push($result, $this->transform($row));
            }
            return $result;
        } else {
            return null;
        }
    }
}
