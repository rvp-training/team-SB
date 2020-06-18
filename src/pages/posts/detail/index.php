<?php session_start(); 
        if(isset($_SESSION['user_id']) && $_SESSION['admin_flag'] === 0){
        } else {
            header('Location: ../../login');
            exit;
        } ?>
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
        <div class=centered_div>
            <div class=image_wrapper>
                <ul class="pictures_l">    
                    <li class="picture_l active">
                        <?php if( $main["image_1"] != NULL): ?>
                            <img src="../../../images/<?php echo $main["image_1"]; ?>" alt="image not found"></li>
                        <?php else: ?>
                            <img src="../../../images/<?php echo"noimage.png"; ?>" alt="image not found"></li>
                        <?php endif; ?> 
                    <li class="picture_l">
                        <?php if( $main["image_2"] != NULL): ?>
                            <img src="../../../images/<?php echo $main["image_2"]; ?>" alt="image not found"></li>
                        <?php else: ?>
                            <img src="../../../images/<?php echo"noimage.png"; ?>" alt="image not found"></li>
                        <?php endif; ?>
                    <li class="picture_l">
                        <?php if( $main["image_3"] != NULL): ?>
                            <img src="../../../images/<?php echo $main["image_3"]; ?>" alt="image not found"></li>
                        <?php else: ?>
                            <img src="../../../images/<?php echo"noimage.png"; ?>" alt="image not found"></li>
                        <?php endif; ?>
                    <li class="picture_l">
                        <?php if( $main["image_4"] != NULL): ?>
                            <img src="../../../images/<?php echo $main["image_4"]; ?>" alt="image not found"></li>
                        <?php else: ?>
                            <img src="../../../images/<?php echo"noimage.png"; ?>" alt="image not found"></li>
                        <?php endif; ?>
                    <li class="picture_l">
                        <?php if( $main["image_5"] != NULL): ?>
                            <img src="../../../images/<?php echo $main["image_5"]; ?>" alt="image not found"></li>
                        <?php else: ?>
                            <img src="../../../images/<?php echo"noimage.png"; ?>" alt="image not found"></li>
                        <?php endif; ?>
                </ul>
                <ul class="pictures_s">
                    <?php for( $i=1; $i<=5; $i++ ) : ?>
                        <li class="picture_s">
                        <?php if( $main["image_$i"] != NULL): ?>
                            <img src="../../../images/<?php echo $main["image_$i"]; ?>" id="image_<?php echo $i; ?>" alt="image not found"></li>
                        <?php else: ?>
                            <img src="../../../images/<?php echo"noimage.png"; ?>" id="image_<?php echo $i; ?>" alt="image not found"></li>
                        <?php endif; ?>
                    <?php endfor ?>
                </ul>
            </div>
            <div>
                <div id="description_frame">
                    <p id="user_name"><?php print htmlspecialchars( $main["name"])."@";
                                            print htmlspecialchars( $main["department"]);
                                            print htmlspecialchars( $main["position"]."："); 
                                            if ($main["delete_flag"] === 1){
                                                print "(退職済み)"; } ?></p>
                    <p id="title"><?php print htmlspecialchars( $main["title"] )?></p>
                    <p id="text"><?php print nl2br(htmlspecialchars($main["text"])) ?></p>
                    <p id="tag"><?php print htmlspecialchars( $main["tag"] )?></p>
                </div>
                <br>
                <?php foreach ($comments as $key => $value) : ?>
                <div id="comment_frame">
                    <p id="comment">コメント：</p>
                    <p class="content"><?php print htmlspecialchars( $comments[$key]["content"]) ?></p>
                    <p class="comment_user_name"><?php print htmlspecialchars( $comments[$key]["name"])."@";
                                                        print htmlspecialchars( $comments[$key]["department"]);
                                                        print htmlspecialchars( $comments[$key]["position"]); 
                                                        if ($comments[$key]["delete_flag"] === 1){
                                                        print "(退職済み)"; }?></p>
                </div>
                <?php endforeach ?>
                <div class="input_frame">
                    <div class="input_form">
                        <form action="http://localhost/pages/posts/detail/comments.php" method="POST">
                            <input class="form-text" id="content" name="content" maxlength="150" placeholder="コメントを入力してください" required>
                            <input type="hidden" name="post_id" value="<?php print $_GET['id']?>">
                            <input type="hidden" name="user_id" value="<?php print $_SESSION['user_id']?>">
                            <input type="submit" value="投稿">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php curl_close($curl); ?>
    </main>
</body>
</html>