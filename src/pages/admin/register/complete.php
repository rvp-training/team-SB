<?php session_start();
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
        $_SESSION['message'] = "新規登録に成功しました";
        header('Location: ../index#top');
    } else {
        $_SESSION['message'] = "新規登録に失敗しました";
        header('Location: ../index#top');
    }
?>