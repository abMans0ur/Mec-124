<?php
$age = 32;
// echo "My age is \$x";
// echo "<br>";
// echo 'My age is '.$x;
// $suffix = 'Mr.';
$firstName = "Ola";
$lastName = "Ali";
$fullName = "$firstName $lastName";
echo "$fullName<br>";
$x = true;
$isMale = false;
if ($isMale === true) {
    $suffix = "Mr.";
} else {
    $suffix = "Mrs.";
}

// $x = '500';
// if ($x > 500) {
//     echo "x is higher than 500";
// } else if ($x === 500) {
//     echo "x identical to 500";
// } else if ($x == 500) {
//     echo "x equals to 500";
// }
//  else {
//     echo "x is less than 500";
// }
// echo "<br>";
// var_dump($x);

$temp = 0;

// if ($temp > 35)
//     echo "very Hot!!!";
// elseif ($temp <= 35 && $temp > 25)
//     echo "<h1>Hot</h1>";
// elseif ($temp <= 25 && $temp > 15)
//     echo "neutral";
// elseif ($temp <= 15 && $temp > 5)
//     echo "cold";
// else
//     echo "very cold";
// echo "<br>";
// $grade = 'a';
// switch ($grade) {
//     case 'a':
//         echo "excellent";
//         break;
//     case 'b':
//         echo "very good";
//         break;

//     case 'c':
//         echo " good";
//         break;

//     case 'd':
//         echo "passed";
//         break;

//     default:
//         echo "failed";
// }
// add +
echo "<br>";
$x = 5;
echo $x . "<br>";
$x = $x + 1;
echo $x . "<br>";
++$x;
echo $x . "<br>";
$x += 1;
echo $x . "<br>";
echo ++$x . "<br>";
echo $x;
// - minus
echo "<br>";
$x = 5;
echo $x . "<br>";
$x = $x - 1;
echo $x . "<br>";
--$x;
echo $x . "<br>";
$x -= 1;
echo $x . "<br>";
echo --$x . "<br>";
echo $x;
echo "<br>";
// multiple
$y = 5**2;
echo $y;
// divide 
$divide = 25 / 5;
echo"<br>";
// echo $divide;
$num =165461319462;
// modulus
if ($num % 2 == 0)
    echo "$num is even number";
else
    echo "$num is odd number";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?= "$suffix $fullName" ?></h1>
    <h3>and My age is<?= $age ?></h3>
</body>

</html>
<!-- C++
dataTypes
int/float/double Int x = 5;
string String name ="Ahmed"
bool bool isAdmin = false
char char grade ='a' -->