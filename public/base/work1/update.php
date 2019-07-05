<?php
require "connect.php";

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$time = time();

$update = "update users set password=:password,time=:time where username=:username";
$pdostmt = $pdo->prepare($update);

$result = $pdostmt->execute([
    'username'  => $username,
    'password'  => $password,
    'time'      => $time
]);

echo json_encode([
    'statusCode' => 200,
    'statusMsg'  => '添加成功'
]);
