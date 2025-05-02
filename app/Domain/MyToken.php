<?php

namespace Proyek1\Domain;

class MyToken
{
    public string $resetTokenHash;
    public string $resetTokenExpiresAt;

    public function __construct(string $resetTokenHash = '', $resetTokenExpiresAt = '')
    {
        $this->resetTokenHash = $resetTokenHash;
        $this->resetTokenExpiresAt = $resetTokenExpiresAt;
    }
}