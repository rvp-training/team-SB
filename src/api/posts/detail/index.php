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
$post_id = $_GET["id"];

$prepare = $dbh->prepare('SELECT posts.id, image_1, image_2, image_3, image_4, image_5, title, text, posts.time, users.name, department, position, delete_flag, tag, category_id
FROM posts JOIN users
ON users.id = posts.user_id
JOIN images 
ON posts.image_id = images.id
WHERE posts.id = :post_id;');

$prepare->bindValue(':post_id',(int)$post_id,PDO::PARAM_INT);

$prepare->execute();

$main = $prepare->fetchALL(PDO::FETCH_ASSOC);

$prepare1 = $dbh->prepare('SELECT comments.id, name, department, position, delete_flag, content, time
FROM comments JOIN users
ON users.id = comments.user_id
WHERE post_id = :post_id
ORDER BY comments.time ASC;');

$prepare1->bindValue(':post_id',(int)$post_id,PDO::PARAM_INT);

$prepare1->execute();

$comments = $prepare1->fetchALL(PDO::FETCH_ASSOC);

$result = array("main" => $main, "comments" => $comments);


$jsonstr1 =  json_encode($result, JSON_UNESCAPED_UNICODE);


echo $jsonstr1;

?>