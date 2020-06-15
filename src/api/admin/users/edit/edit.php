<?php
header('Content-Type: text/json; charset=UTF-8');
//DBと接続
try{
    $dbh = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
     } catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}

$name = $_POST["name"];
$department = $_POST["department"];
$position = $_POST["position"];
$mail = $_POST["mail"];
$pass = $_POST["pass"];
$id = $_POST["id"];
$prepare = $dbh->prepare(
    'UPDATE users SET 
    name = :name, 
    department= :department, 
    position = :position,
    mail = :mail,
    pass = :pass
    WHERE id = :id;');
$prepare->bindValue(':name',$name,PDO::PARAM_STR);
$prepare->bindValue(':department',$department,PDO::PARAM_STR);
$prepare->bindValue(':position',$position,PDO::PARAM_STR);
$prepare->bindValue(':mail',$mail,PDO::PARAM_STR);
$prepare->bindValue(':pass',$pass,PDO::PARAM_STR);
$prepare->bindValue(':id',$id,PDO::PARAM_INT);
$prepare->execute();
$result = $prepare->rowCount();

if($result === 1){
    echo "変更完了しました";
} else {
    echo "変更に失敗しました";
}
?>



