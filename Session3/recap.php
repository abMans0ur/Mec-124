<?php
// //Data Types
// $name = "John Doe"; //string  OR 'John Doe' OR "John Doe"
// $age = 30; //integer
// $salary = 500.50; //float or double 
// $married = true; //boolean
// echo "<h1>My name is $name</h1>";
// echo '<h1> My name is ' . $name . '</h1>';
// // array
// // indexed array
// $oldFruits = array("apple", "banana", "orange"); //old way
// $newFruits = ["apple", "banana", "orange"]; //new way
// echo $oldFruits[0]; //apple
// echo $newFruits[1]; //banana
// // associative array
// $person = [
//     "name" => "John",
//     "age" => 30,
//     "salary" => 500.50
// ]; //new way

// echo $person["name"]; //John
// echo $person["age"]; //30

// loops 
// for loop
// for ($i = 1; $i <= 10; $i++) {
//     echo $i . "<br>";
// }
// // while loop
// $i = 1;
// while ($i <= 10) {
//     echo $i . "<br>";
//     $i++;
// }
// do while loop
// $i = 1100000000;
// do {
//     echo $i . "<br>";
//     $i++;
// } while ($i <= 10);
// // foreach loop
// $fruits = ["apple", "banana", "orange"];
// for ($i = 0; $i < count($fruits); $i++) {
//     echo $fruits[$i] . "<br>";
// }

// foreach ($fruits as $fruit) {
//     echo $fruit . "<br>";
// }
$images = [
    "apple" => "https://placehold.co/600x400/orange/red",
    "banana" => "https://placehold.co/600x400/orange/yellow",
    "orange" => "https://placehold.co/600x400/orange/white"
];

// foreach ($images as $fruit => $image) {
//     echo "<h1>$fruit </h1>";
//     echo "<img src='$image' alt='$fruit'>";
// }
// echo "<img src='$images[apple]' alt='apple'>";

//functions
//userDefined functions  DRY (Don't Repeat Yourself)
function add($a, $b)
{
    echo $a + $b . "<br>";
}

add(10, 20); //200
add(100, 20); //200
add(10, 200); //200
add(10, 2021); //200
add(1054, 20); //200

// built-in functions
echo strlen("Hello World"); //11