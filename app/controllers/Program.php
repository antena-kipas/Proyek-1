<?php

class Program extends Controller
{
    public function index()
    {
        $data['judul'] = 'Program';
        $this->view('../app/templates/header', $data);
        $this->view('../app/program/index', $data);
        $this->view('../app/templates/footer');
    }
}