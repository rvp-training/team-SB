<?php
    // セッションを作成。 もしくは、リクエスト上で GET, POST またはクッキーにより渡されたセッション ID に基づき現在のセッションを復帰
    session_start();

    // 書き直し
    if ($_REQUEST['action'] == 'rewrite'){
        $_GET = $_SESSION['edit'];
        $error['rewrite'] = true;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/css/users.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php include('../../../components/admin/header.php'); ?>
        <?php include('../../../components/admin/sidebar.php'); ?>
        <main>
            <?php
                //GET /admin/users/edit API呼び出し
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/users/edit_screen_test?id=".$_GET["id"]);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                $result = json_decode($response, true);
            ?>
            <p class="user-edit-title">ユーザー情報の編集</p>

            <form action="confirm.php" method="post">
                <dl>
                    <dt class="user-edit-content">氏名</dt>
                    <dd>
                        <input type="text" name="name" size="40" style="height:30px;" maxlength="30" placeholder="氏名を入力してください" value="<?php echo (htmlspecialchars($result[0]['name'], ENT_QUOTES)); ?>" />
                    </dd>

                    <dt class="user-edit-content">部署</dt>
                    <dd>
                        <input type="text" name="department" size="40" style="height:30px;" maxlength="15" placeholder="部署を入力してください" value="<?php echo (htmlspecialchars($result[0]['department'], ENT_QUOTES)); ?>" />
                    </dd>

                    <dt class="user-edit-content">役職</dt>
                    <dd>
                        <input type="text" name="position" size="40" style="height:30px;" maxlength="15" placeholder="役職を入力してください" value="<?php echo (htmlspecialchars($result[0]['position'], ENT_QUOTES)); ?>" />
                    </dd>

                    <dt class="user-edit-content">メールアドレス</dt>
                    <dd>
                        <input type="text" name="mail" size="40" style="height:30px;" maxlength="45" placeholder="メールアドレスを入力してください" value="<?php echo (htmlspecialchars($result[0]['mail'], ENT_QUOTES)); ?>" />
                    </dd>

                    <dt class="user-edit-content">パスワード</dt>
                    <dd>
                        <input type="text" name="pass" size="40" style="height:30px;" maxlength="45" placeholder="パスワードを入力してください" value="<?php echo (htmlspecialchars($result[0]['pass'], ENT_QUOTES)); ?>" />
                    </dd>
                </dl>
                <div>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                    <input type="submit" value="更新" style="border:2px solid #EE3B2C;color:#FFF;background-color:#EE3B2C;border-radius:7px;width:100px;height:30px;margin-top:25px;margin-left:21%;" />
                </div>
            </form>  
        </main>
    </body>
</html>


        
        