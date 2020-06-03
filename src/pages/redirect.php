<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
             
</head>
<body>
    <main>
        <?php
        $params = [
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
        var_dump($result);
        //curl閉じる
        curl_close($curl);
        ?>
    </main>
</body>
</html>
