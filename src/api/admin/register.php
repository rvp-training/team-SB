<?php
header('Content-Type: text/json; charset=UTF-8');

//DBと接続
try{
    $dbh = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
     } catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}

//変数にDBからとってきたデータを配列として格納

$name = $_POST["name"];
$department = $_POST["department"];
$position = $_POST["position"];
$mail = $_POST["mail"];
$pass = $_POST["pass"];

$prepare = $dbh->prepare('INSERT INTO users ( 
    name, department, position, mail, pass ) 
    VALUES ( :name, :department, :position, :mail, :pass);');

$prepare->bindValue(':name',$name,PDO::PARAM_STR);
$prepare->bindValue(':department',$department,PDO::PARAM_STR);
$prepare->bindValue(':position',$position,PDO::PARAM_STR);
$prepare->bindValue(':mail',$mail,PDO::PARAM_STR);
$prepare->bindValue(':pass',$pass,PDO::PARAM_STR);

$prepare->execute();

$result = $prepare->rowCount();

if($result === 1){
echo "登録完了しました";
} else {
    echo "登録に失敗しました";
}

?>
