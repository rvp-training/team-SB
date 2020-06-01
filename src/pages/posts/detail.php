<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
              <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
    <?php include('../../components/posts/header.php'); ?>
    <?php include('../../components/posts/sidebar.php'); ?>
    <main>
    <?php
        //GET /posts/detail API呼び出し
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/posts/detail?id=".$_GET['id']);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $result = json_decode($response, true);
        
    ?>



    <?php
        curl_close($curl);
    ?>
    </main>
</body>
</html>