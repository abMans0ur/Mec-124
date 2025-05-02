<?php
// loops
//  1% => do...while
//  4% => while
//  95% => for
// $i = 110;
// while ($i >= 1) {
//     echo "<h1>$i </h1>";
//     // $i++; //asc
//     $i--; //desc
// }

// do {
//     echo "<h1>$i</h1> ";
//     $i++;
// } while ($i <= 10);

// for ($i = 100; $i <= 10; $i++) {
//     echo "<h1>{$i}</h1> ";
// }
// indexed Array
$names = [
    "Abdelrahman", //0
    "Hassan", //1
    "Hany", //2
    "Issac", //3
    "Nermine", //4
    "Mohamed" //5
];
// for ($i = 0; $i < count($names); $i++)
//     echo $names[$i] . "<br>";
// foreach ($names as $key => $value) {
//     echo "$key => $value<br>";
// }
// // Associative Array 
// $names = array(
//     'firstName' => 'Ali',
//     'surName'   => 'Mohamed',
//     'lastName' => 'Mansour'
// );
// built-in functions
// $names[7] = null;
array_push($names, 'Ali', 'Alaa');
array_pop($names);
array_shift($names);
array_unshift($names, "Mansour");
// foreach ($names as $key => $value) {
//     echo "<h2>$key => $value</h2>";
// }

// DRY code

// DON'T REPEAT YOURSELF

function greeting(string $name, bool $isMale = true,bool $firstTime = false)
{
    $suffix = $isMale ? 'Mr.' : 'Mrs.';
    $backWord = $firstTime ? '' : 'Back';
    echo "Welcome $backWord $suffix$name<br>";
}

greeting('Ali');
greeting('Ahmed');
greeting('Mohamed',firstTime:true);
greeting('Fatma', false);
