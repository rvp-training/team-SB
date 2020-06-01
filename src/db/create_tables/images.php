<?php 
try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');

    $sql = "CREATE TABLE images (
        id serial PRIMARY KEY NOT NULL,
        post_id int REFERENCES posts(id),
        image_1 varchar(255) NOT NULL,
        image_2 varchar(255),
        image_3 varchar(255),
        image_4 varchar(255),
        image_5 varchar(255)
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
