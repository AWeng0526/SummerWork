<?php

if (empty($_COOKIE['shop']) || empty($_POST['info'])) {
    return;
}

$pre_data = json_decode(json_decode($_COOKIE['shop']));
$new_data = json_decode($_POST['info']);
foreach ($new_data as $new) {
    for ($i = 0; $i < count($pre_data); $i++) {
        if ($new->id == $pre_data[$i]->id) {
            $pre_data[$i]->num += $new->num;
        }
    }
}

print_r($pre_data);



$data = json_encode($_POST['info']);
setcookie('shop', $data, time() + 3600);
echo $data;
