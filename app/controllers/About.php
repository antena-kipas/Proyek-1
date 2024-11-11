<?php
require_once '../app/core/Controller.php';
class About extends Controller
{
    public function index()
    {
        $data['judul'] = 'tentang kami';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
}