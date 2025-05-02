<?php
include "connection.php";
include "helpers.php";

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['register'])
) {

    $name = validation('name', 'Name');
    $phone = validation('phone', 'Phone');
    $password = validation('password', 'Password');
    $birth_date = validation('birth_date', 'Birth Date');
    if (
        ! isset($_FILES['profile_photo']) ||
        $_FILES['profile_photo']['error'] === UPLOAD_ERR_NO_FILE
    ) {
        $error['profile_photo'] = 'Profile Photo is required';
    }
    if (empty($error['phone'])) {
        if (!phoneCheck($phone, $conn)) {
            $error['phone'] = 'Phone number already exists';
        }
    }
    if (empty($error)) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $age      = ageCalculator($birth_date);
        $photo    = uploadFile(
            $_FILES['profile_photo'],
            'images',
            $name
        );

        $sql = "INSERT INTO `users` (`name`, `phone`, `password`, `age`,`profile_photo`) 
                        VALUES ('$name', '$phone', '$password', '$age','$photo')";
        mysqli_query($conn, $sql);
        $user_id = mysqli_insert_id($conn);
        $user = [
            'id' => $user_id,
            'name' => $name,
            'phone' => $phone,
            'password' => $password,
            'age' => $age,
            'profile_photo' => $photo,
        ];
        $_SESSION['user'] = $user;
        header('location: index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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

    span.error {
        color: red;
        font-size: 0.9em;
    }
    </style>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
        <span class="error"><?= $error['name'] ?? '' ?></span>
        <input type="tel" name="phone" placeholder="Phone" value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
        <span class="error"><?= $error['phone'] ?? '' ?></span>

        <input type="password" name="password" placeholder="Password">
        <span class="error"><?= $error['password'] ?? '' ?></span>

        <input type="date" name="birth_date" value="<?= htmlspecialchars($_POST['birth_date'] ?? '') ?>">
        <span class="error"><?= $error['birth_date'] ?? '' ?></span>

        <input type="file" name="profile_photo" accept="image/*">
        <span class="error"><?= $error['profile_photo'] ?? '' ?></span>

        <button type="submit" name="register">Register</button>
    </form>
    <a href="./login.php">Login</a>
</body>

</html>