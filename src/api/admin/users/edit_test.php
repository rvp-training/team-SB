<?php
header('Content-Type: text/json; charset=UTF-8');

//DBと接続
try{
    $dbh = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
     } catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}

//変数にDBからとってきたデータを配列として格納
/*$name = $_POST["htmlのとこ参照するよ"];
$department = $_POST["htmlのとこ参照するよ"];
$position = $_POST["htmlのとこ参照するよ"];
$mail = $_POST["htmlのとこ参照するよ"];
$pass = $_POST["htmlのとこ参照するよ"];
$id = $_GET["id"];*/

$name = 'テス';
$department = 'テスト';
$position = 'テスト部';
$mail = 'test.co.j';
$pass = 'tes';
$id = 3;

$prepare = $dbh->prepare(
    'UPDATE users SET 
    name = :name, 
    department= :department, 
    position = :position,
    mail = :mail,
    pass = :pass
    WHERE id = :id;');

$prepare->bindValue(':name',(string)$name,PDO::PARAM_STR);
$prepare->bindValue(':department',(string)$department,PDO::PARAM_STR);
$prepare->bindValue(':position',(string)$position,PDO::PARAM_STR);
$prepare->bindValue(':mail',(string)$mail,PDO::PARAM_STR);
$prepare->bindValue(':pass',(string)$pass,PDO::PARAM_STR);
$prepare->bindValue(':id',(int)$id,PDO::PARAM_INT);

$prepare->execute();

echo "変更完了しました";
?>

