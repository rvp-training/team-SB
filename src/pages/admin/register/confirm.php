<?php
    session_start();

    if (!isset($_SESSION['register'])){
        header('Location: index.php');
        exit();
    }       
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" /> 
        <link href="http://localhost/css/register.css" rel="stylesheet" type="text/css" /> 
    </head>
    <body>
        <?php include('../../../components/admin/header.php'); ?>
        <?php include('../../../components/admin/sidebar.php'); ?>
        <main>
            <div class="register-confirm-title">この内容で登録してよろしいですか</div>
            <form action="http://localhost/pages/admin/register/finish.php" method="post" enctype="multipart/form-data">
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
                    <a href="index.php?action=rewrite"><button type="button" style="border:2px solid #EE3B2C;color:#FFF;background-color:#EE3B2C;border-radius:7px;width:100px;height:30px;margin-top:40px;margin-left:25px;">戻る</button></a>
                    <input type="submit" style="border:2px solid #EE3B2C;color:#FFF;background-color:#EE3B2C;border-radius:7px;width:100px;height:30px;margin-top:40px;margin-left:60px;" value="登録" />
                    <input type="hidden" name="name" value="<?php echo $_POST['name'] ?>">
                    <input type="hidden" name="department" value="<?php echo $_POST['department'] ?>">
                    <input type="hidden" name="position" value="<?php echo $_POST['position'] ?>">
                    <input type="hidden" name="mail" value="<?php echo $_POST['mail'] ?>">
                    <input type="hidden" name="pass" value="<?php echo $_POST['pass'] ?>">
            </form>    
        </main>
    </body>
</html>
