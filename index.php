<?php


$arr = array(5, 4, 3, 2, 1);

echo implode($arr) . PHP_EOL;

$arr[] = 6;
$arr[] = 7;
$arr[] = 8;

echo implode($arr) . PHP_EOL;

sort($arr);

echo implode($arr) . PHP_EOL;