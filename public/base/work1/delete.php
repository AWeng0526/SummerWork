<?php
require "connect.php";

$username = $_REQUEST['username'];

$delete = "delete from users where username= :username";
$pdostmt = $pdo->prepare($delete);

$result = $pdostmt->execute([
    'username'  => $username,
]);

echo json_encode([
    'statusCode' => 200,
    'statusMsg'  => '删除成功'
]);
