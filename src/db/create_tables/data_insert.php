<?php
if (($handle = fopen("testdata.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $result['name'][]       = $data[0];
        $result['department'][] = $data[1];
        $result['position'][]   = $data[2];
        $result['mail'][]       = $data[3];
        $result['pass'][]       = $data[4];
    }
    fclose($handle);
}
$n = 200; //ユーザーの人数
$sql1 = "INSERT INTO users (name, department, position, mail, pass) VALUES ";
for ($i=1; $i < $n; $i++){
$sql2 .= "('" . $result['name'][$i] . "', '" . $result['department'][$i] . "', '" . $result['position'][$i] . "', '" . $result['mail'][$i] . "', '" . $result['pass'][$i] . "'), "; 
;
}
$sql3 = "('" . $result['name'][$n] . "', '" . $result['department'][$n] . "', '" . $result['position'][$n] . "', '" . $result['mail'][$n] . "', '" . $result['pass'][$n] . "');"; 
;
$sql = $sql1.$sql2.$sql3;

try{
    $db = new PDO('pgsql:dbname=postgres;host=db','postgres','password');

    $res = $db->query($sql);

} catch(PDOException $e){
    echo 'DB接続エラー; ' . $e->getMessage();
}


if(!$res){
    print("レコードが作成されませんでした");
}else{
    print("レコードが作成されました");
}

?>