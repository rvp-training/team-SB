<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
              <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
    <?php include dirname(__FILE__) . '/../../components/posts/header.php'; ?>
    <?php include dirname(__FILE__) . '/../../components/posts/sidebar.php'; ?>
    <main>
        <form action="http://localhost/api/posts/new" method="post" enctype="multipart/form-data">       
            <p>送信ファイル</p>
            <input type="file" name="image[]" multiple = "multiple" required>
            <input type="file" name="image[]" multiple = "multiple" >
            <input type="file" name="image[]" multiple = "multiple" >
            <input type="file" name="image[]" multiple = "multiple" >
            <input type="file" name="image[]" multiple = "multiple" >
                <br>
                <dl>

            <dt>タイトル</dt>
            <dd><input class="form-input" type="text" name="title" maxlength="30" placeholder="タイトルを入力してください" required></input></dd>
            <br>
            <dt>テキスト</dt>
            <dd><input class="form-input" type="text" name="text" maxlength="1000" placeholder="テキストを入力してください"></input></dd>
            <br>
            <dt>タグ</dt>
            <dd><input class="form-input" type="text" name="tag" maxlength="90" placeholder="タグを入力してください"></input></dd>
        </dl>
               <br>
            <input type="radio" name="category_id" value="1" checked>ビジネス</input>
            <input type="radio" name="category_id" value="2">プライベート</input>  
            <br><br>
            <input type="submit" class="post_button" name="upload" value="投稿"></input>
        </form>
    </main>
</body>
</html>