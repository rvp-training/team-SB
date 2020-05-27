<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<title>PHP</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>    
</header>

<main>
<pre>
<?php
    try{
        $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');
            $sql = "SELECT now();";
            foreach ($db->query($sql) as $row) {
            print $row[0] . "\n";
            }
            $db = null; 
    } catch(PDOException $e){
        echo 'DB接続エラー; ' . $e->getMessage();
    }
?>
</pre>
</main>
</body>   
</html>