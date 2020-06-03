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
        <form action="http://localhost/pages/posts/search" method="GET">
        <input class="form-text" type="search" id="tag" name="tag" placeholder="タグを入れて検索">
        <input type="submit" value="検索">
        </form>

        <?php
                //GET /posts/search API呼び出し
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "http://web/api/posts/search?category=".$_GET["category"]."&tag=".$_GET["tag"]);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                $result = json_decode($response, true);
                
        ?>

        <!--ページネーションを入れる -->
        <br>
        <div id="thumbnail">
            <div class="item">
                <img src="../../images/laptop.jpg" alt="image not found">
                <p class="title">title</p>
                <p>tag</p>
                <p>name</p>
                <button onclick="location.href='http://localhost/pages/posts/detail?id=<?php $result[$key]['id']; ?>'" class="detail_button">detail</button>
            </div>
                 
            <!--
            <?php foreach ( $result as $key => $value ) : ?>
            <div class="item">
                <img src="<?php print $result[$key]['image']; ?>" alt="image not found">
                <p><?php print $result[$key]['title']; ?></p>
                <p><?php print $result[$key]['tag']; ?></p>
                <p><?php print $result[$key]['name']; ?></p>
                <button onclick="location.href='http://localhost/pages/posts/detail?id=<?php $result[$key]['id']; ?>'" class="detail_button">detail</button>
            </div>
            <?php endforeach; ?>
            -->
        </div>
    </main>
</body>
</html>