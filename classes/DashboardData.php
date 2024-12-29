<?php

declare(strict_types=1);

namespace LoginSystem;

use PDO;

class DashboardData
{
    private PDO $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function getTotalUsers(): int
    {
        $stmt = $this->db->query('SELECT COUNT(*) AS total FROM users');
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$result['total'];
    }

    public function getRecentUsers(): array
    {
        $stmt = $this->db->query('SELECT username, created_at FROM users ORDER BY created_at DESC LIMIT 5');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
