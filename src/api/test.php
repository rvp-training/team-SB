<?php
//テスト用のAPIです
// 文字コード設定
header('Content-Type: text/json; charset=UTF-8');




$arr = array (
    array(
    "name" => "佐藤",
    "department" => "情報システム部",
    'position' => "部長"
    ),
    array(
    "name" => "田中",
    "department" => "人事部",
    'position' => "部長"
    )
);

$arr = mb_convert_encoding($arr, "utf-8");

// 配列をjson形式にデコードして出力, 第二引数は、整形するための定数
print json_encode($arr, JSON_UNESCAPED_UNICODE);

?>