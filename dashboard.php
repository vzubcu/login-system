<?php

require_once __DIR__ . '/autoload.php';

use LoginSystem\Database;
use LoginSystem\DashboardData;

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$db = new Database();
$dashboard = new DashboardData($db);
$totalUsers = $dashboard->getTotalUsers();
$recentUsers = $dashboard->getRecentUsers();

require_once __DIR__ . '/templates/header.php';

//Exemplu de grafic cu useri
$userData = [
    'labels' => ['2023-12-24', '2023-12-25', '2023-12-26', '2023-12-27'],
    'data' => [2, 5, 8, 10]
];

echo '<script id="userChartData" type="application/json">' . json_encode($userData) . '</script>';
?>

<h1>Dashboard</h1>
<div class="dashboard-cards">
    <div class="card">
        <h3>Total Users</h3>
        <p><?= $totalUsers ?></p>
    </div>
</div>

<h2>Recent Users</h2>
<table>
    <tr>
        <th>Username</th>
        <th>Created At</th>
    </tr>
    <?php foreach ($recentUsers as $user): ?>
        <tr>
            <td><?= $user['username'] ?></td>
            <td><?= $user['created_at'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<h2>User Statistics</h2>
<canvas id="userChart" width="400" height="200"></canvas>

<script src="/js/charts.js"></script>
<?php
require_once __DIR__ . '/templates/footer.php';
