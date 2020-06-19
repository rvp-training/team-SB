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
$category = $_GET["category"];
 
if(!isset($_GET['p']) || $_GET['p'] == 0  ){ // $_GET['p'] はURLに渡された現在のページ数
    $now = 1; // 設定されてない場合は1ページ目にする
}else{
    $now = $_GET['p'];
}
 
$start_no = ($now - 1) * $max; // 配列の何番目から取得すればよいか

//DBからとってきたデータを配列として格納
$prepare = $dbh->prepare('SELECT posts.id, image_1, title, name, tag
FROM posts JOIN users
ON users.id = posts.user_id
JOIN images 
ON posts.image_id = images.id
WHERE category_id = :category
ORDER BY posts.time DESC
LIMIT :max_p OFFSET :start_no;');

$prepare->bindValue(':category',(int)$category,PDO::PARAM_INT);
$prepare->bindValue(':max_p',(int)$max,PDO::PARAM_INT);
$prepare->bindValue(':start_no',(int)$start_no,PDO::PARAM_INT);
$prepare->execute();

$result = $prepare->fetchALL(PDO::FETCH_ASSOC);

$jsonstr =  json_encode($result, JSON_UNESCAPED_UNICODE);

echo $jsonstr;


?>