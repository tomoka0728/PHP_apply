<?php
require_once(ROOT_PATH .'Controllers/contactController.php');
$contact = new contactController();
$contact -> contactEnd();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>お問い合わせ</title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script defer src="../js/index.js"></script>
</head>
<body>
<div class="main">
    <div class="container-fruid" >
    <?php include("header.php") ?>
        <dl class="ac">                    
            <p><h2 class="index_level2" style="text-align:center">お問い合わせフォーム</h2></p><br>
            <div style="text-align:center;">
                お問い合わせ内容を送信しました。<br>
                ありがとうございました。<br><br>

                <a href="contact.php"><button type="submit" class="btn btn-primary rounded-0">お問い合わせに戻る</button></a>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
        </dl>
    </div>
</div>
</body>
</html>