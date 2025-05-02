<?php
namespace Proyek1\Config;


class GetDatabase {
    public static function getDatabaseConfig(): array
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


}