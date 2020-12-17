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
        $this->load->view('home/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('home/footer', $data);
    }
    public function dummy()
    {
        $this->load->view('home/header');
        $this->load->view('home/page');
        $this->load->view('home/footer');
    }
    public function sejarah()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "4");
        $this->load->view('home/header', $data);
        $this->load->view('home/sejarah', $data);
        $this->load->view('home/footer', $data);
    }
    public function gambaranumum()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "4");
        $this->load->view('home/header', $data);
        $this->load->view('home/gamum', $data);
        $this->load->view('home/footer', $data);
    }
    public function visimisi()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "4");
        $this->load->view('home/header', $data);
        $this->load->view('home/visimisi', $data);
        $this->load->view('home/footer', $data);
    }
    public function pemerintah()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "4");
        $this->load->view('home/header', $data);
        $this->load->view('home/pemerintah', $data);
        $this->load->view('home/footer', $data);
    }
    public function bpd()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "4");
        $this->load->view('home/header', $data);
        $this->load->view('home/bpd', $data);
        $this->load->view('home/footer', $data);
    }
    public function lpm()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "4");
        $this->load->view('home/header', $data);
        $this->load->view('home/lpm', $data);
        $this->load->view('home/footer', $data);
    }
    public function kartar()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "4");
        $this->load->view('home/header', $data);
        $this->load->view('home/kartar', $data);
        $this->load->view('home/footer', $data);
    }
    public function pkk()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "4");
        $this->load->view('home/header', $data);
        $this->load->view('home/pkk', $data);
        $this->load->view('home/footer', $data);
    }
}
