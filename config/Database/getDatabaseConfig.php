<?php
namespace Config\Database;
function getDatabaseConfig(): array
{
    return [
        "database" => [
            "prod" => [
                "url" => "mysql:host=localhost:3306;dbname=proyek1",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}