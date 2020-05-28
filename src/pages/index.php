<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
              <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />

</head>
<body>
    <?php include('../components/posts/header.php'); ?>
    <?php include('../components/posts/sidebar.php'); ?>
    <main>
        <h1>test用のページです</h1>
    <a href="http://localhost/pages/login">ログイン</a>
    <p>
        <?php
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "http://web/api/test.php");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            $result = json_decode($response, true);
            var_dump($result);
            print  $result[0]["name"];
            curl_close($curl);
        ?>

        <?php
        //API呼ぶテンプレート
        /*
        //初期化
        $curl = curl_init();
        //リンクを貼る
        curl_setopt($curl, CURLOPT_URL, "http://web/api/test.php");
        //HTTPメソッドの選択
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        //JSONデコード
        $result = json_decode($response, true);
        var_dump($result);
        //curl閉じる
        curl_close($curl);
        */
        ?>

    </p>
    </main>
</body>
</html>
