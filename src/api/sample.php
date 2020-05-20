<?php
// 文字コード設定
header('Content-Type: text/html; charset=UTF-8');

$arr["message"] = "Hello PHP!";

// 配列をjson形式にデコードして出力, 第二引数は、整形するための定数
print json_encode($arr, JSON_PRETTY_PRINT);
