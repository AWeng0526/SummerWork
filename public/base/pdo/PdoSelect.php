<?php

require "connect.php";

$sql = 'select * from tp_user';
$pdostmt = $pdo->prepare($sql);
$result = $pdostmt->execute();
$pdostmt->setFetchMode(PDO::FETCH_BOTH);
$rows = $pdostmt->fetchAll();
print_r($rows);
?>
