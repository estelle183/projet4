<?php

namespace App\Model;
use \PDO;


class DbManagerSample
{
    protected function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=dbname;charset=utf8', 'login', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch(\Exception $e) {
            die($e->getMessage());
        }
        return $db;
    }
}