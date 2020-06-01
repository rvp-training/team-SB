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
    </head>
    <body>
        <?php include('../../../components/admin/header.php'); ?>
        <?php include('../../../components/admin/sidebar.php'); ?>
        <main>
            <title>この内容で登録してよろしいですか</title>
            
            <form action="" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th>氏名</th>
                            <th>部署</th>
                            <th>役職</th>
                            <th>メールアドレス</th>
                            <th>パスワード</th>
                        </tr>
                    </thead>    
                    <tbody>
                        <tr>
                            <th>
                                <?php echo (htmlspecialchars($_SESSION['register']['name'], ENT_QUOTES)); ?>
                            </th>
                            <th>
                                <?php echo (htmlspecialchars($_SESSION['register']['department'], ENT_QUOTES)); ?>
                            </th>
                            <th>
                                <?php echo (htmlspecialchars($_SESSION['register']['position'], ENT_QUOTES)); ?>
                            </th>
                            <th>
                                <?php echo (htmlspecialchars($_SESSION['register']['mail'], ENT_QUOTES)); ?>
                            </th>
                            <th>
                                <?php echo (htmlspecialchars($_SESSION['register']['pass'], ENT_QUOTES)); ?>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <a href="index.php?action=rewrite">&laquo;&nbsp;戻る</a> | <input type="submit" value="登録" />
                </div>
            </form>               
        </main>
    </body>
</html>
