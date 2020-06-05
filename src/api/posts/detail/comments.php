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
// $_POST["user_id"] = 3;

$post_id = $_POST["post_id"];
$user_id = $_POST["user_id"];
$content = $_POST["content"];

$prepare = $dbh->prepare("INSERT INTO comments(post_id, user_id, content, time) VALUES( :post_id, :user_id, :content, now());");

$prepare->bindValue(':post_id',(int)$post_id,PDO::PARAM_INT);
$prepare->bindValue(':user_id',(int)$user_id,PDO::PARAM_INT);
$prepare->bindValue(':content',$content,PDO::PARAM_STR);

$prepare->execute();

if(!$res){
    echo "コメント投稿に失敗しました！";
    echo "\n";
    var_dump($prepare->errorInfo());
}else{
    echo "コメント投稿に成功しました";
}

?>