<?php
header('Content-Type: text/json; charset=UTF-8');


//DBと接続
try{
    $dbh = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
     } catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}

session_start();

//var_dump($_POST['mail']);

//メールアドレスの方が適正かどうか確認
if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
  echo '入力された値が不正です。';
  return false;
}

//DB内でPOSTされたメールアドレスを検索

  $stmt = $dbh->prepare('SELECT * from users WHERE delete_flag = 0 AND admin_flag = 1 AND mail = ?');
  $stmt->execute([$_POST['mail']]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);


//emailがDB内に存在しているか確認
if (!isset($row['mail'])) {
  echo 'メールアドレス又はパスワードが間違っています。';
  return false;

}


//パスワード確認後sessionにメールアドレスを渡す
if ($_POST['pass'] == $row['pass']) {
  session_regenerate_id(true); //session_idを新しく生成し、置き換える
  
  $_SESSION['user_id'] = $row['id'];

  header('Location: http://localhost/pages/admin#top');

} else {
  header('Location: http://localhost/pages/login/admin');
  echo  'メールアドレス又はパスワードが間違っています。';
}
?>