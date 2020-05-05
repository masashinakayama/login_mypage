<?php
session_start();
if(isset($_SESSION['id'])){
    header('Location:mypage.php');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css" />
</head>
<body>
    <header>
        <img src="./img/4eachblog_logo.jpg" alt="4eachのロゴ">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>

    <main>
        <form action="mypage.php" method="post">
            <div class="form_contents">
                <div class="mail">
                    <label>メールアドレス</label><br>
                    <input type="text" class="formbox" size="40" name="mail" value="<?php setcookie('mail',$_SESSION['mail'],time()+60*60*24*7,'/'); 
                    echo $_COOKIE['mail']; ?>">
                </div>
                <div class="password">
                    <label>パスワード</label><br>
                    <input type="password" class="formbox" size="40" name="password" value="<?php setcookie('password',$_SESSION['password'],time()+60*60*24*7,'/'); 
                    echo $_COOKIE['password']; ?>">
                </div>
                <div class="toroku">
                    <input type="submit" class="submit_button" size="35" value="ログイン">
                </div>
            </div>
        </form>
    </main>

    <footer>
        ©︎ 2018 InterNous.inc.All rights reserved
    </footer>
    
    
</body>
</html>