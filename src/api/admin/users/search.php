<?php
// 文字コード設定
header('Content-Type: text/json; charset=UTF-8');

//DBと接続
try{
    $dbh = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
     } catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}

//DBからとってきたデータを配列として格納

$name = $_GET["name"] ;
$name = '%'.$name.'%';

$prepare = $dbh->prepare('SELECT * FROM users WHERE name LIKE :name AND delete_flag = 0;');

$prepare->bindValue(':name',$name,PDO::PARAM_STR);

$prepare->execute();

$result = $prepare->fetchALL(PDO::FETCH_ASSOC);

$jsonstr =  json_encode($result, JSON_UNESCAPED_UNICODE);

echo $jsonstr;

?>