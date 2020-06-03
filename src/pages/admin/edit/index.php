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
            <p class="user-edit-title">ユーザー情報の編集</p>

            <form action="" method="post">
                <?php foreach ((array)$result as $key => $value) : ?>
                <dl>
                    <dt class="register-index-content">氏名</dt>
                    <dd>
                        <input type="text" name="name" size="40" style="height:30px;" maxlength="30" placeholder="氏名を入力してください" value="<?php echo (htmlspecialchars($_GET['name'], ENT_QUOTES)); ?>" />
                        <?php print $result[$key]["name"];?>
                    </dd>

                    <dt class="register-index-content">部署</dt>
                    <dd>
                        <input type="text" name="department" size="40" style="height:30px;" maxlength="15" placeholder="部署を入力してください" value="<?php echo (htmlspecialchars($_GET['department'], ENT_QUOTES)); ?>" />
                        <?php print $result[$key]["department"];?>
                    </dd>

                    <dt class="register-index-content">役職</dt>
                    <dd>
                        <input type="text" name="position" size="40" style="height:30px;" maxlength="15" placeholder="役職を入力してください" value="<?php echo (htmlspecialchars($_GET['position'], ENT_QUOTES)); ?>" />
                        <?php print $result[$key]["position"];?>
                    </dd>

                    <dt class="register-index-content">メールアドレス</dt>
                    <dd>
                        <input type="text" name="mail" size="40" style="height:30px;" maxlength="45" placeholder="メールアドレスを入力してください" value="<?php echo (htmlspecialchars($_GET['mail'], ENT_QUOTES)); ?>" />
                        <?php print $result[$key]["mail"];?>
                    </dd>

                    <dt class="register-index-content">パスワード</dt>
                    <dd>
                        <input type="text" name="pass" size="40" style="height:30px;" maxlength="45" placeholder="パスワードを入力してください" value="<?php echo (htmlspecialchars($_GET['pass'], ENT_QUOTES)); ?>" />
                        <?php print $result[$key]["pass"];?>
                    </dd>
                </dl>
                <?php endforeach; ?>
                <div>
                    <input type="submit" value="更新" style="border:2px solid #EE3B2C;color:#FFF;background-color:#EE3B2C;border-radius:7px;width:100px;height:30px;margin-top:25px;margin-left:21%;" />
                </div>
            </form>  
        </main>
    </body>
</html>





        
        