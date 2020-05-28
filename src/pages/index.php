<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
              <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
    <?php include('../components/posts/header.php'); ?>
    <?php include('../components/posts/sidebar.php'); ?>
    <main>
        <h1>test用のページです</h1>
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
    </main>
</body>
</html>
