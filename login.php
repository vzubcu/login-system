<?php

declare(strict_types=1);

require_once __DIR__ . '/autoload.php';

use LoginSystem\AuthFactory;

session_start();
$auth = AuthFactory::create();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($auth->login($username, $password)) {
        header('Location: index.php');
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}

require_once __DIR__ . '/templates/header.php';

if (isset($error)) {
    echo "<p style='color: red;'>$error</p>";
}

require_once __DIR__ . '/templates/login-form.php';
require_once __DIR__ . '/templates/footer.php';
