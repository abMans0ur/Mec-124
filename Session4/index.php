<?php
require_once "connection.php";
$user = $_SESSION['user'] ?? null;
if (!$user) {
    header('location: login.php');
    exit;
}
echo "<h1>Welcome $user[name] to the home page</h1>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<style>
body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

img {
    width: 200px;
    height: 200px;
    border-radius: 50%;
}

a,
button {
    text-decoration: none;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border-radius: 5px;
    margin-top: 20px;
}

h1 {
    margin-bottom: 20px;
}
</style>

<body>
    <img src="<?= $user['profile_photo']  ?>" alt="">

    <a href="profile.php">Edit Profile</a>
    <?php
    include "footer.php";
    ?>
</body>

</html>