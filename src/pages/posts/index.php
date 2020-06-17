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
    <?php if ( isset( $_SESSION['posts_message'] ) ): ?>
        <p class="posts_message">&emsp;<?php echo $_SESSION['posts_message'];?>&emsp;</p>
        <?php unset( $_SESSION['posts_message'] );?>
    <?php endif; ?>
        <!--検索フォーム -->
        <form action="http://localhost/pages/posts/search#<?php echo $_GET['category'] ?>" method="GET">
        <input class="form-text" type="search" id="tag" name="tag" placeholder="タグを入れて検索" maxlength="90" required>
        <input type="hidden" name="category" value="<?php echo $_GET['category'] ?>">
        <input type="submit" value="検索">
        </form>

            <?php
                //GET /posts/category/pagination API呼び出し
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "http://web/api/posts/category/pagination?category=".$_GET['category']."&p=".$_GET['p']);
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
            <ul>
                <?php if ($page > 1): ?>
                    <li class="paging"><a href="./?category=<?php print $_GET['category'] ?>&p=<?php print($page - 1); ?>#<?php print $_GET['category'] ?>">前へ</a></li>
                <?php else: ?>
                    <li class="paging">前へ</li>
                <?php endif; ?>
                
                <?php for ($i = 1; $i <= $max_page; $i++) : ?>
                    <?php if ($i == $page): ?>
                        <li class="paging"><a><?php echo $i ?></a></li>
                    <?php else: ?>
                        <li class="paging"><a href="./?category=<?php print $_GET['category'] ?>&p=<?php print $i; ?>#<?php echo $_GET['category'] ?>"><?php echo $i ?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($page < $max_page): ?>
                    <li class="paging"><a href="./?category=<?php print $_GET['category'] ?>&p=<?php print($page + 1); ?>">次へ</a></li>
                <?php else: ?>
                    <li class="paging">次へ</li>
                <?php endif; ?>
            </ul>
            <?php
                //GET /posts API呼び出し
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "http://web/api/posts/category/?category=".$_GET['category']."&p=".$_GET['p']);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                $result = json_decode($response, true);
                curl_close($curl);
            ?>
            <br>
            <div id="thumbnail">
                <?php foreach ((array)$result as $key => $value ) : ?>
                    <div class="item">
                        <img src="../../../images/<?php print $result[$key]['image_1']; ?>" width="220" height="175" alt="image not found">
                        <?php if(mb_strlen($result[$key]['title']) > 15): ?>
                            <p class="title"><?php print mb_substr(htmlspecialchars($result[$key]['title']),0,15); ?>...</p>           
                        <?php else: ?>
                            <p class="title"><?php print htmlspecialchars($result[$key]['title']); ?></p>
                        <?php endif; ?>
                        <?php if(mb_strlen($result[$key]['tag']) > 15): ?>
                            <p class="title"><?php print mb_substr(htmlspecialchars($result[$key]['tag']),0,15); ?>...</p>           
                        <?php else: ?>
                            <p class="title"><?php print htmlspecialchars($result[$key]['tag']); ?></p>
                        <?php endif; ?>
                        <?php if(mb_strlen($result[$key]['name']) > 15): ?>
                            <p class="title"><?php print mb_substr(htmlspecialchars($result[$key]['name']),0,15); ?>...</p>           
                        <?php else: ?>
                            <p class="title"><?php print htmlspecialchars($result[$key]['name']); ?></p>
                        <?php endif; ?>
                        <button onclick="location.href='http://localhost/pages/posts/detail?id=<?php print $result[$key]['id']; ?>'" class="detail_button">detail</button>
                    </div>
                <?php endforeach; ?>  
            </div>
        </main>
    </body>
</html>
