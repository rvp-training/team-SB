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
        <form action="http:/localhost/pages/posts/search/" method="GET">
        <input class="form-text" type="search" id="tag" name="tag" placeholder="タグを入れて検索">
        <input type="submit" value="検索">
        </form>

        <!--ページネーションを入れる -->
        <br>
        <div class=thumbnail>
            <img src="" width="220" height="175" alt="image not found">
            <h6>Title</h6>
            <p>tag</p>
            <p>投稿者名</p>
        </div>
    </main>
</body>
</html>