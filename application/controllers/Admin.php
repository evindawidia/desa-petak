<?php
class Admin extends CI_Controller
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
    }

    public function ceklogin()
    {
        if (!isset($_SESSION["user"])) {
            redirect("Admin/login");
            return;
        }
    }

    public function getdatalogin()
    {
        return $this->admin->get_one("id_user = '" . $_SESSION['user'] . "'");
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
        if (!isset($_SESSION["user"])) {
            redirect("Admin/login");
            return;
        }
        $data['UserLogin'] = $this->getdatalogin();
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc");
        $this->load->view("admin/header", $data);
        $this->load->view("admin/index", $data);
        $this->load->view("admin/footer", $data);
    }
    public function login()
    {
        if (isset($_SESSION['user'])) {
            redirect("Admin/");
            return;
        }
        $this->load->view("admin/login");
    }
    public function dologin()
    {
        echo "<pre>";
        var_dump($_POST);
        if (!isset($_POST['email']) || !isset($_POST['password'])) {
            redirect("Admin/login");
        }
        $user = $_POST['email'];
        $password = $_POST['password'];
        $admin = $this->admin->get_one("email = '$user' and password = '$password'");
        if ($admin) {
            $_SESSION['user'] = $admin->id_user;
            redirect("Admin/");
        } else {
            $this->writemsg("Username /  Password Salah");
            redirect("Admin/login");
            return;
        }
    }
    public function logout()
    {
        session_destroy();
        redirect("Admin/login");
    }

    public function uploadimage($formname)
    {
        $config['upload_path'] = './public/upload';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '1024';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload($formname)) {
            return "/public/upload/" . $this->upload->data("file_name");
        } else {
            $this->writemsg($this->upload->display_errors());
            return null;
        }
    }
    // BERTIA
    public function berita()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['Berita'] = $this->berita->get("", "", "id_berita Desc");
        $this->load->view("admin/header", $data);
        $this->load->view("admin/berita", $data);
        $this->load->view("admin/footer", $data);
    }
    public function addberita()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['kat_berita'] = $this->kat_berita->get();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/beritaform', $data);
        $this->load->view('admin/footer', $data);
    }

    public function doaddberita()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $newBerita = new berita_m();
        $newBerita->update($_POST);
        if (isset($_FILES['image'])) {
            if (!empty($_FILES['image']['size'])) {
                $upload = $this->uploadimage("image");
                if ($upload == null) {
                    redirect("Admin/berita");
                } else {
                    $newBerita->image = base_url() . $upload;
                }
            }
        }
        $id = $newBerita->write();
        $this->writemsg("Add Berita Success", 1);
        redirect("Admin/berita");
    }
    public function editberita()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['kat_berita'] = $this->kat_berita->get();
        if (!isset($_GET['id'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/berita");
            return;
        }

        $id = $_GET['id'];
        $data['id'] = $id;
        $berita = $this->berita->get_one("id_berita = '$id'");
        $data['berita'] = $berita;
        $this->load->view("admin/header", $data);
        $this->load->view("admin/beritaedit", $data);
        $this->load->view("admin/footer", $data);
    }

    public function doeditberita()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();

        if (!isset($_GET['id'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/berita");
            return;
        }

        $id = $_GET['id'];
        $data['id'] = $id;

        $berita = $this->berita->get_one("id_berita = '$id'");
        $berita->update($_POST);
        // var_dump($berita,$_POST);
        // die();
        if (isset($_FILES['image'])) {
            if (!empty($_FILES['image']['size'])) {
                $upload = $this->uploadimage("image");
                if ($upload == null) {
                    redirect("Admin/editberita?id=$id");
                } else {
                    $berita->image = base_url() . $upload;
                }
            }
        }
        $id = $berita->write();
        $this->writemsg("Edit Berita Success", 1);
        redirect("Admin/editberita?id=$id");
    }

    public function deleteberita()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        if (!isset($_GET['id'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/berita");
            return;
        }

        $id = $_GET['id'];
        $berita = $this->berita->get_one("id_berita = '$id'");
        $berita->delete();
        $this->writemsg("Delete Success", 1);
        redirect("Admin/berita");
    }

    public function pengaduan()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['pengaduan'] = $this->pengaduan->get("", "", "id_pengaduan DESC");
        $this->load->view("admin/header", $data);
        $this->load->view("admin/pengaduan", $data);
        $this->load->view("admin/footer", $data);
    }

    public function balaspengaduan()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        if (!isset($_GET['id'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/pengaduan");
            return;
        }
        $id = $_GET['id'];
        $data['pengaduan'] = $this->pengaduan->get_one("id_pengaduan = '$id'");
        $data['balasan'] = $data['pengaduan']->getBalasan();

        $this->load->view("admin/header", $data);
        $this->load->view("admin/balasanpengaduan", $data);
        $this->load->view("admin/footer", $data);
    }

    public function doaddbalasan()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        if (!isset($_GET['id'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/pengaduan");
            return;
        }
        $id_pengaduan = $_GET['id'];

        $newBalasan = new balasan_m();
        $newBalasan->update($_POST);
        $newBalasan->pengaduan_id = $id_pengaduan;
        $id = $newBalasan->write();

        $this->writemsg("Tambah Balasan Success", 1);
        redirect("Admin/balaspengaduan?id=$id_pengaduan");
    }


    public function deletebalasan()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        if (!isset($_GET['id_pengaduan'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/pengaduan");
            return;
        }
        $id_pengaduan = $_GET['id_pengaduan'];
        if (!isset($_GET['id'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/balaspengaduan?id=$id_pengaduan");
            return;
        }

        $id = $_GET['id'];
        $balasan = $this->balasan->get_one("id_balasan = '$id'");
        $balasan->delete();
        $this->writemsg("Delete Success", 1);
        redirect("Admin/balaspengaduan?id=$id_pengaduan");
    }

    public function deletepengaduan()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        if (!isset($_GET['id'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/pengaduan");
            return;
        }
        $id = $_GET['id'];
        $pengaduan = $this->pengaduan->get_one("id_pengaduan = '$id'");
        $pengaduan->delete();
        $this->writemsg("Delete Success", 1);
        redirect("Admin/pengaduan");
    }

    public function sda()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['sda'] = $this->sda->get("", "", "id_sda DESC");
        $this->load->view("admin/header", $data);
        $this->load->view("admin/sda", $data);
        $this->load->view("admin/footer", $data);
    }

    public function addsda()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['Satuan'] = $this->satuan->get();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sdaform', $data);
        $this->load->view('admin/footer', $data);
    }

    public function doaddsda()
    {
        $this->ceklogin();
        $newsda = new sda_m();
        $newsda->update($_POST);
        $newsda->write();
        $this->writemsg("Process Success", 1);
        redirect("Admin/sda");
    }

    public function deletesda()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        if (!isset($_GET['id'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/sda");
            return;
        }
        $id = $_GET['id'];
        $sda = $this->sda->get_one("id_sda = '$id'");
        $sda->delete();
        $this->writemsg("Delete Success", 1);
        redirect("Admin/sda");
    }

    public function editsda()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        if (!isset($_GET['id'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/sda");
            return;
        }
        $id = $_GET['id'];
        $sda = $this->sda->get_one("id_sda = '$id'");
        $data['sda'] = $sda;
        $data['Satuan'] = $this->satuan->get();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sdaedit', $data);
        $this->load->view('admin/footer', $data);
    }

    public function doeditsda()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        if (!isset($_GET['id'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/sda");
            return;
        }
        $id = $_GET['id'];
        $sda = $this->sda->get_one("id_sda = '$id'");
        if (!$sda) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/sda");
            return;
        }
        $sda->update($_POST);
        $sda->write();
        $this->writemsg("Edit Success", 1);
        redirect("Admin/editsda?id=$id");
    }

    public function sdm()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['sdm'] = $this->sdm->get("", "", "id_sdm DESC");
        $this->load->view("admin/header", $data);
        $this->load->view("admin/sdm", $data);
        $this->load->view("admin/footer", $data);
    }

    public function addsdm()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['Satuan'] = $this->satuan->get();
        $data['KatSDM'] = $this->kat_sdm->get();
        $this->load->view("admin/header", $data);
        $this->load->view("admin/sdmform", $data);
        $this->load->view("admin/footer", $data);
    }
    public function doaddsdm()
    {
        $this->ceklogin();
        $newsdm = new sdm_m();
        $newsdm->update($_POST);
        $newsdm->write();
        $this->writemsg("Process Success", 1);
        redirect("Admin/sdm");
    }
    public function deletesdm()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        if (!isset($_GET['id_sdm'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/sdm");
            return;
        }
        $id = $_GET['id_sdm'];
        $sdm = $this->sdm->get_one("id_sdm ='$id'");
        $sdm->delete();
        $this->writemsg("Delete Success", 1);
        redirect("Admin/sdm");
    }
    public function editsdm()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        if (!isset($_GET['id_sdm'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/sdm");
            return;
        }
        $id = $_GET['id_sdm'];
        $sdm = $this->sdm->get_one("id_sdm = '$id'");
        $data['sdm'] = $sdm;
        $data['Satuan'] = $this->satuan->get();
        $data['KatSDM'] = $this->kat_sdm->get();
        $this->load->view("admin/header", $data);
        $this->load->view("admin/sdmedit", $data);
        $this->load->view("admin/footer", $data);
    }
    public function doeditsdm()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        if (!isset($_GET['id_sdm'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/sdm");
            return;
        }
        $id = $_GET['id_sdm'];
        $sdm = $this->sdm->get_one("id_sdm = '$id'");
        if (!$sdm) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/sdm");
            return;
        }
        $sdm->update($_POST);
        $sdm->write();
        $this->writemsg("Edit Success", 1);
        redirect("Admin/editsdm?id_sdm=$id");
    }

    public function sarana()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['sarana'] = $this->sarana->get("", "", "id_sarana DESC");
        $this->load->view("admin/header", $data);
        $this->load->view("admin/sarana", $data);
        $this->load->view("admin/footer", $data);
    }
    public function addsarana()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['Satuan'] = $this->satuan->get();
        $data['KatSarana'] = $this->kat_sarana->get();
        $this->load->view("admin/header", $data);
        $this->load->view("admin/saranaform", $data);
        $this->load->view("admin/footer", $data);
    }
    public function doaddsarana()
    {
        $this->ceklogin();
        $newsarana = new sarana_m();
        $newsarana->update($_POST);
        $newsarana->write();
        $this->writemsg("Process Success", 1);
        redirect("Admin/sarana");
    }
    public function editsarana()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['Satuan'] = $this->satuan->get();
        $data['KatSarana'] = $this->kat_sarana->get();
        if (!isset($_GET['id_sarana'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/sarana");
            return;
        }
        $id = $_GET['id_sarana'];
        $data['sarana'] = $this->sarana->get_one("id_sarana = '$id'");
        $this->load->view("admin/header", $data);
        $this->load->view("admin/saranaedit", $data);
        $this->load->view("admin/footer", $data);
    }
    public function doeditsarana()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        if (!isset($_GET['id_sarana'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/sarana");
            return;
        }
        $id = $_GET['id_sarana'];
        $sarana = $this->sarana->get_one("id_sarana = '$id'");
        if (!$sarana) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/sarana");
            return;
        }
        $sarana->update($_POST);
        $sarana->write();
        $this->writemsg("Edit Success", 1);
        redirect("Admin/editsarana?id_sarana=$id");
    }
    public function deletesarana()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        if (!isset($_GET['id_sarana'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/sarana");
            return;
        }
        $id = $_GET['id_sarana'];
        $sarana = $this->sarana->get_one("id_sarana = '$id'");
        $sarana->delete();
        $this->writemsg("Delete Success", 1);
        redirect("Admin/sarana");
    }
    public function organisasi()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['organisasi'] = $this->organisasi->get("", "", "id_organisasi DESC");
        $this->load->view("admin/header", $data);
        $this->load->view("admin/organisasi", $data);
        $this->load->view("admin/footer", $data);
    }
    public function addorganisasi()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['Satuan'] = $this->satuan->get();
        $this->load->view("admin/header", $data);
        $this->load->view("admin/organisasiform", $data);
        $this->load->view("admin/footer", $data);
    }
    public function doaddorganisasi()
    {
        $this->ceklogin();
        $neworganisasi = new organisasi_m();
        $neworganisasi->update($_POST);
        $neworganisasi->write();
        redirect("Admin/organisasi");
    }
    public function editorganisasi()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['Satuan'] = $this->satuan->get();
        if (!isset($_GET['id_organisasi'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/organisasi");
            return;
        }
        $id = $_GET['id_organisasi'];
        $data['organisasi'] = $this->organisasi->get_one("id_organisasi = '$id'");
        $this->load->view("admin/header", $data);
        $this->load->view("admin/organisasiedit", $data);
        $this->load->view("admin/footer", $data);
    }
    public function doeditorganisasi()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        $data['Satuan'] = $this->satuan->get();
        if (!isset($_GET['id_organisasi'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/organisasi");
            return;
        }
        $id = $_GET['id_organisasi'];
        $organisasi = $this->organisasi->get_one("id_organisasi = '$id'");
        if (!$organisasi) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/organisasi");
            return;
        }
        $organisasi->update($_POST);
        $organisasi->write();
        $this->writemsg("Edit Success", 1);
        redirect("Admin/editorganisasi?id_organisasi=$id");
    }
    public function deleteorganisasi()
    {
        $this->ceklogin();
        $data['UserLogin'] = $this->getdatalogin();
        if (!isset($_GET['id_organisasi'])) {
            $this->writemsg("Data not found !!", 2);
            redirect("Admin/organisasi");
            return;
        }
        $id = $_GET['id_organisasi'];
        $data['organisasi'] = $this->organisasi->get_one("id_organisasi = '$id'");
        $organisasi->delete();
        $this->writemsg("Delete Success", 1);
        redirect("Admin/organisasi");
    }
}
