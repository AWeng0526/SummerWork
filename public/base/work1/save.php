<?php


$username = $_POST['username'];
$userpwd = $_POST['userpwd'];

//添加数据

echo json_encode([
    'statusCode' => 200,
    'statusMsg'  => '添加成功'
]);