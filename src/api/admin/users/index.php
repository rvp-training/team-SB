<?php

header('Content-Type: text/json; charset=UTF-8');

//DBと接続
try{
    $dbh = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
     } catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}

// ページネーション
$max = 20;
if(!isset($_GET['p']) || $_GET['p'] == 0 ){ // $_GET['p'] はURLに渡された現在のページ数
    $now = 1; // 設定されてない場合は1ページ目にする
}else{
    $now = $_GET['p'];
}
 
$start_no = ($now - 1) * $max; // 配列の何番目から取得すればよいか

$prepare = $dbh->prepare('SELECT * FROM users WHERE delete_flag = 0 ORDER BY id LIMIT :max_p OFFSET :start_no;');

$prepare->bindValue(':max_p',$max,PDO::PARAM_INT);
$prepare->bindValue(':start_no',$start_no,PDO::PARAM_INT);

$prepare->execute();

$result = $prepare->fetchALL(PDO::FETCH_ASSOC);

$jsonstr =  json_encode($result, JSON_UNESCAPED_UNICODE);

echo $jsonstr;

?>