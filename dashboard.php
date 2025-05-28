<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$login_count = $_SESSION['login_count'];
?>

<!DOCTYPE html>
<html>
 <head>
        <title>::Login Page::</title>
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
        </style>
    </head>
<body>
    <h1>Selamat datang <?php echo htmlspecialchars($username); ?> ke - <?php echo $login_count; ?></h1>
</body>
</html>