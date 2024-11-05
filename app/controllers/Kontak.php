<?php

class Kontak extends Controller
{
    public function index()
    {
        $this->view('templates/header');
        $this->view('kontak/index');
        $this->view('templates/footer');
    }
}

