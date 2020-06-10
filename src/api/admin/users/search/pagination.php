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
if(!isset($_GET['p']) || $_GET['p'] == 0 ){ // $_GET['p'] はURLに渡された現在のページ数
    $now = 1; // 設定されてない場合は1ページ目にする
}else{
    $now = $_GET['p'];
}

$name = $_GET["name"] ;
$name = '%'.$name.'%';

$prepare = $dbh->prepare('SELECT id FROM users WHERE name LIKE :name AND delete_flag = 0;');

$prepare->bindValue(':name',$name,PDO::PARAM_STR);

$prepare->execute();

$result = $prepare ->fetchALL(PDO::FETCH_ASSOC);
         
$books_num = count($result); // トータルデータ件数
 
$max_page = ceil($books_num / $max); // トータルページ数

$result = [ "now" => $now,
            "max_page" => $max_page ];

$jsonstr =  json_encode($result, JSON_UNESCAPED_UNICODE);

echo $jsonstr;
?>