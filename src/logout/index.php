<?php

header('Content-Type: text/json; charset=UTF-8');

// セッション開始
session_start();
// セッション変数を全て削除
$_SESSION = array();
// セッションの登録データを削除
session_destroy();

if (isset($_COOKIE["PHPSESSID"])) {
    setcookie("PHPSESSID", '', time() - 60000, '/');
    
}

header("HTTP/1.1 301 Moved Permanently");
header('Location: http://localhost/pages/login');


?>
