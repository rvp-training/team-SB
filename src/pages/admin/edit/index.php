<?php
    // セッションを作成。 もしくは、リクエスト上で GET, POST またはクッキーにより渡されたセッション ID に基づき現在のセッションを復帰
    session_start();
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
            <?php
                //GET /admin/users/edit API呼び出し
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/users/edit/edit_screen_test?id=".$_GET["id"]);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                $result = json_decode($response, true);
            ?>
            <div>
                <p class="user-edit-title">ユーザー情報の編集</p>

            <form action="confirm.php" method="post">
                <dl>
                    <dt class="user-edit-content">氏名</dt>
                    <dd>
                        <input type="text" class="user-input" name="name"   maxlength="30" placeholder="氏名を入力してください" value="<?php 
                        if (isset($_POST['name'])){
                            echo $_POST['name'];
                        } else {
                        echo (htmlspecialchars($result[0]['name'], ENT_QUOTES));
                        }?>" required/>
                    </dd>
                    <dt class="user-edit-content">部署</dt>
                    <dd>
                        <input type="text" class="user-input" name="department"   maxlength="15" placeholder="部署を入力してください" value="<?php 
                        if (isset($_POST['department'])){
                            echo $_POST['department'];
                        } else {
                        echo (htmlspecialchars($result[0]['department'], ENT_QUOTES));
                        }?>" required/>
                        </dd>
                    <dt class="user-edit-content">役職</dt>
                    <dd>
                        <input type="text" class="user-input" name="position"   maxlength="15" placeholder="役職を入力してください" value="<?php 
                        if (isset($_POST['position'])){
                            echo $_POST['position'];
                        } else {
                        echo (htmlspecialchars($result[0]['position'], ENT_QUOTES));
                        }?>" required/>
                        </dd>
                    <dt class="user-edit-content">メールアドレス</dt>
                    <dd>
                        <input type="email" class="user-input" name="mail"   maxlength="45" placeholder="メールアドレスを入力してください" value="<?php 
                        if (isset($_POST['mail'])){
                            echo $_POST['mail'];
                        } else {
                        echo (htmlspecialchars($result[0]['mail'], ENT_QUOTES));
                        }?>" required/>
                        </dd>
                    <dt class="user-edit-content">パスワード</dt>
                    <dd>
                        <input type="text" class="user-input" name="pass"  minlength="8" maxlength="45" placeholder="パスワードを入力してください" value="<?php 
                        if (isset($_POST['pass'])){
                            echo $_POST['pass'];
                        } else {
                        echo (htmlspecialchars($result[0]['pass'], ENT_QUOTES));
                        }?>" required/>
                        </dd>
                </dl>
                <div class="center">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                    <input type="submit" class="button" value="更新"/>
                </div>
            </form>  
            </div>
        </main>
    </body>
</html>


        
        