<?php
/**
 * PDO方式： 增、删、改
 */

require 'connect.php';

//添加操作 INSERT

//$insert = "INSERT INTO tp_user (username, userpwd) VALUES(:name, :pwd)";
//
//$pdostmt = $pdo->prepare($insert); //预处理SQL，检查SQL语句的语法是否正确
//
//$result = $pdostmt->execute([
//    'name' => 'sa',
//    'pwd'  => '123123'
//]); //返回结果 boolean  true：执行成功
//
//echo $pdo->lastInsertId(); //获取新增ID
//echo '<hr>';
//echo '受影响行数：' . $pdostmt->rowCount();


//删除操作 DELETE

//$delete = "DELETE FROM tp_user WHERE uid=:uid";
//$pdostmt = $pdo->prepare($delete);
//
//$result = $pdostmt->execute([
//    'uid' => 1
//]);
//
//echo '删除行数：' . $pdostmt->rowCount();


//修改 UPDATE
$update = "UPDATE tp_user SET userpwd=:pwd WHERE uid=:id";
$pdostmt = $pdo->prepare($update);

$result = $pdostmt->execute([
    'pwd' => md5('123456'),
    'id'  => 2
]);

echo '受影响行数：' . $pdostmt->rowCount();
