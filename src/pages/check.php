<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
             
</head>
<body>
<?php
    session_start();
    $params = [ "mail" => $_POST["mail"],
                "pass" => $_POST["pass"]];

    //POST /login API呼び出し
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://web/login/index.php");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $params); 
    $response = curl_exec($curl);
    $result = json_decode($response, true);
    if ($response === "0"){
        header('Location: http://localhost/pages/posts.php');
    } elseif ($response === "1") {
        header('Location: http://localhost/admin.php');
    } else {
        header('Location: http://localhost/pages/login.php');
    }
?>
</body>
</html>
