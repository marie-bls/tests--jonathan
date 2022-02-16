<?php
    namespace App; //on lui donne un namespace - 
    class RoleRepository { //ça pourrait être DBCONFIG
    protected $pdo; //variable
    protected function getPdo(): \PDO { //fonction . Le séparateur \PDO correspond à App
        if ($this->pdo === null) { // ou $this->connect=== null
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ];
            try { // je tente la connexion
                $this->pdo = new \PDO(" // 
                mysql:host=127.0.0.1;dbname=phpunit;
                charset=utf8mb4", 'root', '', $options);
            } catch (\PDOException $PDOException) {
                throw new \PDOException($PDOException->getMessage(),
                (int) $PDOException->getCode());
            }
        }
        return $this->pdo;
    }
    /**
     * Fetch un tableau de roles à partir de la BDD
     *
     * @return array
     */
    public function fetchRoles(): array { //typage : c'est un tableau 
        return $this->getPdo()->prepare('SELECT * FROM rolegamebean')
        ->fetchAll(\PDO::FETCH_ASSOC);
    }
}