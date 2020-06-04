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

$category = $_GET["category"];

$prepare = $dbh->prepare('SELECT posts.id, image_1, title, name, tag
FROM posts JOIN users
ON users.id = posts.user_id
JOIN images 
ON posts.image_id = images.id
WHERE category_id = :category;');

$prepare->bindValue(':category',(int)$category,PDO::PARAM_INT);

$prepare->execute();

$result = $prepare->fetchALL(PDO::FETCH_ASSOC);

$jsonstr =  json_encode($result, JSON_UNESCAPED_UNICODE);

echo $jsonstr;

?>