
<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
         <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />     
         <link href="http://localhost/css/users.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
    <?php include('../../components/admin/header.php'); ?>
    <?php include('../../components/admin/sidebar.php'); ?>
    <main>
        
        <!--検索フォーム -->
        <form action="http:/localhost/pages/admin/search/" method="GET">
        <input class="form-text" type="search" placeholder="氏名を入力">
        <input type="submit" value="検索">
        </form>
        
        <?php
                //GET /users API呼び出し
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "http://web/api/test.php");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                $result = json_decode($response, true);
                
        ?>

    
        <!--一覧表 -->
        <table>
            <tr>
                <th>氏名</th>
                <th>部署</th>
                <th>役職</th>
                <th>メールアドレス</th>
                <th><transparent>&nbsp;</transparent></th>
                <th><transparent>&nbsp;</transparent></th>
            </tr>
            <tr>
            
            <!--
            <?php foreach ($result as $id) : ?>
                <td>
                    <content>
                        <?php print $result[$id]["name"];?> 
                    </content>
                </td>
                <td>
                    <?php print $result[$id]["department"];?> 
                </td>
                <td>
                    <?php print $result[$id]["position"];?> 
                </td>
                <td>
                    <?php print $result[$id]["mail"];?> 
                </td>
                <td>
                    <button onclick="location.href='http://localhost/pages/admin/edit?id=<?php $id ?>/'" class="edit_button"></button>
                </td>
                <td>
                    <button onclick="location.href='http://localhost/pages/admin/delete?id=<?php $id ?>/confirm/'" class="delete_button"></button>
                </td>
            <?php endforeach; ?>
            -->

            <td><content>山田太郎</content></td>
            <td><content>人事部</content></td>
            <td><content>部長</content></td>
            <td><content>hogehoge.com</content></td>
            <td><button onclick="location.href='http://localhost/pages/'" class="edit_button">編集</button></td>
            <td><button class="delete_button">削除</button></td>

            </tr>
        </table>

        <?php
                curl_close($curl);
        ?>
    </main>
</body>
</html>
