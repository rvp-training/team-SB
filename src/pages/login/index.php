<?php
    session_start();

    if (!empty($_POST)){
        // エラーの確認項目
        // if ($_POST['name'] === ''){
        //     $error['name'] = 'blank';
        // }
        if (strlen($_POST['pass']) < 8){
            $error['pass'] = 'length';
        }
        if ($_POST['pass'] === ''){
            $error['pass'] = 'blank';
        }
    }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="login_bg">
        <div id="login_box">
            <form action="http://localhost/pages/login/check" method="POST">
                <label for="mail" class="login_text">メールアドレス</label>
                <p><input class="form-text" type="text" name="mail" maxlength="45" placeholder=
                "<?php if (isset($_POST["mail"])){
                    print $_POST["mail"];
                } else {
                    print "メールアドレスを入力してください";
                }?>"></p>

                <label for="pass" class="login_text">パスワード</label>
                <p><input class="form-text" type="text" name="pass" maxlength="45" placeholder="パスワードを入力してください"></p>

                <?php if ($error['pass'] === 'blank'): ?>
                    <p class="error-message">* 必須項目です</p>
                <?php endif; ?>
                <?php if ($error['pass'] === 'length'): ?>
                    <p class="error-message">* パスワードは8文字以上の英数字または記号で入力してください</p>
                <?php endif; ?>

                <p><input id="login_button" type="submit" value="ログイン"></p>
            </form>
            <p>(管理者の方は<a href="http://localhost/pages/login/admin">こちら</a>)</p>
        </div>
    </div>
</body>
</html>
