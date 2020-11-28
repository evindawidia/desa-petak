<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_m", "admin");
    }

    public function index()
    {
        $this->load->helper('url');
        if (!isset($_SESSION["user"])) {
            redirect("Admin/login");
            return;
        }
        echo "Berhasil Login";
        die();
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
            redirect("Admin/login");
            return;
        }
    }
    public function logout()
    {
        session_destroy();
        redirect("Admin/login");
    }
}
