<?php
class Home extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('home/header');
        $this->load->view('home/index');
        $this->load->view('home/footer');
    }
    public function dummy()
    {
        $this->load->helper('url');
        $this->load->view('home/header');
        $this->load->view('home/page');
        $this->load->view('home/footer');
    }
}
