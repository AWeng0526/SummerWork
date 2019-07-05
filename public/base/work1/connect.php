<?php
/**
 * PDO方式：连接数据库
 */

$dsn = "mysql:host=127.0.0.1;dbname=test";

try {

    $pdo = new PDO($dsn, 'root', '');
    $pdo->exec('SET NAMES UTF8');

} catch (Exception $e) {
    echo 'connect fail. ' . $e->getMessage();
}