<?php session_start(); ?>
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

        <!-- ページネーション -->
        <?php 
            $page = $_REQUEST['page'];
                if ($page = ''){
                    $page = 1;
                }
            
            $page = max($page, 1);

            // 最終ページを取得する
            $counts = $db->query('SELECT COUNT(*) AS cnt FROM posts');
            $cnt = $counts->fetch();
            $maxPage = ceil($cnt[''] / 5);
            $page = min($page, $maxPage);

            $start = ($page - 1) * 5;

            // $posts = $db->prepare('SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id ORDER BY p.created DESC LIMIT ?, 5');
            $posts->bindparam(1, $start, PDO::PARAM_INT);
            $posts->execute();
        ?>

        <ul class="paging">
            <?php
                if ($page > 1){
            ?>
            <li><a href="index.php?page=<?php print($page - 1); ?>">前のページへ</a></li>
            <?php
                }else{
            ?>
            <li>前のページへ</li>
            <?php
                }
            ?>
            <?php
                if ($page < $maxPage){
            ?>
            <li><a href="index.php?page=>\<?php print($page + 1); ?>">次のページへ</a></li>
            <?php
                }else{
            ?>
            <li>次のページへ</li>
            <?php
                }
            ?>
        </ul>
        
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
