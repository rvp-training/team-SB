
<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
              <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
              <link href="http://localhost/css/users.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
    <div id="wrapper">
        <?php include('../../../components/admin/header.php'); ?>
        <?php include('../../../components/admin/sidebar.php'); ?>
        <main>
            
            <?php
                //GET /admin/users/delete API呼び出し
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/users/delete?id=".$_GET);
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
            <tr>
                <td>
                    <?php print $result["name"];?> 
                </td>
                <td>
                    <?php print $result["department"];?> 
                </td>
                <td>
                    <?php print $result["position"];?> 
                </td>
                <td>
                    <?php print $result["mail"];?> 
                </td>
            </tr>

            <div style="text-align:center;">
                <button onclick=
                "<?php
                //PUT /admin/users/delete API呼び出し
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL,'http://web/api/admin/users/delete?id='.$_GET);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                //curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($_GET));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                if($response){
                    //削除処理に成功した場合
                    "ページ遷移";
                } else {
                    //失敗した場合にメッセージを出す
                    "エラーメッセージをだす";
                }
                curl_close($curl);
                ?> " 
                class="delete_button">削除</button>
            </div>            



        </main>
    </div>
</body>
</html>
