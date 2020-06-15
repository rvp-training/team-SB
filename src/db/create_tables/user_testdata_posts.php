<?php 
try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');

    $sql = "INSERT INTO users VALUES (1,'test','企画','部長','test@gmail.com', 'testtesttest',0,0);
    ";


    $res = $db->query($sql);

} catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}


if(!$res){
    print("レコードが作成されませんでした");
}else{
    print("レコードが作成されました");
}

?>



