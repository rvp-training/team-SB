<?php
header('Content-Type: text/json; charset=UTF-8');

try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
} catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}
?>
<!-- DB接続 -->

<?php
if (isset($_POST['upload'])) {
    $sql = "INSERT INTO images(image_1, image_2, image_3, image_4, image_5) VALUES (:name1, :name2, :name3, :name4, :name5) RETURNING id";
    $stmt = $db->prepare($sql);
    foreach ($_FILES['image']['tmp_name'] as $i => $tmp_name){
        $no = $i + 1;
        if($tmp_name === "" ){
            $stmt->bindValue(':name'.$no, '', PDO::PARAM_STR);
            continue;
        }
        $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        $image .= '.' . substr(strrchr($_FILES['image']['name'][$i], '.'), 1);
        $file = "/images/$image";
        if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $file)){
            $stmt->bindValue(':name'.$no, $image, PDO::PARAM_STR);
        } else {
            print("アップロードに失敗しました");
        }
    }
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
?> 

<?php
$image_id = $result["id"];
//posgtsテーブルのimage_idへimageテーブルのidを挿入

$user_id = $_SESSION['user_id'];
//postsテーブルのusers_idへログイン中のuserのidを代入

$title = $_POST["title"];
$text = $_POST["text"];
$tag = $_POST["tag"];
$category_id = $_POST["category_id"];

$preparecontent = $db->prepare('INSERT INTO posts ( 
    title, text, tag, image_id, user_id) 
    VALUES ( :title, :text, :tag, :image_id, :user_id, :category_id);');

$preparecontent->bindValue(':title',(string)$title,PDO::PARAM_STR);
$preparecontent->bindValue(':text',(string)$text,PDO::PARAM_STR);
$preparecontent->bindValue(':tag',(string)$tag,PDO::PARAM_STR);
$preparecontent->bindValue(':image_id',(string)$image_id,PDO::PARAM_STR);
$preparecontent->bindValue(':user_id',(string)$user_id,PDO::PARAM_STR);
$preparecontent->bindValue(':category_id',(string)$category_id,PDO::PARAM_STR);


$preparecontent->execute();
// タイトル、テキスト、タグの投稿

echo "登録完了しました";
?>