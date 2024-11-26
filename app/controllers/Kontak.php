<?php

class Kontak extends Controller
{
    public function index()
    {
        $data['judul'] = 'kontak';
        $this->view('../app/views/templates/templates/header', $data);
        $this->view('../app/views/templates/kontak/index');
        $this->view('../app/views/templates/templates/footer');
    }
}

