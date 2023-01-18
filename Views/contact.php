<?php
require_once(ROOT_PATH .'Controllers/contactController.php');
$contact = new contactController();
$error = $contact->contact();
$contactDb = new contactLogic();

if(isset($_GET['editId'])){
    list($edit) = $contactDb->selectContact($_GET['editId']);
    $edit['editId'] = $edit['id'];
    foreach($edit as $key => $value){
        $_SESSION[$key] = $value;
    }
} else if(isset($_GET['deleteId'])){
    $contact->delete($_GET['deleteId']);
}
$date = date('ymdhis');
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
    <link rel="stylesheet" type="text/css" href="../css/table.css?date=<?= $date?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script defer src="../js/contact.js"></script>
</head>
<body>
<div class="main">
    <div class="container-fruid" >
    <?php include("header.php") ?>
        <dl class="ac">                    
            <p><h2 class="index_level2" style="text-align:center">お問い合わせフォーム</h2></p><br>
            <div style="text-align:center;">
            内容をご入力の上、「確認画面へ」ボタンをクリックしてください。<br><br>
                <section>
                    <form action='' name='contact' method="POST"  novalidate>
                    <input type = "hidden" name = "editId" value = "<?php echo htmlspecialchars($_SESSION['editId']??''); ?>">
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-offset-2">
                                <label for="name">お名前（必須）</label>
                            </div>
                            <div class="col-md-8 col-offset-2">
                                <input type="text" name="name" id="name" class="form-control rounded-0" value="<?php echo htmlspecialchars($_SESSION['name']??''); ?>" required autofocus>
                                <?php if( isset( $error['name'] ) ) :?>
                                    <?php if ($error['name'] === 'blank'): ?>
                                        <p class="error_msg text-danger">※氏名は必須です</p>
                                    <?php endif; ?>
                                    <?php if ($error['name'] === 'name'): ?>
                                        <p class="error_msg text-danger">※10文字以内で入力してください</p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-offset-2">
                                <label for="kana">フリガナ（必須）</label>
                            </div>
                            <div class="col-md-8 col-offset-2">
                                <input type="text" name="kana" id="kana" class="form-control rounded-0" value="<?php echo htmlspecialchars($_SESSION['kana']??''); ?>" required autofocus>
                                <?php if( isset( $error['kana'] ) ) :?>
                                    <?php if ($error['kana'] === 'blank'): ?>
                                        <p class="error_msg text-danger">※フリガナは必須です</p>
                                    <?php endif; ?>
                                    <?php if ($error['kana'] === 'kana'): ?>
                                        <p class="error_msg text-danger">※10文字以内で入力してください</p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-offset-2">
                                <label for="tel">電話番号</label>
                            </div>
                            <div class="col-md-8 col-offset-2">
                                <input type="text" name="tel" id="tel" class="form-control rounded-0" value="<?php echo htmlspecialchars($_SESSION['tel']??''); ?>">
                                <?php if( isset( $error['tel'] ) ) :?>
                                    <?php if ($error['tel'] === 'tel'): ?>
                                        <p class="error_msg text-danger">※数字で入力してください</p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-offset-2">
                                <label for="email">メールアドレス（必須）</label>
                            </div>
                            <div class="col-md-8 col-offset-2">
                                <input type="email" name="email" id="email" class="form-control rounded-0" value="<?php echo htmlspecialchars($_SESSION['email']??''); ?>" required>
                                <?php if( isset( $error['email'] ) ) :?>
                                    <?php if ($error['email'] === 'blank'): ?>
                                        <p class="error_msg text-danger">※メールアドレスは必須です。</p>
                                    <?php endif; ?>
                                    <?php if ($error['email'] === 'email'): ?>
                                        <p class="error_msg text-danger">※入力された値が不正です。</p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        </div>

                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-offset-2">
                                <label for="body">お問い合わせ内容（必須）</label>
                            </div>
                            <div class="col-md-8 col-offset-2">
                                <textarea name="body" id="body" rows="10" class="form-control rounded-0" required><?php echo htmlspecialchars($_SESSION['body']??''); ?></textarea>
                                <?php if( isset( $error['body'] ) ) :?>
                                    <?php if ($error['body'] === 'blank'): ?>
                                        <p class="error_msg text-danger">※入力は必須です。</p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-offset-2">
                                    <button type="submit" id="btnSubmit" class="btn btn-primary w-100 rounded-0">確認画面へ</button><br><br>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <section>
                <?php
                $list = $contactDb->selectContact();
                if(!empty($list)){
                ?>
                <div class = "col-12">
                <table class = "database">
                    <tr><td>お名前</td><td>フリガナ</td><td>電話番号</td><td>メールアドレス</td><td>内容</td><td></td><td></td></tr>
                <?php for($i=0; $i<count($list); $i++){ ?>
                        <tr>
                        <td><?=htmlspecialchars($list[$i]['name'])?></td>
                        <td><?=htmlspecialchars($list[$i]['kana'])?></td>
                        <td><?=htmlspecialchars($list[$i]['tel'])?></td>
                        <td><?=htmlspecialchars($list[$i]['email'])?></td>
                        <td><?=nl2br(htmlspecialchars($list[$i]['body']))?></td>
                        <td><a href ='./contact.php?editId=<?=$list[$i]['id']?>'>編集</a></td>
                        <td><a href ="./contact.php?deleteId=<?=$list[$i]['id']?>" onclick="return confirm('本当に削除しますか?')">削除</a></td>
                        </tr>
                <?php } ?>
                </table>
                </div>
                <br><br>
                <?php
                }
                ?>
                </section>
            </div>
        </dl>
    </div>
</div>
</body>
</html>