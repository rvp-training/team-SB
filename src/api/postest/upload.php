<?php
try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
} catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}
?>

<?php
if (isset($_POST['upload'])) {
    $sql = "INSERT INTO testimages(image_1, image_2, image_3, image_4, image_5) VALUES (:name1, :name2, :name3, :name4, :name5)";
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
}

?>    


<h1>画像アップロード</h1>
<?php if (isset($_POST['upload'])): ?>
    <p><?php echo $message; ?></p>
<?php else: ?>
    <form method="post" enctype="multipart/form-data">
        <p>アップロード画像</p>
        <input type="file" name="image[]" multiple = "multiple" >
        <input type="file" name="image[]" multiple = "multiple" >
        <input type="file" name="image[]" multiple = "multiple" >
        <input type="file" name="image[]" multiple = "multiple" >
        <input type="file" name="image[]" multiple = "multiple" >
        <button><input type="submit" name="upload" value="送信"></button>
    </form>
<?php endif;?>