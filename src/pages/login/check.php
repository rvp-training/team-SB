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
    if ($response === "ログインしました"){
        header('Location: http://localhost/pages/posts');
    }  else {
        header('Location: http://localhost/pages/login');
    }
?>