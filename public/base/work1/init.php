<?php

require "connect.php";

$sql = 'select * from users';
$pdostmt = $pdo->prepare($sql);
$result = $pdostmt->execute();
$pdostmt->setFetchMode(PDO::FETCH_UNIQUE | PDO::FETCH_ASSOC);
$rows = $pdostmt->fetchAll();
echo json_encode($rows);
