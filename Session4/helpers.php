<?php
function uploadFile($file, $directory, $name): string
{
    $fileName = time() .
        '_' . $name .
        '.' .
        pathinfo($file['name'], PATHINFO_EXTENSION);
    $filePath = $directory . '/' . $fileName;
    move_uploaded_file($file['tmp_name'], $filePath);
    return $filePath;
}
function validation($input, $type): ?string
{
    global $error, $conn;
    // catch missing or all-whitespace
    if (! isset($_POST[$input]) || trim($_POST[$input]) === '') {
        $error[$input] = "$type is required";
        return null;
    }
    return mysqli_real_escape_string($conn, $_POST[$input]);
}

function ageCalculator($birthDate): int
{
    $today = date_create(date('Y-m-d'));
    $date1 = date_create($birthDate);
    $daysDifference = date_diff($today, $date1);
    $age = ceil($daysDifference->days / 365);
    return $age;
}

function phoneCheck($phone, $conn, $isUpdate = false, $userId = null)
{
    $sqlQuery  = "SELECT * FROM `users` WHERE `phone`='$phone'";
    if ($isUpdate) {
        $sqlQuery .= " AND `id` != $userId";
    }
    $result    = mysqli_query($conn, $sqlQuery);
    if (mysqli_num_rows($result) > 0) {
        return false;
    }
    return true;
}