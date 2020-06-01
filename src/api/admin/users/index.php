<?php


header('Content-Type: text/json; charset=UTF-8');

//DBと接続
try{
    $dbh = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
     
} catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}
//変数にDBからとってきたデータを配列として格納


$prepare = $dbh->prepare('SELECT * FROM users;');

$prepare->execute();

$result = $prepare ->fetchALL(PDO::FETCH_ASSOC);

$jsonstr =  json_encode($result, JSON_UNESCAPED_UNICODE);

echo $jsonstr;


/*$result = $prepare ->fetch();

$jsonstr =  json_encode($result, JSON_UNESCAPED_UNICODE
);
 


echo $jsonstr;
*/
?>
  