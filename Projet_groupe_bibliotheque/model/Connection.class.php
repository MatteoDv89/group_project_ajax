<?php

class Connection
{

    private $conn;

    public function __construct()
    {
        $this->pdo();
    }

    private function pdo()
    {

        $dsn = 'mysql:dbname=bibliotheque;host=localhost';
        $user = 'root';
        $password = '';

        try {
            $conn = new PDO($dsn, $user, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }

        $this->conn = $conn;
    }

    public function getBdd()
    {
        return $this->conn;
    }
}
