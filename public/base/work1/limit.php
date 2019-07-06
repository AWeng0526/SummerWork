<?php

use app\pdo\MyPdo;

require "MyPdo.php";
require "config.php";
$pdo = new MyPdo($dsn, $username, $password);
$pageCount = 3;
$page = $_REQUEST['page'];
$data = $pdo->table('users')
    ->limit($pageCount * ($page - 1) . "," . $pageCount)
    ->select();
echo json_encode($data);
