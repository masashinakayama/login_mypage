<?php
mb_internal_encoding("utf8");

//仮保存されたファイル名で画像ファイルを取得(サーバへ仮アップロードされたディレクトリとファイル名)
$temp_pick_name = $_FILES['picture']['tmp_name'];

//元のファイル名で画像ファイルを取得。事前に画像を格納する[image]という名前のフォルダを作成しておく必要がある。
$original_pic_name = $_FILES['picture']['name'];
$path_filename = './image/'.$original_pic_name;

//仮保存のファイル名を、imageフォルダに、元のファイル名で移動させる。
move_uploaded_file($temp_pick_name,'./image/'.$original_pic_name);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="./css/register_confirm.css" />
</head>
<body>
    <header>
        <img src="./img/4eachblog_logo.jpg" alt="4eachのロゴ">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>

    <main>
            <div class="form_contents">
                <h2>会員登録 確認</h2>
                <p class="">こちらの内容で登録しても宜しいでしょうか？</p>
                <div class="name">
                <label>氏名 : <?php echo $_POST['name']?></label>
                </div>
                <div class="mail">
                <label>メール : <?php echo $_POST['mail']?></label>
                </div>
                <div class="password">
                <label>パスワード : <?php echo $_POST['password']?></label>
                </div>
                <div class="picture">
                <label>プロフィール写真 : <?php echo $original_pic_name = $_FILES['picture']['name']; ?></label>
                </div>
                <div class="comments">
                <label>コメント : <?php echo $_POST['comments']?></label>
                </div>
                <div class="toroku">
                    <!-- 編集ボタン -->
                    <form action="register.php" method="post">
                        <input type="submit" class="submit_button1" size="35" value="戻って修正する">
                    </form>
                    <!-- 登録ボタン(改めてregister.phpの内容をinsertへ送る) -->
                    <form action="register_insert.php" method="post">
                        <input type="submit" class="submit_button2" size="35" value="登録する">
                        <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
                        <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                        <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
                        <input type="hidden" value="<?php echo $original_pic_name = $_FILES['picture']['name']; ?>" name="picture">
                        <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments">
                    </form>
                </div>
            </div>
    </main>

    <footer>
        ©︎ 2018 InterNous.inc.All rights reserved
    </footer>

    
</body>
</html>