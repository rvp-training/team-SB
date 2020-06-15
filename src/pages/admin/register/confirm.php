<?php
session_start();
if(isset($_SESSION['user_id']) && $_SESSION['admin_flag']===1){

}else{
    header('Location: ../../login');
          exit;
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
            <div class="register-confirm-title">この内容で登録してよろしいですか</div>
            <table>
                <tr>
                    <th>氏名</th>
                    <th>部署</th>
                    <th>役職</th>
                    <th>メールアドレス</th>
                    <th>パスワード</th>
                </tr>
                <tr>
                    <td>
                        <?php echo (htmlspecialchars($_POST['name'], ENT_QUOTES)); ?>
                    </td>
                    <td>
                        <?php echo (htmlspecialchars($_POST['department'], ENT_QUOTES)); ?>
                    </td>
                    <td>
                        <?php echo (htmlspecialchars($_POST['position'], ENT_QUOTES)); ?>
                    </td>
                    <td>
                        <?php echo (htmlspecialchars($_POST['mail'], ENT_QUOTES)); ?>
                    </td>
                    <td>
                        <?php echo (htmlspecialchars($_POST['pass'], ENT_QUOTES)); ?>
                    </td>
                </tr>
            </table>
            <br>
            <div class="center">
                <div>
                    <form action="http://localhost/pages/admin/register/index#register" method="post" enctype="multipart/form-data">
                        <input type="submit" class="button" value="戻る" />
                        <input type="hidden" name="name" value="<?php echo htmlspecialchars($_POST['name'] )?>">
                        <input type="hidden" name="department" value="<?php echo htmlspecialchars($_POST['department'] )?>">
                        <input type="hidden" name="position" value="<?php echo htmlspecialchars($_POST['position'] )?>">
                        <input type="hidden" name="mail" value="<?php echo htmlspecialchars($_POST['mail'] )?>">
                        <input type="hidden" name="pass" value="<?php echo htmlspecialchars($_POST['pass'] )?>">
                    </form>
                    <form action="http://localhost/pages/admin/register/complete#register" method="post" enctype="multipart/form-data">
                        <input type="submit" class="button" value="登録" />
                        <input type="hidden" name="name" value="<?php echo htmlspecialchars($_POST['name'] )?>">
                        <input type="hidden" name="department" value="<?php echo htmlspecialchars($_POST['department'] )?>">
                        <input type="hidden" name="position" value="<?php echo htmlspecialchars($_POST['position'] )?>">
                        <input type="hidden" name="mail" value="<?php echo htmlspecialchars($_POST['mail'] )?>">
                        <input type="hidden" name="pass" value="<?php echo htmlspecialchars($_POST['pass'] )?>">
                    </form>   
                </div>
            </div> 
        </main>
    </body>
</html>
