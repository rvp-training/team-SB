<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="login_bg">
        <div id="login_box">
            <form action="http://localhost/pages/redirect" method="POST">
                <p class="login_text">メールアドレス</p>
                <p><input class="form-text" type="text" name="mail" placeholder=
                <?php if (isset($_POST["mail"])){
                    print $_POST["mail"];
                }else{
                    print "メールアドレスを入力してください";
                }?>></p>
                <p class="login_text">パスワード</p>
                <p><input class="form-text" type="text" name="pass" placeholder="パスワードを入力してください"></p>
                <p><input id="login_button"　type="submit" value="ログイン"></p>
            </form>
        </div>
    </div>
</body>
</html>
