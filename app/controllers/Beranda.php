<?php

class Beranda extends Controller
{
    public function index()
    {
        $data['judul'] = 'Beranda';
        $this->view('../app/views/templates/header', $data);
        $this->view('../app/views/beranda/index', $data);
        $this->view('../app/views/templates/footer');
    }
}