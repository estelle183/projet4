<?php

namespace App\Model;

use \PDO;

class DbManager
{
    protected function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch(\Exception $e) {
            die($e->getMessage());
        }
        return $db;
    }
}
