<?php


header('Content-Type: text/json; charset=UTF-8');

//DBと接続
try{
    $dbh = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
     
} catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}
//変数にDBからとってきたデータを配列として格納


$prepare = $dbh->prepare('SELECT ＊ FROM users;');

$prepare->execute();

$result = $prepare ->fetchALL();

$jsonstr =  json_encode($result);
 
echo $jsonstr;

?>
  