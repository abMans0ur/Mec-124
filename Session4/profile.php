<?php
require_once "connection.php";
include "helpers.php";
$user = $_SESSION['user'] ?? null;
if (!$user) {
    header('location: login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {

    $error = [];
    $name  = validation('name',  'Name');
    $phone = validation('phone', 'Phone');

    if (empty($error['phone']) && ! phoneCheck($phone, $conn, true, $user['id'])) {
        $error['phone'] = 'Phone number already exists';
    }

    if (
        isset($_FILES['profile_photo']) &&
        $_FILES['profile_photo']['error'] !== UPLOAD_ERR_NO_FILE
    ) {
        $uploaded = uploadFile($_FILES['profile_photo'], 'images', $name);
        if (! $uploaded) {
            $error['profile_photo'] = 'Failed to upload photo';
        } else {
            $profile_photo = $uploaded;
        }
    } else {
        $profile_photo = $user['profile_photo'];
    }
    if (empty($error)) {
        $sql = "UPDATE users SET name='$name', phone='$phone', profile_photo='$profile_photo' WHERE id=$user[id]";
        mysqli_query($conn, $sql);
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $name,
            'phone' => $phone,
            'profile_photo' => $profile_photo
        ];
        header('location: index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
    margin-bottom: 20px;
}

a {
    text-decoration: none;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border-radius: 5px;
    margin-top: 20px;
}

span.error {
    color: red;
    font-size: 0.9em;
}
</style>

<body>
    <a href="index.php">Back</a>
    <img src="<?= $user['profile_photo'] ?>" alt="">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="name" id="" placeholder="Name" value="<?= $user['name'] ?>">
        <span class="error"><?= $error['name'] ?? '' ?></span>
        <input type="tel" name="phone" id="" placeholder="Phone" value="<?= $user['phone'] ?>">
        <span class="error"><?= $error['phone'] ?? '' ?></span>
        <input type="file" name="profile_photo" id="" accept="image/*">
        <span class="error"><?= $error['profile_photo'] ?? '' ?></span>
        <button type="submit" name="update">Update</button>

    </form>

    <?php include 'footer.php' ?>
</body>

</html>