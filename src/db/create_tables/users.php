<?php 
try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');

    $sql = "CREATE TABLE users (
        id serial UNIQUE PRIMARY KEY,
        name varchar(255) NOT NULL,
        department varchar(255) NOT NULL,
        position varchar(255) NOT NULL,
        mail varchar(255) UNIQUE NOT NULL,
        pass varchar(255) NOT NULL,
        delete_flag integer NOT NULL default 0,
        admin_flag integer NOT NULL default 0
    )";

    $res = $db->query($sql);

} catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}


if(!$res){
    print("テーブルが作成されませんでした");
}else{
    print("テーブルが作成されました");
}

?>



