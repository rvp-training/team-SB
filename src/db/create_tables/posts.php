<?php 
try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');

    $sql = "CREATE TABLE posts (
        id serial NOT NULL,
        user_id int REFERENCES users(id) NOT NULL,
        title varchar(255) NOT NULL,
        text varchar(255),
        tag varchar(255),
        image_id varchar(255),
        category_id int REFERENCES categories(id),
        time timestamp NOT NULL,
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
