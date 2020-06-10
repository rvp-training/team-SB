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
 
$start_no = ($now - 1) * $max; // 配列の何番目から取得すればよいか

//DBからとってきたデータを配列として格納

$name = $_GET["name"] ;
$name = '%'.$name.'%';

$prepare = $dbh->prepare('SELECT * FROM users WHERE name LIKE :name AND delete_flag = 0 LIMIT :max_p OFFSET :start_no;');

$prepare->bindValue(':name',$name,PDO::PARAM_STR);
$prepare->bindValue(':max_p',$max,PDO::PARAM_INT);
$prepare->bindValue(':start_no',$start_no,PDO::PARAM_INT);


$prepare->execute();

$result = $prepare->fetchALL(PDO::FETCH_ASSOC);

$jsonstr =  json_encode($result, JSON_UNESCAPED_UNICODE);

echo $jsonstr;

?>