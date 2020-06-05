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
折りたたむ



