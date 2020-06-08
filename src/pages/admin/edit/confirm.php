<?php
    session_start();

    // if (!isset($_SESSION['edit'])){
    //     header('Location: index.php');
    //     exit();
    // }       
?>

<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
                <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
                <link href="http://localhost/css/users.css" rel="stylesheet" type="text/css" /> 
    </head>
    <body>
        <?php include dirname(__FILE__) . '/../../../components/admin/header.php'; ?>
        <?php include dirname(__FILE__) . '/../../../components/admin/sidebar.php'; ?>
        <main>
            <div class="edit-confirm-title">この内容で登録してよろしいですか</div>
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
            <div class="center">
                <div class="flex">
                <form action="http://localhost/pages/admin/edit/index.php" method="post" enctype="multipart/form-data">
                    <input type="submit" class="button" value="戻る" />
                    <input type="hidden" name="name" value="<?php echo $_POST['name'] ?>">
                    <input type="hidden" name="department" value="<?php echo $_POST['department'] ?>">
                    <input type="hidden" name="position" value="<?php echo $_POST['position'] ?>">
                    <input type="hidden" name="mail" value="<?php echo $_POST['mail'] ?>">
                    <input type="hidden" name="pass" value="<?php echo $_POST['pass'] ?>">
                </form>
                <form action="http://localhost/pages/admin/edit/complete.php" method="post" enctype="multipart/form-data">
                    <input type="submit" class="button" value="更新" />
                    <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
                    <input type="hidden" name="name" value="<?php echo $_POST['name'] ?>">
                    <input type="hidden" name="department" value="<?php echo $_POST['department'] ?>">
                    <input type="hidden" name="position" value="<?php echo $_POST['position'] ?>">
                    <input type="hidden" name="mail" value="<?php echo $_POST['mail'] ?>">
                    <input type="hidden" name="pass" value="<?php echo $_POST['pass'] ?>">
                </form>
                </div>
            </div>   
        </main>
    </body>
</html>









             
        