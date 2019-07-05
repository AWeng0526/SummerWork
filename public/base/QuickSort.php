<?php

function quickSort($arr)
{
    if (count($arr) == 0) {
        return [];
    }
    $tmp = $arr[0];
    $left = [];
    $right = [];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $tmp) {
            array_push($left, $arr[$i]);
        } else {
            array_push($right, $arr[$i]);
        }
    }
    $left = quickSort($left);
    $right = quickSort($right);
    return array_merge($left, [$tmp], $right);
}



$arr = [1, 23, 4, 12, 5];
$sorted = quickSort($arr);
foreach ($sorted as $a) {
    echo $a;
    echo "<br/>";
}
