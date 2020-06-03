<?php
 session_start();
///logout APIを呼び出す
    $curl = curl_init();
    //リンクを貼る
    curl_setopt($curl, CURLOPT_URL, "http://web/logout/index.php");
    //HTTPメソッドの選択
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    //JSONデコード
    $result = json_decode($response, true);
    curl_close($curl);
    //var_dump($result);
    //リダイレクト
    if($result="ログアウト処理完了"){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location:login");
   } else {
    echo "失敗";
    //ログアウト失敗
    // $_SESSION["error_status"] = 1;
    // header("HTTP/1.1 301 Moved Permanently");
    // header("Location: login.php"); 
   }
   
 
?>
