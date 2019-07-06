<?php

use app\pdo\MyPdo;

require "MyPdo.php";
require "config.php";
$pdo = new MyPdo($dsn, $username, $password);
$data = $pdo->table('users')->select();
echo json_encode(["count" => ceil(count($data) / 3)]);
