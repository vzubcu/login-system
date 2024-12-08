<?php

declare(strict_types=1);

namespace LoginSystem;

use PDO;

class UserManager
{
    private PDO $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    // Create a new user
    public function createUser(string $username, string $password): bool
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
        return $stmt->execute(['username' => $username, 'password' => $hashedPassword]);
    }    

    // Read all users
    public function getAllUsers(): array
    {
        $stmt = $this->db->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update a user's password
    public function updateUserPassword(int $id, string $newPassword): bool
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare('UPDATE users SET password = :password WHERE id = :id');
        return $stmt->execute(['password' => $hashedPassword, 'id' => $id]);
    }

    // Delete a user
    public function deleteUser(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM users WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
