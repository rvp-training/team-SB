<?php

header('Content-Type: text/json; charset=UTF-8');

//DBと接続
try{
    $dbh = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
     } catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}

$max = 2;

$prepare = $dbh->prepare('SELECT * FROM users WHERE delete_flag = 0;');

$prepare->execute();

$result = $prepare ->fetchALL(PDO::FETCH_ASSOC);
         
$books_num = count($result); // トータルデータ件数
 
$max_page = ceil($books_num / $max); // トータルページ数

$_GET['p'] = 2;
 
if(!isset($_GET['p'])){ // $_GET['p'] はURLに渡された現在のページ数
    $now = 1; // 設定されてない場合は1ページ目にする
}else{
    $now = $_GET['p'];
}
 
$start_no = ($now - 1) * $max; // 配列の何番目から取得すればよいか

$prepare_p = $dbh->prepare('SELECT * FROM users WHERE delete_flag = 0 LIMIT :max_p OFFSET :start_no;');

$prepare_p->bindValue(':max_p',(int)$max,PDO::PARAM_INT);
$prepare_p->bindValue(':start_no',(int)$start_no,PDO::PARAM_INT);

$prepare_p->execute();

$result_p = $prepare_p->fetchALL(PDO::FETCH_ASSOC);

$jsonstr =  json_encode($result_p, JSON_UNESCAPED_UNICODE);

echo $jsonstr;



} 
 
?>