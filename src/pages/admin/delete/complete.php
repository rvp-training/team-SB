<?php session_start();
    //GET /admin/users/delete API呼び出し
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/users/delete/delete?id=".$_GET["id"]);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    $result = json_decode($response, true);

    if ($response == "変更完了しました"){
        $_SESSION['message'] = "削除に成功しました";
        header('Location: ../index#top');
    } else {
        $_SESSION['message'] = "削除に失敗しました";
        header('Location: ../index#top');
    }
?>
        