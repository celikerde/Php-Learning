<?php

use Illuminate\Support\Collection;

require __DIR__ . "/../vendor/autoload.php";

$numbers = new Collection([1,2,3,4,5,6,7,8,9,10]);

// if($numbers->contains(100)){
//     die("Contains 100");
// }else{
//     die("Does not contain 100");
// }

$lessthanFive = $numbers->filter(function ($number) {
    return $number <= 5;
});

die(var_dump($lessthanFive));