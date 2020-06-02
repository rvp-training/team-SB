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
            <p>
                <?php
                    //  渡したいパラメータ
                    $params = [
                        'name' => $_session['register']['name'],
                        'department' => $_session['register']['department'],
                        'position' => $_session['register']['position'],
                        'mail' => $_session['register']['mail'],
                        'pass' => $_session['register']['pass']
                    ];
                    // 初期化
                    $curl = curl_init();
                    // リンクを貼る
                    curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/users/register2.php");
                    // HTTPメソッドの選択
                    curl_setopt($curl, CURLOPT_POST, TRUE);
                    // パラメータをセット
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $params); 
                    // HTTPメソッドの選択
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($curl); 
                ?>
            </p>
            
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
            <!-- curl閉じる -->
           <?php curl_close($curl); ?> 
        </main>
    </body>
</html>
