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
$_GET["post_id"] = 1;
$_SESSION["user_id"] = 1;
$POST["content"] = "成功してくれ";

$post_id = $_GET["post_id"];
$user_id = $_SESSION["user_id"];
$content = $POST["content"];

$prepare = $dbh->prepare("INSERT INTO comments(post_id, user_id, content, time) VALUES( :post_id, :user_id, :content, now());");

$prepare->bindValue(':post_id',(int)$post_id,PDO::PARAM_INT);
$prepare->bindValue(':user_id',(int)$user_id,PDO::PARAM_INT);
$prepare->bindValue(':content',$content,PDO::PARAM_STR);

$prepare->execute();

echo "コメントを投稿しました";

?>