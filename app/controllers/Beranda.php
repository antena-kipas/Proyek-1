<?php

class Beranda extends Controller
{
    public function index()
    {
        $data['judul'] = 'Berannda';
        $this->view('templates/header', $data);
        $this->view('Beranda/index');
        $this->view('templates/footer');
    }
}