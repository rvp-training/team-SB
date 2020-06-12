<?php session_start();

header('Content-Type: text/json; charset=UTF-8');
//DBと接続
try {
    $dbh = new PDO('pgsql:dbname=postgres;host=db', 'postgres', 'password');
} catch (PDOException $e) {
    echo 'DB接続エラー; ' . $e->getMessage();
}

//メールアドレスの方が適正かどうか確認
 if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['login_message'] = '正しいメールアドレスを入力してください';
    header('Location: ../pages/login');
  }

//DB内でPOSTされたメールアドレスを検索

  $stmt = $dbh->prepare('SELECT * from users WHERE delete_flag = 0 AND admin_flag = 0 AND mail = ?');
  $stmt->execute([$_POST['mail']]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);


//emailがDB内に存在しているか確認
if (!isset($row['mail'])) {
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['login_message'] = 'メールアドレス又はパスワードが間違っています。';
    header('Location: ../pages/login');
}


//パスワード確認後sessionにメールアドレスを渡す
if ($_POST['pass'] == $row['pass']) {
    session_regenerate_id(true); //session_idを新しく生成し、置き換える
    $_SESSION['user_id'] = $row['id'];
    header('Location: ../pages/posts/?category=1#1');

} else {
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['login_message'] = 'メールアドレス又はパスワードが間違っています。';
    header('Location: ../pages/login');
}
?>