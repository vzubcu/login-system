<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
</head>

<body>
    <header>
        <h1>Login System</h1>
        <nav>
            <a href="index.php">Home</a> |
            <?php if (isset($_SESSION['user'])): ?>
                <a href="users.php">Manage Users</a> |
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </nav>

    </header>
    <hr>