<?php
header('Content-Type: text/json; charset=UTF-8');

try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
} catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}

// DB接続 

if (isset($_POST['upload'])) {
    $sql = "INSERT INTO images(image_1, image_2, image_3, image_4, image_5) VALUES (?, ?, ?, ?, ?) RETURNING id";
    $stmt = $db->prepare($sql);
    for ($i = 0; $i < 5; ++$i) {
        $tmp_name = $_FILES['image']['tmp_name'][$i];
        $no = $i + 1;
        if(is_null($tmp_name)){
            $stmt->bindValue($no, '', PDO::PARAM_STR);
            continue;
        }
        $image = uniqid();//ファイル名をユニーク化
        $image .= '.' . substr(strrchr($_FILES['image']['name'][$i], '.'), 1);
        $file = "/images/$image";
        if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $file)){
            $stmt->bindValue($no, $image, PDO::PARAM_STR);
        } else {
            print("アップロードに失敗しました");
        }
    }
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
} 
// imagesテーブルに画像データ挿入

$image_id = $result["id"];
//posgtsテーブルのimage_idへimageテーブルのidを挿入

$user_id = 1;
// $user_id = $_SESSION['user_id'];

//postsテーブルのusers_idへログイン中のuserのidを代入
// $user_id = 1;
$title = $_POST["title"];
$text = $_POST["text"];
$tag = $_POST["tag"];
$category_id = $_POST["category_id"];


$preparecontent = $db->prepare('INSERT INTO posts ( 
    title, text, tag, image_id, user_id, category_id ,time) 
    VALUES ( :title, :text, :tag, :image_id, :user_id, :category_id, now());');

$preparecontent->bindValue(':title',$title,PDO::PARAM_STR);
$preparecontent->bindValue(':text',$text,PDO::PARAM_STR);
$preparecontent->bindValue(':tag',$tag,PDO::PARAM_STR);
$preparecontent->bindValue(':image_id',$image_id,PDO::PARAM_INT);
$preparecontent->bindValue(':user_id',$user_id,PDO::PARAM_INT);
$preparecontent->bindValue(':category_id',$category_id,PDO::PARAM_INT);


$res = $preparecontent->execute();

if(!$res){
    echo "投稿に失敗しました！";
    echo "\n";
    var_dump($preparecontent->errorInfo());
}else{
    header('Location: http://localhost/pages/posts?category='.$category_id);
}
?>