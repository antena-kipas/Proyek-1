<?php

class Beranda extends Controller
{
    public function index()
    {
        $data['judul'] = 'Beranda';
        $this->view('templates/header', $data);
        $this->view('Beranda/index', $data);
        $this->view('templates/footer');
    }
}