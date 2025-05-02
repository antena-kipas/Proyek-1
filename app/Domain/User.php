<?php

namespace Proyek1\Domain;

class User
{
    public string $id;
    public string $name;
    public string $password;

    public function __construct(string $id = '', string $name = '', string $password = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
    }
}