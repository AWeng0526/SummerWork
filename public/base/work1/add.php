<?php
require "connect.php";

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$time = time();

$insert = "insert into users (username,password,time) values (:username,:password,:time)";
$pdostmt = $pdo->prepare($insert);

$result = $pdostmt->execute([
    'username'  => $username,
    'password'  => $password,
    'time'      => $time
]);

echo json_encode([
    'statusCode' => 200,
    'statusMsg'  => '添加成功'
]);
