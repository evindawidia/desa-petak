<?php
class Admin extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        if (!isset($_SESSION["user"])) {
            redirect("Admin/login");
        }
        echo "Home";
        die();
    }
    public function login()
    {
        $this->load->view("admin/login");
    }
    public function dologin()
    {
        var_dump($_POST);
        die();
    }
}
