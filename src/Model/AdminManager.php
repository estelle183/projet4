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

    /**
     * Select login and password in Database in terms of login
     * @param Admin $admin
     * @return mixed
     */
    public function adminLogin(Admin $admin)
    {
        $req = $this->db->prepare ('SELECT login, password FROM Administration WHERE login = ?');
        $req->execute (array(
            $admin->getLogin ()));
        $affectedLines = $req->fetch (PDO::FETCH_ASSOC);

        return $affectedLines;
    }

    /**
     * Select email in Database
     * @param Admin $admin
     * @return mixed
     */
    public function adminPassword(Admin $admin)

    {
        $req = $this->db->prepare ('SELECT email FROM Administration WHERE email = ?');
        $req->execute (array(
            $admin->getEmail ()));
        $affectedLines = $req->fetch (PDO::FETCH_ASSOC);

        return $affectedLines;
    }

    /**
     * Add a token and token date
     * @param Admin $admin
     * @return bool
     */
    public function addToken(Admin $admin)
    {
        $req = $this->db->prepare ('UPDATE Administration SET token=:token, token_date=NOW() WHERE email = :email');
        $addToken = $req->execute (array(
            'email' => $admin->getEmail (),
            'token' => $admin->getToken (),
        ));

        return $addToken;

    }

    /**
     * Select token and token date in Database
     * @param Admin $admin
     * @return Admin
     */
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

    /**
     * Update new password in Database
     * @param Admin $admin
     * @return bool
     */
    public function changePassword(Admin $admin) {
        $req = $this->db->prepare ('UPDATE Administration SET password=:password, token=NULL, token_date=NULL WHERE token = :token');
        $affectedLines = $req->execute (array(
            'token'=>$admin->getToken (),
            'password'=>$admin->getPassword ()
        ));

        return $affectedLines;
    }

}

