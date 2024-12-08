<?php

declare(strict_types=1);

require_once __DIR__ . '/autoload.php';

use LoginSystem\AuthFactory;

session_start();
$auth = AuthFactory::create();

require_once __DIR__ . '/templates/header.php';

if ($auth->isLoggedIn()) {
    echo "<p>Welcome, {$_SESSION['user']}!</p>";
} else {
    echo "<p>Please log in to access this page.</p>";
}

require_once __DIR__ . '/templates/footer.php';
