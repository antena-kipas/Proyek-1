<?php

namespace Proyek1\Config;

use Proyek1\Config\GetDatabase;

class Database
{
    private static ?\PDO $pdo = null;

    public static function getConnection(string $env): \PDO{
        if(self::$pdo == null){
            // create new PDO
            
            $config = GetDatabase::getDatabaseConfig();
            self::$pdo = new \PDO(
                $config['database'][$env]['url'],
                $config['database'][$env]['username'],
                $config['database'][$env]['password']
            );
        }

        return self::$pdo;
    }

    public static function beginTransaction(){
        self::$pdo->beginTransaction();
    }

    public static function commitTransaction(){
        self::$pdo->commit();
    }

    public static function rollbackTransaction(){
        self::$pdo->rollBack();
    }
}