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
   var_dump($response);
   var_dump($_SESSION);
    if ($response === "ログインしました" && $_SESSION['admin_flag'] === 0){
        header('Location: http://localhost/pages/posts');
    } elseif ($response === "ログインしました" && $_SESSION['admin_flag'] === 1) {
        header('Location: http://localhost/pages/admin/');
    } else {
        header('Location: http://localhost/pages/login');
    }
?>