<?php
try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
} catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}
    $sql = "SELECT * FROM images WHERE id = 1";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $image = $stmt->fetch();
?>

<h1>画像表示</h1>
<img src="/images/<?php echo $image['name']; ?>" width="300" height="300">
<a href="upload.php">画像アップロード</a>