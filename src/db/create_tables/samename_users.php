<?php 
try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');

    $sql = "INSERT INTO users (name, department, position, mail, pass, admin_flag, delete_flag) 
    VALUES ( '管理者',  '部署', '役職', 'admin@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test1@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test2@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test3@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test4@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test5@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test6@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test7@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test8@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test9@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test10@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test11@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test12@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test13@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test14@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test15@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test16@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test17@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test18@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test19@co.jp', 'password', 0, 0),
    ( '小林侑介',  '部署', '役職', 'test20@co.jp', 'password', 0, 0)
    ;";


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