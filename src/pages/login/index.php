<?php
    // session_start();
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
        <form action="http://localhost/login/index.php" method="POST">
                <label for="mail" class="login_text">メールアドレス</label>
                <p><input class="form-text" type="email" name="mail" maxlength="45" placeholder=
                "<?php if (isset($_POST["mail"])){
                    print $_POST["mail"];
                } else {
                    print "メールアドレスを入力してください";
                }?>" title="メールアドレスは英数字または記号で入力してください" required></p>
                <label for="pass" class="login_text">パスワード</label>
                <p><input class="form-text" type="text" name="pass" minlength="8" maxlength="45" pattern="^[a-zA-Z0-9-_]+$" placeholder="パスワードを入力してください"></p>
                <p><input id="login_button" type="submit" value="ログイン"></p>
            </form>
            <p>(管理者の方は<a href="http://localhost/pages/login/admin">こちら</a>)</p>
        </div>
    </div>
</body>
</html>
