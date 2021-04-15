<?php


class database
{
    private $pdo;

    public function __construct()
    {
        try {
            $pdo = new PDO('mysql:host=localhost; dbname=tdl; charset=utf8', 'root', '');
            $this->pdo = $pdo;

        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function userExists($email)
    {
        $request = $this->pdo->prepare("SELECT * FROM user WHERE email ='" . $email . "'");
        $request->execute();
        $userExists = $request->fetch(PDO::FETCH_ASSOC);
        return $userExists;
    }

    public function insertUser($email, $password)
    {
        $request = $this->pdo->prepare("INSERT INTO user (`email`, `password`) VALUES (:email, :password)");
        $insert = $request->execute(array(
            ':email' => $email,
            ':password' => $password));
        return $insert;
    }
}