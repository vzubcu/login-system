<?php

require_once __DIR__ . '/autoload.php';

use LoginSystem\AuthFactory;

session_start();
$auth = AuthFactory::create();

require_once __DIR__ . '/templates/header.php';
?>

<section class="welcome">
    <h1>Welcome to the Login System</h1>
    <p>This system allows you to manage users, monitor activity, and much more.</p>
</section>

<?php
require_once __DIR__ . '/templates/footer.php';
