<?php
require_once '../app/core/Controller.php';
class About extends Controller
{
    public function index()
    {
        $data['judul'] = 'tentang kami';
        $this->view('../app/views/templates/header', $data);
        $this->view('../app/views/about/index', $data);
        $this->view('../app/views/templates/footer');
    }
}