<?php
try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
} catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}
?>

<?php
if (isset($_POST['upload'])) {
    var_dump($_FILES);
	foreach ($_FILES['image']['tmp_name'] as $i => $tmp_name){
        if($tmp_name === "" ){
            continue;
        }
        $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        $image .= '.' . substr(strrchr($_FILES['image']['name'][$i], '.'), 1);
        $file = "/images/$image";
		if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $file)){
            $sql = "INSERT INTO testimages(image_1,image_2,image_3,image_4,image_5) VALUES (:name)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':name', $image, PDO::PARAM_STR);
            $stmt->execute();
			echo $_FILES['image']['name'].'をアップロードしました<br>';
		} else {
			print("アップロードに失敗しました");
        }
    }
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