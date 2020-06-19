<?php 
try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');

    $sql = "INSERT INTO users (name, department, position, mail, pass, admin_flag, delete_flag)
    VALUES ('kanri','管理部','部長','kanri@gmail.com', 'testtesttest',1,0),
    ('テスト用ユーザー','テスト部','部長','test@gmail.com', 'testtesttest',0,0);";


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