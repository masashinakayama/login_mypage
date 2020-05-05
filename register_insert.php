<?php
mb_internal_encoding("utf8");

//DB接続
$pdo = new PDO("mysql:dbname=contactform;host=localhost;","root","root");

//prepared statementのSQL文を作る
$stmt = $pdo->prepare("INSERT INTO login_mypage(name,mail,password,picture,comments)VALUES(?,?,?,?,?)");

//bindValueを使用し、実際に各カラムに何をinsertするのかを記述
$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['picture']);
$stmt->bindValue(5,$_POST['comments']);

//executeでクエリを実行
$stmt->execute();
$pdo = NULL;

header('Location:after_register.html');

?>