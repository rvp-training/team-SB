<?php
session_start();
if(isset($_SESSION['user_id']) && $_SESSION['admin_flag']===1){

}else{
    header('Location: ../login');
          exit;
        }
        ?>
<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
              <link href="../../css/system.css" rel="stylesheet" type="text/css" />
              <link href="../../css/users.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
    <?php include('../../components/admin/header.php'); ?>
    <?php include('../../components/admin/sidebar.php'); ?>
    <main>
        
        <!--検索フォーム -->
        <form action="../../pages/admin/search#users" method="GET">
        <input class="form-text" type="search" size="30" id="name" name="name" maxlength="30" placeholder=
        "<?php if (isset($_GET["name"])){
            print htmlspecialchars($_GET["name"]);
        }else{
            print "氏名を入力";
        }?>" required>
        <input type="submit" value="検索">
        </form>
        <?php
            //GET /admin/users/search/pagination API呼び出し
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/users/search/pagination?name=".$_GET['name']."&p=".$_GET['p']);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            $result = json_decode($response, true);
            curl_close($curl);
        ?>
        <?php 
            // 最大ページ数分リンクを作成
            $max_page = $result['max_page'];
            $page = $result['now'];
            $number = $result['number'];
        ?>
        <ul>
            <?php if ($page > 1): ?>
                <li class="paging"><a href="./search?name=<?php print $_GET['name'] ?>&p=<?php print($page - 1); ?>#users">前へ</a></li>
            <?php else: ?>
                <li class="paging">前へ</li>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $max_page; $i++) : ?>
                <?php if ($i == $page): ?>
                    <li class="paging"><a><?php echo $i ?></a></li>
                <?php else: ?>
                    <li class="paging"><a href="./search?name=<?php print $_GET['name'] ?>&p=<?php print $i; ?>#users"><?php echo $i ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($page < $max_page): ?>
                <li class="paging"><a href="./search?name=<?php print $_GET['name'] ?>&p=<?php print($page + 1); ?>#users">次へ</a></li>
            <?php else: ?>
                <li class="paging">次へ</li>
            <?php endif; ?>
        </ul>
        <?php
                //GET /admin/users/search API呼び出し
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/users/search/index?name=".$_GET['name']."&p=".$_GET['p']);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                $result = json_decode($response, true);
        ?>
        <br>
        <a>検索結果は<?php print $number;?>件です</a>
        <br>
       <!-- 検索結果出力テーブル　-->
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
                        <button onclick="location.href='./edit?id=<?php print $result[$key]['id'] ?>'" class="edit_button">編集</button>
                    </td>
                    <td>
                        <button onclick="location.href='./delete/confirm?id=<?php print $result[$key]['id'] ?>'" class="delete_button">削除</button>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
        <?php curl_close($curl); ?>

    </main>
</body>
</html>
