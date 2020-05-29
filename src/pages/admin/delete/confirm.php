
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
                curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/users/delete.php");
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



        </main>
    </div>
</body>
</html>
