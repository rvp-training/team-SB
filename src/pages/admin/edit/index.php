<?php
    // セッションを作成。 もしくは、リクエスト上で GET, POST またはクッキーにより渡されたセッション ID に基づき現在のセッションを復帰
    session_start();

//     if (!empty($_GET)){
//     // エラーの確認項目
//     if ($_GET['name'] === ''){
//         $error['name'] = 'blank';
//     }
//     if ($_GET['department'] === ''){
//         $error['department'] = 'blank';
//     }
//     if ($_GET['position'] === ''){
//         $error['position'] = 'blank';
//     }
//     if ($_GET['mail'] === ''){
//         $error['mail'] = 'blank';
//     }
//     // if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\?\*\[|\]%'=~^\{\}\/\+!#&\$\._-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9\._-]+)+$/", $_GET["mail"])) {
//     //     echo "メールアドレスの形式で入力してください";
//     // }
//     if (strlen($_GET['pass']) < 8){
//         $error['pass'] = 'length';
//     }
//     if ($_GET['pass'] === ''){
//         $error['pass'] = 'blank';
//     }

//     if (empty($error)){
//         $_SESSION['register'] = $_GET;
//         header('Location: confirm.php');
//         exit();
//     }
// }
//     // 書き直し
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

            <!-- multipart: フォームにファイルを送信する機能がある場合に指定する -->
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php $_GET["id"] ?>">
                <dl>
                    <dt class="register-index-content">氏名</dt>
                    <dd>
                        <input type="text" name="name" size="40" style="height:30px;" maxlength="30" placeholder="氏名を入力してください" value="<?php echo (htmlspecialchars($_GET['name'], ENT_QUOTES)); ?>" />
                        <!-- <#?php if ($error['name'] === 'blank'): ?>
                            <p class="register-error-message">* 必須項目です</p>
                        <#?php endif; ?> -->
                    </dd>

                    <dt class="register-index-content">部署</dt>
                    <dd>
                        <input type="text" name="department" size="40" style="height:30px;" maxlength="15" placeholder="部署を入力してください" value="<?php echo (htmlspecialchars($_GET['department'], ENT_QUOTES)); ?>" />
                        <!-- <#?php if ($error['department'] === 'blank'): ?>
                            <p class="register-error-message">* 必須項目です</p>
                        <#?php endif; ?> -->
                    </dd>

                    <dt class="register-index-content">役職</dt>
                    <dd>
                        <input type="text" name="position" size="40" style="height:30px;" maxlength="15" placeholder="役職を入力してください" value="<?php echo (htmlspecialchars($_GET['position'], ENT_QUOTES)); ?>" />
                        <!-- <#?php if ($error['position'] === 'blank'): ?>
                            <p class="register-error-message">* 必須項目です</p>
                        <#?php endif; ?> -->
                    </dd>

                    <dt class="register-index-content">メールアドレス</dt>
                    <dd>
                        <input type="text" name="mail" size="40" style="height:30px;" maxlength="45" placeholder="メールアドレスを入力してください" value="<?php echo (htmlspecialchars($_GET['mail'], ENT_QUOTES)); ?>" />
                        <!-- <#?php if ($error['mail'] === 'blank'): ?>
                            <p class="register-error-message">* メールアドレスは英数字または記号で入力してください</p>
                        <#?php endif; ?> -->
                    </dd>

                    <dt class="register-index-content">パスワード</dt>
                    <dd>
                        <input type="text" name="pass" size="40" style="height:30px;" maxlength="45" placeholder="パスワードを入力してください" value="<?php echo (htmlspecialchars($_GET['pass'], ENT_QUOTES)); ?>" />
                        <!-- <#?php if ($error['pass'] === 'blank'): ?>
                            <p class="register-error-message">* 必須項目です</p>
                        <#?php endif; ?>
                        <#?php if ($error['pass'] === 'length'): ?>
                            <p class="register-error-message">* パスワードは8文字以上の英数字または記号で入力してください</p>
                        <#?php endif; ?> -->
                    </dd>
                </dl>
                <div>
                    <input type="submit" value="更新" style="border:2px solid #EE3B2C;color:#FFF;background-color:#EE3B2C;border-radius:7px;width:100px;height:30px;margin-top:25px;margin-left:21%;" />
                    <!-- <input type="hidden" name="user_id" value="<#?php echo $user_data['id']; ?>"> -->
                    <!-- <input type="hidden" name="redirect" value="admin/register/confirm.php"/> -->
                </div>
            </form>  
        </main>
    </body>
</html>





        
        