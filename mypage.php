<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])){

try {
    //try catch文。DBに接続できなければエラーメッセージを表示。
    $pdo = new PDO("mysql:dbname=contactform;host=localhost;","root","root");
} catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスができません。<br>しばらくしてから再度ログインをしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>");
}

//preparedでSQL文の型を作る
$stmt = $pdo->prepare('SELECT * FROM login_mypage WHERE mail=? && password=?');

//bindValueメソッドでパラメーターをセット
$stmt->bindValue(1,$_POST['mail']);
$stmt->bindValue(2,$_POST['password']);

//executeでクエリを実行
$stmt->execute();

//DBを切断
$pdo = NULL;

//fetch.while文でデータを取得し、sessionに代入
if($row = $stmt->fetch()){
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['picture'] = $row['picture'];
    $_SESSION['comments'] = $row['comments'];
}

//データが取得できずに(emptyを使用して判定)、sessionがなければリダイレクト(エラー画面へ)
if(empty($_SESSION['id'])){
        header("Location:login_error.php");
  }
}

setcookie('mail',$_SESSION['mail'],time()+60*60*24*7,'/');
setcookie('password',$_SESSION['password'],time()+60*60*24*7,'/');

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="./css/mypage.css" />
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
                <div class="profile">
                   <dvi class="profile_left">
                       <img src="./image/<?php echo $_SESSION['picture']; ?>" alt="プロフィール写真" width="200" height="200">
                   </dvi>
                   <div class="profile_right">
                       <div class="name">
                       <p>氏名 : <?php echo $_SESSION['name']; ?></p>
                       </div>
                       <div class="mail">
                       <p>メール : <?php echo $_SESSION['mail']; ?></p>
                       </div>
                       <div class="password">
                       <p>パスワード : <?php echo $_SESSION['password']; ?></p>
                       </div>
                   </div>
                </div>
                <div class="profile_bottom">
                   <div class="comments">
                       <p><?php echo $_SESSION['comments']; ?></p>
                   </div>
                   <!-- 編集ボタン -->
                   <form action="mypage_hensyu.php" method="post" class="form_center">
                       <input type="hidden" value="<?php echo rand(1,10); ?>" name="from_mypage">
                       <input type="submit" class="submit_button1" size="35" value="編集する">
                   </form>
               </div>
    </main>

    <footer>
        ©︎ 2018 InterNous.inc.All rights reserved
    </footer>

    
</body>
</html>