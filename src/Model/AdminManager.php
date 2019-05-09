<?php


namespace App\Model;

use \PDO;

class AdminManager extends DbManager
{
    private $db;

    public function __construct()
    {
        $this->db = self::dbConnect ();
    }

    public function adminLogin(Admin $admin)
    {
        $req = $this->db->prepare ('SELECT login, password FROM Administration WHERE login = ?');
        $req->execute (array(
            $admin->getLogin ()));
        $affectedLines = $req->fetch (PDO::FETCH_ASSOC);

        return $affectedLines;
    }

    public function adminPassword(Admin $admin)

    {
        $req = $this->db->prepare ('SELECT email FROM Administration WHERE email = ?');
        $req->execute (array(
            $admin->getEmail ()));
        $affectedLines = $req->fetch (PDO::FETCH_ASSOC);

        return $affectedLines;
    }

    public function addToken(Admin $admin)
    {
        $req = $this->db->prepare ('UPDATE Administration SET token=:token, token_date=NOW() WHERE email = :email');
        $addToken = $req->execute (array(
            'email' => $admin->getEmail (),
            'token' => $admin->getToken (),
        ));

        return $addToken;

    }

    public function adminToken(Admin $admin)
    {
        $req = $this->db->prepare('SELECT token, token_date FROM Administration WHERE token = ?');
        $req->execute (array(
            $admin->getToken ()));
        $affectedLines = $req->fetch (PDO::FETCH_ASSOC);
        $checkAdmin = new Admin();
        $checkAdmin->setToken ($affectedLines['token']);
        $checkAdmin->setTokenDate ($affectedLines['token_date']);

        return $checkAdmin;

    }

    public function changePassword(Admin $admin) {
        $req = $this->db->prepare ('UPDATE Administration SET password=:password, token=NULL, token_date=NULL WHERE token = :token');
        $affectedLines = $req->execute (array(
            'token'=>$admin->getToken (),
            'password'=>$admin->getPassword ()
        ));

        return $affectedLines;
    }

}

