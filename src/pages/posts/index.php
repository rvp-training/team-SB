<?php 

    ?>
<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
              <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
              <link href="http://localhost/css/posts.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
    <?php include dirname(__FILE__) . '/../../components/posts/header.php'; ?>
    <?php include dirname(__FILE__) . '/../../components/posts/sidebar.php'; ?>
    <main>
        <!--検索フォーム -->
        <form action="http://localhost/pages/posts/search.php" method="GET">
        <input class="form-text" type="search" id="tag" name="tag" placeholder="タグを入れて検索" required>
        <input type="hidden" name="category" value="<?php echo $_GET['category'] ?>">
        <input type="submit" value="検索">
        </form>

        <?php
                //GET /posts API呼び出し
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "http://web/api/posts/category/?category=".$_GET['category']);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                $result = json_decode($response, true);
                
        ?>

        
        <br>
        <div id="thumbnail">
            <?php foreach ( $result as $key => $value ) : ?>
                <div class="item">
                    <img src="../../../images/<?php print $result[$key]['image_1']; ?>" width="220" height="175" alt="image not found">
                    <p class="title"><?php print $result[$key]['title']; ?></p>
                    <p><?php print $result[$key]['tag']; ?></p>
                    <p><?php print $result[$key]['name']; ?></p>
                    <button onclick="location.href='http://localhost/pages/posts/detail?id=<?php print $result[$key]['id']; ?>'" class="detail_button">detail</button>
                </div>
            <?php endforeach; ?>        
        </div>
    </main>
</body>
</html>
