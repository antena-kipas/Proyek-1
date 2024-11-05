<?php

class Program extends Controller
{
    public function index()
    {
        $this->view('templates/header');
        $this->view('program/index');
        $this->view('templates/footer');
    }
}