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
        <form action="http://localhost/api/posts/new" method="post" enctype="multipart/form-data">       
            <p>送信ファイル</p>
            <input type="file" name="image[]" multiple = "multiple" >
            <input type="file" name="image[]" multiple = "multiple" >
            <input type="file" name="image[]" multiple = "multiple" >
            <input type="file" name="image[]" multiple = "multiple" >
            <input type="file" name="image[]" multiple = "multiple" >
            <br>
            <p>タイトル</p>
            <input class="form-input" type="text" name="title" placeholder="タイトルを入力してください"></input>
            <br>
            <p>テキスト</p>
            <input class="form-input" type="text" name="text" placeholder="テキストを入力してください"></input>
            <br>
            <p>タグ</p>
            <input class="form-input" type="text" name="tag" placeholder="タグを入力してください"></input>
            <br><br>
            <input type="radio" name="category_id" value="1" checked>ビジネス</input>
            <input type="radio" name="category_id" value="2">プライベート</input>  
            <br><br>
            <input type="submit" name="upload" value="投稿"></input>
        </form>
    </main>
</body>
</html>