
<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
              <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
              <link href="http://localhost/css/users.css" rel="stylesheet" type="text/css" />
              <script type="text/javascript" src="http://localhost/js/delete.js"></script>
     
</head>
<body>
    <div id="wrapper">
        <?php include('../../../components/admin/header.php'); ?>
        <?php include('../../../components/admin/sidebar.php'); ?>
        <main>
            
            <?php
                //GET /admin/users/delete API呼び出し
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/users/delete_screen_test?id=".$_GET["id"]);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                $result = json_decode($response, true);
            ?>
            
            <H3>このユーザーを削除して本当によろしいですか</H3>
            <table>
                <tr>
                    <th>氏名</th>
                    <th>部署</th>
                    <th>役職</th>
                    <th>メールアドレス</th>
                </tr>
                <?php foreach ($result as $key => $value) : ?>
                <tr>
                    <td>
                        <?php print $result[$key]["name"];?> 
                    </td>
                    <td>
                        <?php print $result[$key]["department"];?> 
                    </td>
                    <td>
                        <?php print $result[$key]["position"];?> 
                    </td>
                    <td>
                        <?php print $result[$key]["mail"];?> 
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
            <?php curl_close($curl); ?>
            <br>
            <div class="center">
                <button onclick="location.href='http://localhost/pages/admin/delete/complete?id=<?php print $_GET["id"] ?>'"
                class="delete_button">削除</button>
            </div>            

        </main>
    </div>
</body>
</html>
