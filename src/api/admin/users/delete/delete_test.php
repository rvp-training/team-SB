<?php
header('Content-Type: text/json; charset=UTF-8');

//DBと接続
try{
    $dbh = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
     } catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}

//変数にDBからとってきたデータを配列として格納

$id = $_GET["id"];


//$id = 3;

$prepare = $dbh->prepare(
    'UPDATE users SET 
    delete_flag = 1
    WHERE id = :id;');

$prepare->bindValue(':id',(int)$id,PDO::PARAM_INT);

$prepare->execute();

echo "変更完了しました";