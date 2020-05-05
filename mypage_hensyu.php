<?php
mb_internal_encoding("utf8");
session_start();

//mypage.phpからの導線以外は「login_error.phpへリダイレクト」
if(empty($_SESSION['id'])){
    header("Location:login_error.php");
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="./css/mypage_hensyu.css" />
</head>
<body>
    <header>
        <img src="./img/4eachblog_logo.jpg" alt="4eachのロゴ">
    </header>

    <main>
        <div class="form_contents">
            <h2>会員情報</h2>
            <a href="log_out.php" class="logout">ログアウト</a>
            <p><?php echo "こんにちは！ ".$_SESSION['name']."さん"; ?></p>

            <form action="mypage_update.php" method="post">
                <div class="profile">
                    <dvi class="profile_left">
                        <img src="./image/<?php echo $_SESSION['picture']; ?>" alt="プロフィール写真" width="200" height="200">
                    </dvi>
                    <div class="profile_right">
                        <div class="name">
                            <label>氏名 : <input class="formbox" type="text" size="40" name="name" value="<?php echo $_SESSION['name']; ?>" required></label>
                        </div>
                        <div class="mail">
                            <label>メール : <input class="formbox" type="text" size="40" name="mail" value="<?php echo $_SESSION['mail']; ?>" pattern="^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$" required></label>
                        </div>
                        <div class="password">
                            <label>パスワード : <input class="formbox" type="text" size="40" name="password" value="<?php echo $_SESSION['password']; ?>" pattern="^[a-zA-Z0-9]{6,}$" required></label>
                        </div>
                   </div>
                </div>
                <div class="profile_bottom">
                    <div class="comments">
                        <label><textarea class="formbox" name="comments" cols="45" rows="4" value=""><?php echo $_SESSION['comments']; ?></textarea></label>
                    </div>
                    <!-- 編集ボタン -->
                        <input type="submit" class="submit_button1" size="35" value="この内容に変更する">
               </div>
            </from>
        </div>
    </main>

    <footer>
        ©︎ 2018 InterNous.inc.All rights reserved
    </footer>

    
</body>
</html>