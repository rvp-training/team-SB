<?php session_start();

$params = [
    'post_id' => $_POST['post_id'],
    'user_id' => $_POST['user_id'],
    'content' => $_POST['content']
];
//POST /posts/detail/comments API呼び出し
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://web/api/posts/detail/comments.php");
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $params); 
$response = curl_exec($curl);
$result = json_decode($response, true);
if ($response === "コメント投稿に成功しました"){
    header('Location: http://localhost/pages/posts/detail?id='.$_POST["post_id"]);
} else {
    header('Location: http://localhost/pages/posts/detail?id='.$_POST["post_id"]);
}
?>