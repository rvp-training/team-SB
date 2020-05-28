<!DOCTYPE html>
<html>
<head></head>
<body>
    <?php include('../components/header.php'); ?>
    <h1>メインページです</h1>
    <a href="http://localhost/pages/login">ログイン</a>
    <p>
        <?php
            $curl = curl_init( "http://localhost/api/admin/users/delete.php" );
            //curl_setopt($curl, CURLOPT_POST, TRUE);
            $result = curl_exec($curl);
            print $result;
            curl_close($curl);
        ?>
    </p>
</body>
</html>
