<?php
    session_start();
    $params = [
        'name' => $_POST['name'],
        'department' => $_POST['department'],
        'position' => $_POST['position'],
        'mail' => $_POST['mail'],
        'pass' => $_POST['pass']
    ];
    //POST /admin/register API呼び出し
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/register.php");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $params); 
    $response = curl_exec($curl);
    $result = json_decode($response, true);
    if ($response === "登録完了しました"){
        header('Location: http://localhost/pages/admin/index.php');
        echo "新規登録に成功しました";
    } else {
        header('Location: http://localhost/pages/admin/register/index.php');
        echo "新規登録に失敗しました";
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
        <div id="wrapper">
            <?php include('../../../components/admin/header.php'); ?>
            <?php include('../../../components/admin/sidebar.php'); ?>
            <main>
                
            </main>
        </div>
    </body>
</html>
