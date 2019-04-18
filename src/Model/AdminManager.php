<?php


namespace App\Model;

use \PDO;

class AdminManager extends DbManager
{
    private $db;

    public function __construct()
    {
        $this->db = self::dbConnect();
    }
public function adminLogin(Admin $admin)
{
    $req = $this->db->prepare('SELECT login, password FROM Administration WHERE login = ?');
    $req->execute(array(
        $admin->getLogin()));
    $affectedLines = $req->fetch (PDO::FETCH_ASSOC);

    return $affectedLines;
}

}