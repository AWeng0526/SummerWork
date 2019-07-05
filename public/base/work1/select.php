<?php

require "connect.php";
$username = $_REQUEST['username'];

$sql = 'select * from users where username=:username';
$pdostmt = $pdo->prepare($sql);
$result = $pdostmt->execute([
    'username' => $username
]);
$pdostmt->setFetchMode(PDO::FETCH_UNIQUE | PDO::FETCH_ASSOC);
$rows = $pdostmt->fetch();
echo json_encode($rows);
