<!DOCTYPE html>
<html>
<head>
         <meta http-equiv="content-type" content="text/html; charset=utf-8" />
              <link href="http://localhost/css/system.css" rel="stylesheet" type="text/css" />
              <link href="http://localhost/css/detail.css" rel="stylesheet" type="text/css" />
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
              <script src="http://localhost/js/detail.js"></script>
    

     
</head>
<body>
    <?php include('../../components/posts/header.php'); ?>
    <?php include('../../components/posts/sidebar.php'); ?>
    <main>
    <?php
        //GET /posts/detail API呼び出し
       /* $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://web/api/admin/posts/detail?id=".$_GET['id']);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $result = json_decode($response, true);*/
    ?>
<!-- 
    <div class=image_wrapper>
        <ul class="pictures_l">    
            <li class="picture_l active"><img src="<?php echo $result["image_1"]; ?>"></li>
            <li class="picture_l"><img src="<?php echo $result["image_2"]; ?>" ></li>
            <li class="picture_l"><img src="<?php echo $result["image_3"]; ?>" ></li>
            <li class="picture_l"><img src="<?php echo $result["image_4"]; ?>" ></li>
            <li class="picture_l"><img src="<?php echo $result["image_5"]; ?>" ></li>
        </ul>
        <ul class="pictures_s">
            <li class="picture_s"><img src="<?php echo $result["image_1"]; ?>" id="image_1"></li>
            <li class="picture_s"><img src="<?php echo $result["image_2"]; ?>" id="image_2"></li>
            <li class="picture_s"><img src="<?php echo $result["image_3"]; ?>" id="image_3"></li>
            <li class="picture_s"><img src="<?php echo $result["image_4"]; ?>" id="image_4"></li>
            <li class="picture_s"><img src="<?php echo $result["image_5"]; ?>" id="image_5"></li>
        </ul>
    </div> -->

    <div class=image_wrapper>
        <ul class="pictures_l">    
            <li class="picture_l active"><img src="../../images/cat-eyes-photo.jpg"></li>
            <li class="picture_l"><img src="../../images/brussels-griffon-dog-poses-for-the-camera.jpg"></li>
            <li class="picture_l"><img src="../../images/business-cat-in-office.jpg"></li>
            <li class="picture_l"><img src="../../images/cute-cat-photo.jpg"></li>
            <li class="picture_l"><img src="../../images/business-pug-working-on-laptop.jpg"></li>
        </ul>
        <ul class="pictures_s">
            <li class="picture_s"><img src="../../images/cat-eyes-photo.jpg" id="image_1"></li>
            <li class="picture_s"><img src="../../images/brussels-griffon-dog-poses-for-the-camera.jpg"  id="image_2"></li>
            <li class="picture_s"><img src="../../images/business-cat-in-office.jpg" id="image_3"></li>
            <li class="picture_s"><img src="../../images/cute-cat-photo.jpg" id="image_4"></li>
            <li class="picture_s"><img src="../../images/business-pug-working-on-laptop.jpg" id="image_5"></li>
        </ul>
    </div> 

    <!-- 
    <div>
    <div id="description_frame">
        <p id="user_name"><?php print $result["name"]."@";
                                print $result["position"];
                                print $result["position"]."："; ?></p>
        <p id="title"><?php print $result["title"] ?></p>
        <p id="text"><?php print $result["text"] ?></p>
        <p id="tag"<?php print $result["tag"] ?></p>
    </div>
    <br>
    <?php foreach ($result as $key) : ?>
    <div id="comment_frame">
        <p id="comment">コメント：</p>
        <p class="content">絶対猫派！めっちゃかわいーーーーーー！犬もいいけどやっぱり猫が好き！</p>
        <p class="comment_user_name">田中次郎@情報システム部課長</p>
    </div>
    <?php endforeach ?>
    <div class="input_frame">
        <div class="input_form">
            <form action="http://localhost/pages/posts/detail" method="POST">
                <input class="form-text" id="content" name="content" placeholder="コメントを入力してください">
                <input type="submit" value="投稿">
            </form>
        </div>
    </div>
</div>
    -->

<div>
    <div id="description_frame">
        <p id="user_name">山田太郎@人事部部長：</p>
        <p id="title">犬派と猫派あなたはどっち？</p>
        <p id="text">皆さんの意見教えてください！</p>
        <p id="tag">#dog #cat</p>
    </div>
    <br>
    <div id="comment_frame">
        <p id="comment">コメント：</p>
        <p class="content">絶対猫派！めっちゃかわいーーーーーー！犬もいいけどやっぱり猫が好き！</p>
        <p class="comment_user_name">田中次郎@情報システム部課長</p>
    </div>
    <div id="comment_frame">
        <p id="comment">コメント：</p>
        <p class="content">I love dogs.</p>
        <p class="comment_user_name">ジョン・スミス@国際部部長</p>
    </div>

     <!--コメント入力フォーム -->
    <div class="input_frame">
        <div class="input_form">
            <form action="http://localhost/pages/posts/detail" method="POST">
                <input class="form-text" id="content" name="content" placeholder="コメントを入力してください">
                <input type="submit" value="投稿">
            </form>
        </div>
    </div>
</div>

    <?php
      //  curl_close($curl);
    ?>
    </main>
</body>
</html>