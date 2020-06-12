<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="login_bg">
        <div id="login_box">
        <?php if ( isset( $_SESSION['login_message'] ) ): ?>
        <p class="login_message">&emsp;<?php echo $_SESSION['login_message'];?>&emsp;</p>
        <?php unset( $_SESSION['login_message'] );?>
        <?php endif; ?>
            <form action="http://localhost/login/index.php" method="POST">
                <label for="mail" class="login_text">メールアドレス</label>
                <p><input class="form-text" type="email" name="mail" maxlength="45" placeholder="メールアドレスを入力してください"
                <?php if (isset($_SESSION["mail"])): ?>
                    value="<?php print htmlspecialchars($_SESSION["mail"]); ?>"
                    <?php unset( $_SESSION['mail'] ); ?>
                <?php endif; ?>
                title="メールアドレスは英数字または記号で入力してください" required></p>
                <label for="pass" class="login_text">パスワード</label>
                <p><input class="form-text" type="text" name="pass" minlength="8" maxlength="45" pattern="^[a-zA-Z0-9-_]+$" placeholder="パスワードを入力してください" required></p>   
                <p><input id="login_button" type="submit" value="ログイン"></p>
            </form>
            <p>(管理者の方は<a href="http://localhost/pages/login/admin">こちら</a>)</p>
        </div>
    </div>
</body>
</html>
