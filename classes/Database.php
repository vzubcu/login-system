<?php

declare(strict_types=1);

namespace LoginSystem;

use PDO;

class Database
{
    private PDO $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=localhost;dbname=login_system;charset=utf8',
                'root', // utilizator MySQL
                ''      // parola MySQL
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception('Database connection failed: ' . $e->getMessage());
        }        
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }

    public function getUsers(): array
    {
        $stmt = $this->connection->query('SELECT username, password FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
