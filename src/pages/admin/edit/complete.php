<?php
    $params = [
        'name' => $_POST['name'],
        'department' => $_POST['department'],
        'position' => $_POST['position'],
        'mail' => $_POST['mail'],
        'pass' => $_POST['pass'],
        'id' => $_POST['id']
    ];
    //POST /admin/edit API呼び出し
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/users/edit_test.php");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $params); 
    $response = curl_exec($curl);
    $result = json_decode($response, true);
    if ($response === "変更完了しました"){
        header('Location: http://localhost/pages/admin/index.php');
    } else {
        header('Location: http://localhost/pages/admin/users');
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
    </body>
</html>
