<?php session_start(); ?>
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
            <div>
                <p class="register-index-title">ユーザーの新規登録</p>

                <!-- multipart: フォームにファイルを送信する機能がある場合に指定する -->
                <form action="http://localhost/pages/admin/register/confirm.php" method="post" enctype="multipart/form-data">
                    <dl>
                        <dt class="register-index-content">氏名</dt>
                        <dd>
                            <input type="text" class="user-input" name="name"  maxlength="30" placeholder="氏名を入力してください" value="<?php echo (htmlspecialchars($_POST['name'], ENT_QUOTES)); ?>" required/>
                        </dd>

                        <dt class="register-index-content">部署</dt>
                        <dd>
                            <input type="text" class="user-input"  name="department" maxlength="15" placeholder="部署を入力してください" value="<?php echo (htmlspecialchars($_POST['department'], ENT_QUOTES)); ?>" required/>
                        </dd>

                        <dt class="register-index-content">役職</dt>
                        <dd>
                            <input type="text" class="user-input" name="position"  maxlength="15" placeholder="役職を入力してください" value="<?php echo (htmlspecialchars($_POST['position'], ENT_QUOTES)); ?>" required/>
                    </dd>

                        <dt class="register-index-content">メールアドレス</dt>
                        <dd>
                            <input type="email" id="mail" class="user-input"  name="mail" maxlength="45" placeholder="メールアドレスを入力してください" value="<?php echo (htmlspecialchars($_POST['mail'], ENT_QUOTES)); ?>" title="メールアドレスは英数字または記号で入力してください" required/>
                            </dd>

                        <dt class="register-index-content">パスワード</dt>
                        <dd>
                            <input type="text" id="pass" class="user-input" name="pass" minlength="8" maxlength="45" placeholder="パスワードを入力してください" value="<?php echo (htmlspecialchars($_POST['pass'], ENT_QUOTES)); ?>" pattern="^[a-zA-Z0-9-_]+$" title="パスワードは8文字以上の英数字または記号で入力してください"required/>
                            
                        </dd>
                    </dl>
                    <input type="hidden" name="redirect" value="admin/register/confirm.php"/>
                    <input type="submit" class="button" value="登録"  style="margin-left:130px;"/>
                </form>  
            </div>
        </main>
    </body>
</html>
