<?php
// 文字コード設定
header('Content-Type: text/json; charset=UTF-8');


if ($_SERVER["REQUEST_METHOD"] == "GET") {
   /*getDeletionをここにかく*/
    $result = 'get';
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
    /*deleteUserをここにかく*/
    $result = 'put';
} else {
    $result = 'error';
}

print json_encode($result, JSON_PRETTY_PRINT);
?>