<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <p>ユーザーの新規登録</p>
    <form action="" method="post" enctype="multipart/form-data">
        <dl>
            <dt>名前<span class="required">必須</span></dt>
            <dd><input type="text" name="name" size="35" maxlength="255" /></dd>

            <dt>部署<span class="required">必須</span></dt>
            <dd><input type="text" name="department" size="35" maxlength="255" /></dd>

            <dt>役職<span class="required">必須</span></dt>
            <dd><input type="text" name="position" size="35" maxlength="255" /></dd>

            <dt>メールアドレス<span class="required">必須</span></dt>
            <dd><input type="text" name="mail" size="35" maxlength="255" /></dd>

            <dt>パスワード<span class="required">必須</span></dt>
            <dd><input type="text" name="pass" size="10" maxlength="30" /></dd>
        </dl>
        <div><input type="submit" value="登録" /></div>
    </form>
</body>
</html>