<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="login_bg_admin">
        <div id="login_box">
            <form action="http://localhost/login/admin.php" method="POST">
                <label for="mail" class="login_text">メールアドレス</label>
                <p><input class="form-text" type="text" name="mail" maxlength="45" placeholder=
                "<?php if (isset($_POST["mail"])){
                    print $_POST["mail"];
                } else {
                    print "メールアドレスを入力してください";
                }?>"></p>
                <label for="pass" class="login_text">パスワード</label>
                <p><input class="form-text" type="text" name="pass" maxlength="45" placeholder="パスワードを入力してください"></p>
                <p><input id="login_button_admin" type="submit" value="ログイン"></p>
            </form>
            <p>(一般ユーザーの方は<a href="http://localhost/pages/login">こちら</a>)</p>
        </div>
    </div>
</body>
</html>

INSERT INTO users VALUES (5,'aaa','aaa','admin@co.jp','admin',0,1);