<?php

class Kontak extends Controller
{
    public function index()
    {
        $data['judul'] = 'kontak';
        $this->view('templates/header', $data);
        $this->view('kontak/index');
        $this->view('templates/footer');
    }
}

