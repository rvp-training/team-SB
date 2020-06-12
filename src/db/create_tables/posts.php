<?php 
try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');

    $sql = "CREATE TABLE posts (
        id serial UNIQUE PRIMARY KEY NOT NULL,
        user_id int REFERENCES users(id),
        title varchar(255) NOT NULL,
        text varchar(255),
        tag varchar(255),
        image_id int NOT NULL,
        category_id int REFERENCES categories(id) NOT NULL,
        time timestamp NOT NULL
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
