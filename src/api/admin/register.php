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
*/
$name = 'テスト';
$department = 'テスト部';
$position = 'テスト部長';
$mail = 'test@co.jp';
$pass = 'test';

$prepare = $dbh->prepare('INSERT INTO users ( 
    name, department, position, mail, pass ) 
    VALUES ( :name, :department, :position, :mail, :pass);');

$prepare->bindValue(':name',(string)$name,PDO::PARAM_STR);
$prepare->bindValue(':department',(string)$department,PDO::PARAM_STR);
$prepare->bindValue(':position',(string)$position,PDO::PARAM_STR);
$prepare->bindValue(':mail',(string)$mail,PDO::PARAM_STR);
$prepare->bindValue(':pass',(string)$pass,PDO::PARAM_STR);

$prepare->execute();

echo "登録完了しました";
?>