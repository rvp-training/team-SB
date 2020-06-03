<?php
//テスト用のAPIです
// 文字コード設定
header('Content-Type: text/json; charset=UTF-8');




$result=$_POST["mail"];

$result = mb_convert_encoding($result, "utf-8");

// 配列をjson形式にデコードして出力, 第二引数は、整形するための定数
print json_encode($result, JSON_UNESCAPED_UNICODE);

?>