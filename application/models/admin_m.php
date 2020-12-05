<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_m extends CI_Model
{
    private $table = "admin";
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

        $data = $this->db->query("select * from admin $where $groupby $orderby $stringlimit")->result();
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
        $this->id_user = isset($data['id_user']) ? $data['id_user'] : $this->id_user;
        $this->nama = isset($data['nama']) ? $data['nama'] : $this->nama;
        $this->password = isset($data['password']) ? $data['password'] : $this->password;
        $this->email = isset($data['email']) ? $data['email'] : $this->email;
        $this->date_created = date("Y-m-d");
    }

    public function write()
    {
        $array = json_decode(json_encode($this), true);
        if ($this->id_user == "") {
            $this->db->insert($this->table, $array);
            $id = $this->db->insert_id();
            $this->id_user = $id;
            return $id;
        } else {
            $this->db->where('id_user', $this->id_user);
            $this->db->update($this->table, $array);
            return $this->id_user;
        }
    }

    public function delete()
    {
        $this->db->delete('admin', array('id_user' => $this->id_user));
        return true;
    }
}
