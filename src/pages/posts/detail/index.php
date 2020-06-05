<?php session_start(); ?>
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
    <?php include('../../../components/posts/header.php'); ?>
    <?php include('../../../components/posts/sidebar.php'); ?>
    <main>
        <?php
            //GET /posts/detail API呼び出し
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "http://web/api/posts/detail/?id=".$_GET['id']);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            $result = json_decode($response, true);
            $main = $result["main"][0];
            $comments = $result["comments"];
        ?>
        <div class=image_wrapper>
            <ul class="pictures_l">    
                <li class="picture_l active"><img src="<?php echo $main["image_1"]; ?>"></li>
                <li class="picture_l"><img src="<?php echo $main["image_2"]; ?>" ></li>
                <li class="picture_l"><img src="<?php echo $main["image_3"]; ?>" ></li>
                <li class="picture_l"><img src="<?php echo $main["image_4"]; ?>" ></li>
                <li class="picture_l"><img src="<?php echo $main["image_5"]; ?>" ></li>
            </ul>
            <ul class="pictures_s">
                <li class="picture_s"><img src="<?php echo $main["image_1"]; ?>" id="image_1"></li>
                <li class="picture_s"><img src="<?php echo $main["image_2"]; ?>" id="image_2"></li>
                <li class="picture_s"><img src="<?php echo $main["image_3"]; ?>" id="image_3"></li>
                <li class="picture_s"><img src="<?php echo $main["image_4"]; ?>" id="image_4"></li>
                <li class="picture_s"><img src="<?php echo $main["image_5"]; ?>" id="image_5"></li>
            </ul>
        </div>
        <div>
            <div id="description_frame">
                <p id="user_name"><?php print $main["name"]."@";
                                        print $main["position"];
                                        print $main["position"]."："; 
                                        //退職済みの場合をif文で追加 ?></p>
                <p id="title"><?php print $main["title"] ?></p>
                <p id="text"><?php print $main["text"] ?></p>
                <p id="tag"><?php print $main["tag"] ?></p>
            </div>
            <br>
            <?php foreach ($comments as $key => $value) : ?>
            <div id="comment_frame">
                <p id="comment">コメント：</p>
                <p class="content"><?php print $comments[$key]["content"] ?></p>
                <p class="comment_user_name"><?php print $comments[$key]["name"]."@";
                                                    print $comments[$key]["position"];
                                                    print $comments[$key]["position"]."："; 
                                                    //退職済みの場合をif文で追加 ?></p>
            </div>
            <?php endforeach ?>
            <div class="input_frame">
                <div class="input_form">
                    <form action="http://localhost/pages/posts/detail/comments.php" method="POST">
                        <input class="form-text" id="content" name="content" placeholder="コメントを入力してください">
                        <input type="hidden" name="post_id" value="<?php print $_GET['id']?>">
                        <input type="hidden" name="user_id" value="<?php print $_SESSION['user_id']?>">
                        <input type="submit" value="投稿">
                    </form>
                </div>
            </div>
        </div>
        <?php curl_close($curl); ?>
    </main>
</body>
</html>