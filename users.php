<?php

require_once __DIR__ . '/autoload.php';

use LoginSystem\Database;
use LoginSystem\UserManager;

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$database = new Database();
$userManager = new UserManager($database);

// Gestionăm operațiile CRUD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $userManager->createUser($_POST['username'], $_POST['password']);
    } elseif (isset($_POST['update'])) {
        $userManager->updateUserPassword((int)$_POST['id'], $_POST['password']);
    } elseif (isset($_POST['delete'])) {
        $userManager->deleteUser((int)$_POST['id']);
    }
}

// Obținem lista tuturor utilizatorilor
$users = $userManager->getAllUsers();

// Include header-ul
require_once __DIR__ . '/templates/header.php';
?>

<h2>Manage Users</h2>

<!-- Formular pentru crearea unui utilizator nou -->
<form method="post">
    <h3>Create User</h3>
    <label>Username: <input type="text" name="username" required></label>
    <label>Password: <input type="password" name="password" required></label>
    <button type="submit" name="create">Create</button>
</form>

<!-- Afișăm utilizatorii existenți -->
<h3>All Users</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td>
                <!-- Formular pentru actualizarea parolei -->
                <form method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <label>New Password: <input type="password" name="password" required></label>
                    <button type="submit" name="update">Update</button>
                </form>
                <?php
                    if ($_SESSION['user'] != $user['username']) {
                ?>
                    <!-- Formular pentru ștergerea utilizatorului -->
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                <?}?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
// Include footer-ul
require_once __DIR__ . '/templates/footer.php';
