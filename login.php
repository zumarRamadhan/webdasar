<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "usm" && $password == "123") {

        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    }
}
?>
<html>
    <head>
        <title>Login Page</title>
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-size: cover;
                background: #020024;
                background-image: url("bg.png");
                background-attachment: fixed;
            }
            table{
                background-color: white;
                border: 4px solid #ddd;
                padding: 20px;
                border-radius: 20px;
                font-family:Arial, Helvetica, sans-serif;
                box-shadow: 0px 10px 20px black
            }
            td{
                padding: 10px;
            }
            button{
                background-color: #4F7BFF;
                color: white;
                padding: 10px;
                border: 0;
                border-radius: 5px;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <form action="login.php" method="post">
         <table>
            <tr>
                <td colspan="2" style="text-align: center; font-weight: bold; font-size: 30px;" >LOGIN</td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="checkbox" /> Ingatkan saya</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button type="submit" >SUBMIT</button></td>
            </tr>
        </table>
        </form>
    </body>
</html>