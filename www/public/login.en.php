<?php
require_once("authentication/db_connect.php");
session_start();

if (isset($_SESSION['user'])) {
    header('Location: ../profile.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authorization</title>
    <link rel="stylesheet" href="/css/<?php echo $_SESSION['theme'] = redisGet(substr_replace(session_id(),"PHPREDIS_THEME:",0, 0));?>">
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body >

<!-- Форма авторизации -->
<div class="login-wrapper">
    <form action="authentication/signing.php" method="post">
        <label>Username</label>
        <input type="text" name="login" placeholder="Username">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Enter</button>
        <p>
            Not registered? - <a href="/register.en.php">Register now</a>!
            <br>
            <br>
            <a class="back-button" href="http://localhost/index.en.php">Back to homepage</a>
        </p>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>

    </form>
</div>
</body>
</html>
