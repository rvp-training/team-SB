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
        <form action="http://localhost/pages/admin/search.php" method="GET">
        <input class="form-text" type="search" name="name" id="name" maxlength="30" placeholder="氏名を入力" required>
        <input type="submit" value="検索">
        </form>
        <?php
                //GET /admin/users/pagination API呼び出し
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/users/pagination?p=".$_GET['p']);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                $result = json_decode($response, true);
                curl_close($curl);
            ?>
            <?php 
                // 最大ページ数分リンクを作成
                $max_page = $result['max_page'];
                $page = $result['now'];
            ?>
            <ul id="paging">
                <?php if ($page > 1): ?>
                    <li><a href="./users?p=<?php print($page - 1); ?>">前へ</a></li>
                <?php else: ?>
                    <li>前へ</li>
                <?php endif; ?>
                
                <?php for ($i = 1; $i <= $max_page; $i++) : ?>
                    <?php if ($i == $page): ?>
                        <li><a><?php echo $i; ?></a></li>
                    <?php else: ?>
                        <li><a href="./users?p=<?php print $i; ?>"><?php echo $i ?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($page < $max_Page): ?>
                    <li><a href="./users?p=<?php print($page + 1); ?>">次へ</a></li>
                    <?php else: ?>
                    <li>次へ</li>
                <?php endif; ?>
            </ul>
        <?php
                //GET /users API呼び出し
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/users/index?p=".$_GET['p']);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                $result = json_decode($response, true);
        ?>
        <!--一覧表 -->
        <br>
        <table>
            <tr>
                <th>氏名</th>
                <th>部署</th>
                <th>役職</th>
                <th>メールアドレス</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
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
                    <td>
                        <button onclick="location.href='http://localhost/pages/admin/edit?id=<?php print $result[$key]['id'] ?>'" class="edit_button">編集</button>
                    </td>
                    <td>
                        <button onclick="location.href='http://localhost/pages/admin/delete/confirm?id=<?php print $result[$key]['id'] ?>'" class="delete_button">削除</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php curl_close($curl); ?>
    </main>
</body>
</html>
