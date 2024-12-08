<?php

declare(strict_types=1);

require_once __DIR__ . '/autoload.php';

use LoginSystem\AuthFactory;

session_start();
$auth = AuthFactory::create();
$auth->logout();

header('Location: index.php');
exit;
