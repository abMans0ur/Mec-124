<?php
require_once "connection.php";
include "helpers.php";
if (isset($_SESSION['user'])) {
    header('location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

    $phone = validation('phone', 'Phone');
    $password = validation('password', 'Password');
    if (! empty($error)) {
    } else {

        $sql = "SELECT * FROM `users`WHERE `phone`= '$phone'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        if (!$user) {
            $error['login'] = "User not found";
            // exit;
        } elseif (!password_verify($password, $user['password'])) {
            $error['login'] = "Invalid password";
            // exit;
        } else {
            $_SESSION['user'] = $user;
            header('location: index.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    input {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button {
        padding: 10px;
        border-radius: 5px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }

    a {
        text-decoration: none;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <form action="" method="post">
        <input type="tel" name="phone" placeholder="Phone"
            value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
        <span style="color:red;"><?= $error['phone'] ?? '' ?></span>
        <input type="password" name="password" placeholder="Password">
        <span style="color:red;"><?= $error['password'] ?? '' ?></span>
        <button type="submit" name="login">Sign Up</button>
        <span style="color:red;"><?= $error['login'] ?? '' ?></span>

    </form>
    <a href="./register.php">Register</a>
</body>

</html>