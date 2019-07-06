<?php

use app\pdo\MyPdo;

require "MyPdo.php";
require "config.php";
$pdo = new MyPdo($dsn, $username, $password);
$username = $_REQUEST['username'];
$data = $pdo->table('users')->where('username =' . $username)->find();
echo json_encode($data);
