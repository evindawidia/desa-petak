<?php
defined('BASEPATH') or exit('No direct script access allowed');

class berita_m extends CI_Model
{

    private $table = "berita";
    private $defaultimg = "https://artema.co.id/wp-content/themes/ryse/assets/images/no-image/No-Image-Found-400x264.png";

    public $id_berita = "";
    public $judul_berita = "";
    public $content_berita = "";
    public $date_created = "";
    public $url_segment = "";
    public $kat_berita_id = "";
    public $image = "";



    //fungsi untuk transformasi object dari CI menjadi objek kita sendiri yaitu model berita_m
    public function transform($object)
    {
        $berita = new berita_m();
        $berita->id_berita = $object->id_berita;
        $berita->judul_berita = $object->judul_berita;
        $berita->content_berita = $object->content_berita;
        $berita->date_created = $object->date_created;
        $berita->url_segment = $object->url_segment;
        $berita->kat_berita_id = $object->kat_berita_id;
        $berita->image = $object->image;
        return $berita;
    }
    //fungsi untuk mendapatkan data 1 baris
    public function get_one($where)
    {
        $data = $this->db->query("SELECT * FROM berita WHERE " . $where . " limit 1")->result();
        if (count($data) != 0) {
            $data = $data[0];
        } else {
            return null;
        }
        $this->id_berita = $data->id_berita;
        $this->judul_berita = $data->judul_berita;
        $this->content_berita = $data->content_berita;
        $this->date_created = $data->date_created;
        $this->url_segment = $data->url_segment;
        $this->kat_berita_id = $data->kat_berita_id;
        $this->image = $data->image;

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

        $data = $this->db->query("select * from berita $where $groupby $orderby $stringlimit")->result();
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
        $this->id_berita = isset($data['id_berita']) ? $data['id_berita'] : $this->id_berita;
        $this->judul_berita = isset($data['judul_berita']) ? $data['judul_berita'] : $this->judul_berita;
        $this->content_berita = isset($data['content_berita']) ? $data['content_berita'] : $this->content_berita;
        $this->date_created = isset($data['date_created']) ? $data['date_created'] : date("Y-m-d");
        $this->url_segment = isset($data['url_segment']) ? $data['url_segment'] : implode(" ", explode(" ", $this->judul_berita));
        $this->kat_berita_id = isset($data['kat_berita_id']) ? $data['kat_berita_id'] : $this->kat_berita_id;
        $this->image = isset($data['image']) ? $data['image'] : $this->image;
    }

    public function write()
    {
        $array = json_decode(json_encode($this), true); //convert object to array menggonakan conversi object menjadi string json lalu dirubah lagi menjadi array

        if ($this->id_berita == "") { //merupakan data baru
            $this->db->insert($this->table, $array); // melakukan insert data menggunakan fungsi insert dari CI
            $id = $this->db->insert_id(); // mendapatkan PRIMARY KEY TERAKHIR DARI DATA YANG KITA INPUT
            $this->id_berita = $id;
            return $id;
        } else {
            $this->db->where('id_berita', $this->id_berita);
            $this->db->update($this->table, $array);
            return $this->id_berita;
        }
    }

    public function delete()
    {
        $this->db->delete('berita', array('id_berita' => $this->id_berita));
        return true;
    }

    public function getShortContent()
    {
        return substr($this->content_berita, 0, 150) . "...";
    }
    public function getShortestContent()
    {
        return substr($this->content_berita, 0, 50) . "...";
    }

    public function getImage()
    {
        if ($this->image != "") {
            return $this->image;
        } else {
            return $this->defaultimg;
        }
    }
    public function KatBerita()
    {
        return $this->kat_berita->get_one("id_kat_berita = '" . $this->kat_berita_id . "'");
    }
    public function getKatBerita()
    {
        return $this->KatBerita()->kat_berita;
    }
    public function getComment()
    {
        return $this->comment->get("berita_id = '" . $this->id_berita . "'");
    }
}
