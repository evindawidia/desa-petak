<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model("admin_m", "admin");
        $this->load->model("berita_m", "berita");
        $this->load->model("kat_berita_m", "kat_berita");
        $this->load->model("pengaduan_m", "pengaduan");
        $this->load->model("balasan_m", "balasan");
        $this->load->model("sda_m", "sda");
        $this->load->model("sdm_m", "sdm");
        $this->load->model("kat_sdm_m", "kat_sdm");
        $this->load->model("satuan_m", "satuan");
        $this->load->model("sarana_m", "sarana");
        $this->load->model("kat_sarana_m", "kat_sarana");
        $this->load->model("organisasi_m", "organisasi");
        $this->load->model("sosbud_m", "sosbud");
        $this->load->model("comment_m", "comment");
    }
    public function index()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "3");
        $data['KatBerita'] = $this->kat_berita->get();
        $this->load->helper('url');
        $this->load->view('home/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('home/footer', $data);
    }
    public function dummy()
    {
        $this->load->helper('url');
        $this->load->view('home/header');
        $this->load->view('home/page');
        $this->load->view('home/footer');
    }
}
