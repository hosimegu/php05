<?php

session_start();
include('functions.php');
check_session_id();
// GETデータ取得
$user_id = $_GET['user_id'];
$todo_id = $_GET['todo_id'];

// var_dump($user_id);
// exit();
// DB接続
$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM like_table WHERE user_id=:user_id AND todo_id=:todo_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
} else {
    $like_count = $stmt->fetch();
    //var_dump($like_count[0]); // データの件数を確認しよう!
    //exit();
}
// いいねしていれば削除,していなければ追加のSQLを作成
if ($like_count[0] != 0) {
    $sql = 'DELETE FROM like_table WHERE user_id=:user_id AND todo_id=:todo_id';
} else {
    $sql = 'INSERT INTO like_table(id, user_id, todo_id, created_at) VALUES(NULL, :user_id, :todo_id, sysdate())';
}


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    // エラー処理
} else {
    header("Location:todo_read.php");
    exit();
    //var_dump($like_count[0]); // データの件数を確認しよう!
    //exit();
}
