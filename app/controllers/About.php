<?php
require_once '../app/core/Controller.php';
class About extends Controller
{
    public function index($nama = 'test', $pekerjaan = 'programmer', $umur = 32)
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $this->view('templates/header', $data);
        $this->view('about/ index');
        $this->view('templates/footer');
    }
    public function page()
    {
        $this->view('about/page');
    }
}