<?php

class Program extends Controller
{
    public function index()
    {
        $data['judul'] = 'Program';
        $this->view('templates/header', $data);
        $this->view('program/index', $data);
        $this->view('templates/footer');
    }
}