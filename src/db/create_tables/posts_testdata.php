<?php 
try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');

    $sql = "UPDATE posts SET user_id = 1;";

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