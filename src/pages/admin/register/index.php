<?php
    // セッションを作成。 もしくは、リクエスト上で GET, POST またはクッキーにより渡されたセッション ID に基づき現在のセッションを復帰
    session_start();
    
    // 書き直し
    if ($_REQUEST['action'] == 'rewrite'){
        $_POST = $_SESSION['register'];
        $error['rewrite'] = true;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
        <link href="http://localhost/css/register.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="http://localhost/js/validate.js" ></script> 
    </head>
    <body>
        <?php include('../../../components/admin/header.php'); ?>
        <?php include('../../../components/admin/sidebar.php'); ?>
        <main>
        <p class="register-index-title">ユーザーの新規登録</p>

            <form action="http://localhost/pages/admin/register/confirm.php" method="post" id="userNewForm">
                <dl>
                    <dt class="register-index-content">氏名</dt>
                    <dd>
                        <input type="text" name="name" id="name" size="40" style="height:30px;" placeholder="氏名を入力してください" value="<?php echo (htmlspecialchars($_POST['name'], ENT_QUOTES)); ?>" required />
                        
                    </dd>

                    <dt class="register-index-content">部署</dt>
                    <dd>
                        <input type="text" name="department" id="department" size="40" style="height:30px;" placeholder="部署を入力してください" value="<?php echo (htmlspecialchars($_POST['department'], ENT_QUOTES)); ?>" required />
                        
                    </dd>

                    <dt class="register-index-content">役職</dt>
                    <dd>
                        <input type="text" name="position" id="position" size="40" style="height:30px;" placeholder="役職を入力してください" value="<?php echo (htmlspecialchars($_POST['position'], ENT_QUOTES)); ?>" required />
                        
                    </dd>

                    <dt class="register-index-content">メールアドレス</dt>
                    <dd>
                        <input type="text" name="mail" id="mail" size="40" style="height:30px;" placeholder="メールアドレスを入力してください" value="<?php echo (htmlspecialchars($_POST['mail'], ENT_QUOTES)); ?>" required />
                        
                    </dd>

                    <dt class="register-index-content">パスワード</dt>
                    <dd>
                        <input type="text" name="pass" id="pass" size="40" style="height:30px;" placeholder="パスワードを入力してください" value="<?php echo (htmlspecialchars($_POST['pass'], ENT_QUOTES)); ?>" required />
                        
                    </dd>
                </dl>
                <div>
                    <input type="submit" value="登録" style="border:2px solid #EE3B2C;color:#FFF;background-color:#EE3B2C;border-radius:7px;width:100px;height:30px;margin-top:25px;margin-left:130px;" />
                    <input type="hidden" name="redirect" value="admin/register/confirm.php"/>
                </div>
            </form> 
            <!-- <script type="text/javascript" src="js/jquery.validate.js" ></script> -->
        </main>
    </body>
</html>
