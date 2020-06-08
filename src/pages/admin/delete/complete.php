
<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
              <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
              <link href="http://localhost/css/users.css" rel="stylesheet" type="text/css" />
              
</head>
<body>
    <div id="wrapper">
        <?php include dirname(__FILE__) . '/../../../components/admin/header.php'; ?>
        <?php include dirname(__FILE__) . '/../../../components/admin/sidebar.php'; ?>
        <main>
            <?php
                //GET /admin/users/delete API呼び出し
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/users/delete_test?id=".$_GET["id"]);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                $result = json_decode($response, true);
            ?>

            <?php if ($response == "変更完了しました"){
                echo "削除完了しました";
            } else {
                echo "削除に失敗しました";
            }
            ?>
        </main>
    </div>
</body>
</html>
