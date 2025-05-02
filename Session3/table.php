<?php
include "connection.php";

$sql = "SELECT * FROM `users`";
$users = mysqli_query($conn, $sql);

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $sql = "DELETE FROM`users`WHERE `id`=$user_id";
    mysqli_query($conn, $sql);
    header('location: table.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLE</title>
</head>

<body>
    <a href="./index.php">ADD</a>
    <h1>Users</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
        foreach ($users as $user) {
        ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['age'] ?></td>
            <td><a href="index.php?user_id=<?= $user['id'] ?>">Edit</a></td>
            <td><a href="table.php?user_id=<?= $user['id'] ?>">Delete</a></td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>