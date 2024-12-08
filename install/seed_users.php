<?php

require_once __DIR__ . '/autoload.php';

use LoginSystem\Database;

$db = new Database();

try {
    $connection = $db->getConnection();

    // Utilizatori demo
    $users = [
        ['username' => 'admin', 'password' => password_hash('admin123', PASSWORD_DEFAULT)],
        ['username' => 'user', 'password' => password_hash('password', PASSWORD_DEFAULT)],
    ];

    foreach ($users as $user) {
        $stmt = $connection->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
        $stmt->execute(['username' => $user['username'], 'password' => $user['password']]);
    }

    echo "Users seeded successfully.";
} catch (Exception $e) {
    echo "Error seeding users: " . $e->getMessage();
}
