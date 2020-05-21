<!DOCTYPE html>
<html>
<head></head>
<body>
    <?php include('../components/header.php'); ?>
    <h1>メインページです</h1>
    <a href="http://localhost:8888/pages/authenticate/login">ログイン</a>
    <p>
        <?php
            $url = "http://web/api/version.php";
            $response = file_get_contents($url);
            echo $response;
        ?>
    </p>
</body>
</html>
