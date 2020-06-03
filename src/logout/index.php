<?php

header('Content-Type: text/json; charset=UTF-8');

//DBと接続
try{
    $dbh = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
     } catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}

// セッション開始
session_start();
// セッション変数を全て削除
$_SESSION = array();
// セッションの登録データを削除
session_destroy();

print "ログアウト処理完了";

?>
