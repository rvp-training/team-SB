<?php  //初期化
        $curl = curl_init();
        //リンクを貼る
        curl_setopt($curl, CURLOPT_URL, "http://web/api/test.php");
        //HTTPメソッドの選択
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $_POST["mail"]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        //JSONデコード
        $result = json_decode($response, true);
        
        //curl閉じる
       
        if($result == "a"){
    header("location: http://localhost/pages/posts/");
    exit;
} elseif ($result == "b") {
    header("location:http://localhost/pages/admin/");
    exit;
} else {
    header("location:http://localhost/pages/login");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
             
</head>
<body>
   
        <?php
            $params = $_POST["mail"];
        //初期化
        $curl = curl_init();
        //リンクを貼る
        curl_setopt($curl, CURLOPT_URL, "http://web/api/test.php");
        //HTTPメソッドの選択
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        //JSONデコード
        $result = json_decode($response, true);
        var_dump($result);
        //curl閉じる
        curl_close($curl);
        /*$params = [
            "mail" => $_POST["mail"],
            "pass" => $_POST["pass"]
        ];
        //初期化
        $curl = curl_init();
        //リンクを貼る
        curl_setopt($curl, CURLOPT_URL, "http://web/api/login.php");
        //HTTPメソッドの選択
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        //JSONデコード
        $result = json_decode($response, true);
        if ($result == "一般ユーザー"){

        } elseif () {

        }
        //curl閉じる
        curl_close($curl);*/
        ?>

</body>
</html>
