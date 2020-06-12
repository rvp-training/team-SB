<?php session_start(); ?>
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
        <form action="http://localhost/pages/admin/search#users" method="GET">
        <input class="form-text" type="search" name="name" id="name" size="30" maxlength="30" placeholder="氏名を入力" required>
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
            
            // 最大ページ数分リンクを作成
            $max_page = $result['max_page'];
            $page = $result['now'];
            $number = $result['number'];
        ?>
        <ul>
            <?php if ($page > 1): ?>
                <li class="paging"><a href="./users?p=<?php print($page - 1); ?>#users">前へ</a></li>
            <?php else: ?>
                <li class="paging">前へ</li>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $max_page; $i++) : ?>
                <?php if ($i == $page): ?>
                    <li class="paging"><a><?php echo $i; ?></a></li>
                <?php else: ?>
                    <li class="paging"><a href="./users?p=<?php print $i; ?>#users"><?php echo $i ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($page < $max_page): ?>
                <li class="paging"><a href="./users?p=<?php print($page + 1); ?>#users">次へ</a></li>
                <?php else: ?>
                    <li class="paging">次へ</li>
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
                        <?php print htmlspecialchars($result[$key]["name"]);?> 
                    </td>
                    <td>
                        <?php print htmlspecialchars($result[$key]["department"]);?> 
                    </td>
                    <td>
                        <?php print htmlspecialchars($result[$key]["position"]);?> 
                    </td>
                    <td>
                        <?php print htmlspecialchars($result[$key]["mail"]);?> 
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
