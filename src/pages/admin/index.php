
<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
              <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
              <link href="http://localhost/css/admin.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
    <?php include dirname(__FILE__) . '/../../components/admin/header.php'; ?>
    <?php include dirname(__FILE__) . '/../../components/admin/sidebar.php'; ?>
    <main>
        <div id="container">
            <div id="itemA"><button onclick="location.href='http://localhost/pages/admin/users'" class="menu">ユーザー一覧</button></div>
            <div id="itemB"><a class="text">ユーザー情報を確認・編集・削除します</a></div>
            <div id="itemC"><button onclick="location.href='http://localhost/pages/admin/register'" class="menu">新規登録</button></div>
            <div id="itemD"><a class="text">新規ユーザー情報を登録します</a></div>
        </div>
    </main>
</body>
</html>
