<?php
// 文字コード設定
header('Content-Type: text/json; charset=UTF-8');

//DBと接続
try{
    $dbh = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
     } catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}

// ページネーション
$max = 20;
if(!isset($_GET['p']) || $_GET['p'] == 0){ // $_GET['p'] はURLに渡された現在のページ数
    $now = 1; // 設定されてない場合は1ページ目にする
}else{
    $now = $_GET['p'];
}

$prepare = $dbh->prepare('SELECT id FROM users  WHERE delete_flag = 0;');

$prepare->execute();

$result = $prepare ->fetchALL(PDO::FETCH_ASSOC);
         
$books_num = count($result); // トータルデータ件数
 
$max_page = ceil($books_num / $max); // トータルページ数

$result = [ "now" => $now,
            "max_page" => $max_page,
            "number" => $books_num ];

$jsonstr =  json_encode($result, JSON_UNESCAPED_UNICODE);

echo $jsonstr;
?>