<?php 
try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');

    $sql = "CREATE TABLE categories (
        id int UNIQUE PRIMARY KEY,
        category_name varchar(255) DEFAULT NULL,
    )";

    $sql2 = "INSERT INTO categories VALUES(
        (1,'business')
        (2,'private')
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

