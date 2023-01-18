<?php
require_once(ROOT_PATH .'Controllers/contactController.php');
$contact = new contactController();
$contact -> contactCheck();
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
    <link rel="stylesheet" type="text/css" href="../css/form.css">
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
        <form action="contactEnd.php" method="POST">
        <table class="form-table">
            <tbody>
                <tr>
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-offset-2" >
                            <th><label for="name" >お名前</label><br></th>
                            <td><?php echo htmlspecialchars($_SESSION['name']); ?></td>
                        </div>
                    </div>
                </tr>
                <tr>
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-offset-2" >
                            <th><label for="kana" >フリガナ</label><br></th>
                            <td><?php echo htmlspecialchars($_SESSION['kana']); ?></td>
                        </div>
                    </div>
                </tr>
                <tr>
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-offset-2" >
                            <th><label for="tel" >電話番号</label><br></th>
                            <td><?php echo htmlspecialchars($_SESSION['tel']); ?></td>
                        </div>
                    </div>
                </tr>
                <tr>
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-offset-2" >
                            <th><label for="email" >メールアドレス</label><br></th>
                            <td><?php echo htmlspecialchars($_SESSION['email']); ?></td>
                        </div>
                    </div>
                </tr>
                <tr>
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-offset-2" >
                            <th><label for="body" >お問い合わせ内容</label><br></th>
                            <td><?php echo nl2br(htmlspecialchars($_SESSION['body'])); ?></td>
                        </div>
                    </div>
                </tr>
            </tbody>  
        </table>
        <br><br>
        <h3 class="index_level3" style="text-align:center">上記の内容でよろしいですか？<br><br></h3>
            <div class="row justify-content-center">
                <div class="col-md-8 col-offset-2">
                    <div style="text-align:center;">
                        <a href="contact.php" class="btn btn-primary rounded-0">戻る</a>
                        <button type="submit" name="add" class="btn btn-primary rounded-0">送信する</button>
                        <br><br><br><br>
                    </div>
                </div>
            </div>
        </dl>
    </div>
</div>    
</body>
</html>