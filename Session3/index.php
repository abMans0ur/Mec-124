<?php
include "connection.php";
$update = false;
if (isset($_GET['user_id'])) {
    $update = true;
    $user_id = $_GET['user_id'];
    $sql = "SELECT * FROM `users` WHERE `id` = $user_id";
    $sqlQuery = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($sqlQuery);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
</head>

<body>
    <a href="./table.php">TABLE</a>
    <h1>Form</h1>
    <form method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php if ($update) echo $user['name'] ?>" required>
        <br><br>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" value="<?php if ($update) echo $user['age'] ?>" required>
        <br><br>
        <?php
        if ($update) {
        ?>
        <button type="submit" name="update">Update</button>
        <?php
        } else {
        ?>
        <button type="submit" name="ok">Save</button>
        <?php
        }
        ?>
    </form>
</body>

</html>

<?php

// $_POST superglobal
// $_SERVER superglobal
if (
    isset($_POST['ok']) &&
    $_SERVER['REQUEST_METHOD'] === 'POST'
) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sql = "INSERT INTO `users` (`name`,`age`) VALUES ('$name', $age)";
    mysqli_query($conn, $sql);
    header('location: table.php');
}
if (
    isset($_POST['update']) &&
    $_SERVER['REQUEST_METHOD'] === 'POST'
) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sql = "UPDATE `users` SET `name`='$name',`age`=$age WHERE`id`= $user_id";
    mysqli_query($conn, $sql);
    header('location: table.php');
}