<?php
  session_start();
  header("Content-type: text/html; charset=utf-8");
 
  //パラメーター取得
  $mail = $_POST['mail'];
  $pass = $_POST['pass'];

  $data = ["mail" => $mail,
            "pass" => $pass];
 
  //ログイン判定
 
//   //DB接続
//   $db = MDB2::connect(DNS);
//   if (PEAR::isError($db)) {
//     die($db->getMessage());
//   }
  
//   //プレースホルダで SQL 作成
//   $sql = "SELECT * FROM USERS WHERE ID = ? AND IS_USER = 1;";
  
//   //パラメーターの型を指定
//   $stmt = $db->prepare($sql, array('text'));
  
//   //パラメーターを渡して SQL 実行
//   $rs = $stmt->execute(array($id));
 
//   $count = 0;
  
//   while ($row = $rs->fetchRow(MDB2_FETCHMODE_ASSOC)) {
//     $id = $row["id"];
//     $salt = $row["salt"];
//     $db_password = $row["password"];
//     $reset = $row["reset"];
//     $count++;
//    }
 
//   $db->disconnect();
 
//    //ログイン失敗
//    if ($count != 1) {
//     $_SESSION["error_status"] = 1;
//     header("HTTP/1.1 301 Moved Permanently");
//     header("Location: login.php"); 
//     exit();
//    }
 
//    //パスワードリセット対応
//    if ($reset == 1) {
//      $_SESSION["error_status"] = 1;
//     header("HTTP/1.1 301 Moved Permanently");
//     header("Location: password_reset.php");
//     exit();
//    }
 
//   //パスワード生成
//    $hash = strechedPassword($salt, $password);
 
//    if ($hash == $db_password) {
//     //ログイン成功
 
//    //セッション ID の振り直し
//    session_regenerate_id(true);
    
//     //セッションに ID を格納
//     $_SESSION['id'] = $id;
 
//     //CSRF のトークン作成
//     $_SESSION["token"] = get_csrf_token();
 
//     //DB接続
//     $db = MDB2::connect(DNS);
//     if (PEAR::isError($db)) {
//       die($db->getMessage());
//     }
 
//     //プレースホルダで SQL 作成
//     $sql = "UPDATE USERS  SET LAST_LOGIN_TIME = ? WHERE ID = ?";
  
//     //パラメーターの型を指定
//     $stmt = $db->prepare($sql, array('timestamp','text'));
  
//     //パラメーターを渡して SQL 実行
//     $stmt->execute(array(date('Y-m-d H:i:s'), $id));
 
//    $db->disconnect();
 
///login APIを呼び出す
$curl = curl_init();
        //リンクを貼る
        curl_setopt($curl, CURLOPT_URL, "http://web/api/test.php");
        //HTTPメソッドの選択
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        //JSONデコード
        $result = json_decode($response, true);
        curl_close($curl);
        echo $result;
    //リダイレクト
//     header("HTTP/1.1 301 Moved Permanently");
//     header("Location: welcome.php");
//    } else {
 
//     //ログイン失敗
//     $_SESSION["error_status"] = 1;
//     header("HTTP/1.1 301 Moved Permanently");
//     header("Location: login.php"); 
//    }
 
?>
