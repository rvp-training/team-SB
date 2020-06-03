<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
              <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
    <?php include('../../components/posts/header.php'); ?>
    <?php include('../../components/posts/sidebar.php'); ?>
    <main>

    <form action="ファイル処理CGIのURI"
         method="post" enctype="multipart/form-data">
  
                
        <p>送信ファイル</p>
        <input type="file" name="submitfile" />
        <br>
        <p>タイトル</p>
        <input class="form-input" type="text" name="title" placeholder="タイトルを入力してください"></input>
        <br>
        <p>テキスト</p>
        <input class="form-input" type="text" name="text" placeholder="テキストを入力してください"></input>
        <br>
        <p>タグ</p>
        <input class="form-input" type="text" name="tag" placeholder="タグを入力してください"></input>
            
        <input type="submit" value="投稿"></input>
    </form>
    </main>
</body>
</html>