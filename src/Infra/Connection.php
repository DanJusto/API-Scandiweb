<?php

namespace DanielJusto\ScandiwebApi\Infra;

use PDO;
use PDOException;

class Connection 
{
    public static function createConnection(): PDO
    {
        $servername = 'sql10.freemysqlhosting.net';
        $dbname = 'sql10614966';
        $username = 'sql10614966';
        $password = '5SEcZPmq7w';

        try {
            $db = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        return $db;
    }
}