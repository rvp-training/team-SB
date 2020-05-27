<?php
// 文字コード設定
header('Content-Type: text/json; charset=UTF-8');

$connection = pg_connect("host=db dbname=postgres user=postgres password=password");
$arr['pg'] = pg_version($connection)['client'];
pg_close($connection);

$arr["major"] = 0;
$arr["minor"] = 0;
$arr["revision"] = 1;

// 配列をjson形式にデコードして出力, 第二引数は、整形するための定数
print json_encode($arr, JSON_PRETTY_PRINT);
