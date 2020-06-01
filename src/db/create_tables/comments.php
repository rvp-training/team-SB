<?php 
try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');

    $sql = "CREATE TABLE comments (
        id serial PRIMARY KEY NOT NULL,
        post_id int REFERENCES posts(id),
        user_id int REFERENCES users(id),
        content varchar(255) NOT NULL,
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