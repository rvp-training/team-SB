<?php session_start(); 
        if(isset($_SESSION['user_id']) && $_SESSION['admin_flag'] === 0){
        } else {
            header('Location: ../login');
            exit;
        } ?>
<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
              <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
              <link href="http://localhost/css/posts.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
    <?php include('../../components/posts/header.php'); ?>
    <?php include('../../components/posts/sidebar.php'); ?>
    <main>
        <!--検索フォーム -->
        <form action="http://localhost/pages/posts/search#<?php echo $_GET['category'] ?>" method="GET">
        <input class="form-text" type="search" id="tag" name="tag" placeholder="タグを入れて検索" required>
        <input type="hidden" name="category" value="<?php echo $_GET['category'] ?>">
        <input type="submit" value="検索">
        </form>

        <?php
            //GET /posts/search/pagination API呼び出し
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "http://web/api/posts/search/pagination?category=".$_GET['category']."&tag=".$_GET['tag']."&p=".$_GET['p']);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            $result = json_decode($response, true);
            curl_close($curl);
        ?>
        <?php 
            // 最大ページ数分リンクを作成
            $max_page = $result['max_page'];
            $page = $result['now'];
            $number = $result['number'];//追加（件数）
        ?>
        <ul>

        <!-- &pの前に&tag=<#?php print $_GET['tag'] ?>を追加 -->
            <?php if ($page > 1): ?>
                <li class="paging"><a href="./search?category=<?php print $_GET['category'] ?>&tag=<?php print $_GET['tag'] ?>&p=<?php print($page - 1); ?>">前へ</a></li>
            <?php else: ?>
                <li class="paging">前へ</li>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $max_page; $i++) : ?>
                <?php if ($i == $page): ?>
                    <li class="paging"><a><?php echo $i ?></a></li>
                <?php else: ?>
                    <li class="paging"><a href="./search?category=<?php print $_GET['category'] ?>&tag=<?php print $_GET['tag'] ?>&p=<?php print $i; ?>"><?php echo $i ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>
　　　　　　<!--次へが押せない $max_Page->$max_pageに変更 -->
            <?php if ($page < $max_page): ?>
                <li class="paging"><a href="./search?category=<?php print $_GET['category'] ?>&tag=<?php print $_GET['tag'] ?>&p=<?php print($page + 1); ?>">次へ</a></li>
            <?php else: ?>
                <li class="paging">次へ</li>
            <?php endif; ?>
        </ul>

        <?php //GET /posts/search API呼び出し
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "http://web/api/posts/search/?category=".$_GET['category']."&tag=".$_GET['tag']."&p=".$_GET['p']);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            $result = json_decode($response, true);
            curl_close($curl);
        ?> 

        <br>
        <!--件数取得が間違っていたので count($result)から$numberに変更 -->
        <a>検索結果は<?php print $number;?>件です</a> 
        <br>
        <div id="thumbnail">
            <?php foreach ( $result as $key => $value ) : ?>
                <div class="item">
                    <img src="../../../images/<?php print $result[$key]['image_1']; ?>" width="220" height="175" alt="image not found">
                    <p class="title"><?php print $result[$key]['title']; ?></p>
                    <p><?php print $result[$key]['tag']; ?></p>
                    <p><?php print $result[$key]['name']; ?></p>
                    <button onclick="location.href='http://localhost/pages/posts/detail?id=<?php $result[$key]['posts.id']; ?>'" class="detail_button">detail</button>
                </div>
            <?php endforeach; ?>        
        </div>
    </main>
</body>
</html>
