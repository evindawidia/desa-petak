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
    public function writemsg($msg, $status = 3)
    {
        // 1 = success;
        // 2 = error;
        // 3 = warning;
        if ($status == 1) {
            $stat = "alert-success";
        }

        if ($status == 2) {
            $stat = "alert-danger";
        }

        if ($status == 3) {
            $stat = "alert-warning";
        }

        $this->session->set_flashdata('msg', "<div class='alert $stat'>$msg</div>");
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
    public function beritadesa()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc");
        $this->load->view('home/header', $data);
        $this->load->view('home/beritadesa', $data);
        $this->load->view('home/footer', $data);
    }
    public function beritadetail()
    {
        if (!isset($_GET['id'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Home/beritadesa");
            return;
        }
        $id = $_GET['id'];
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc");
        $data['berita'] = $this->berita->get_one("id_berita = '$id'");
        $data['KatBerita'] = $this->kat_berita->get();
        $data['Komen'] = $this->comment->get();
        $this->load->view('home/header', $data);
        $this->load->view('home/beritadetail', $data);
        $this->load->view('home/footer', $data);
    }
    public function doaddcomment()
    {
        $newcomment = new comment_m();
        $id = $_GET['id'];
        $newcomment->update($_POST);
        $newcomment->berita_id = $id;
        $newcomment->write();
        redirect("Home/beritadetail?id=$id");
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
    public function sda()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "4");
        $data['sda'] = $this->sda->get();
        $this->load->view('home/header', $data);
        $this->load->view('home/sda', $data);
        $this->load->view('home/footer', $data);
    }
    public function sdm()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "4");
        $data['sdm'] = $this->sdm->get();
        $this->load->view('home/header', $data);
        $this->load->view('home/sdm', $data);
        $this->load->view('home/footer', $data);
    }
    public function organisasi()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "4");
        $data['organisasi'] = $this->organisasi->get();
        $this->load->view('home/header', $data);
        $this->load->view('home/organisasi', $data);
        $this->load->view('home/footer', $data);
    }
    public function sarana()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "4");
        $data['sarana'] = $this->sarana->get();
        $this->load->view('home/header', $data);
        $this->load->view('home/sarana', $data);
        $this->load->view('home/footer', $data);
    }
    public function sosbud()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "4");
        $data['sosbud'] = $this->sosbud->get();
        $this->load->view('home/header', $data);
        $this->load->view('home/sosbud', $data);
        $this->load->view('home/footer', $data);
    }
    public function pengaduan()
    {
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc", "4");
        $data['']
        $this->load->view('home/header', $data);
        $this->load->view('home/pengaduan', $data);
        $this->load->view('home/footer', $data);
    }

    public function doaddpengaduan()
    {
        $newpengaduan = new pengaduan_m();
        $newpengaduan->update($_POST);
        $newpengaduan->write();
        redirect("Home/pengaduan");
    }
}
