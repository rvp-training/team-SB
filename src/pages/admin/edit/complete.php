<?php session_start();
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
    curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/users/edit/edit_test.php");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $params); 
    $response = curl_exec($curl);
    $result = json_decode($response, true);
    if ($response === "変更完了しました"){
        $_SESSION['message'] = "更新に成功しました";
        header('Location: http://localhost/pages/admin/index#top');
    } else {
        $_SESSION['message'] = "更新に失敗しました";
        header('Location: http://localhost/pages/admin/index#top');
    }
?>