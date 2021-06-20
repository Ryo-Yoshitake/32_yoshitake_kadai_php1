<?php
// Postデータ取得
$name = $_POST["name"];
$mail = $_POST["mail"];
$nenrei = $_POST["nenrei"];
$youbou = $_POST["youbou"];

// DB接続
try{
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

// データ登録SQL作成
$sql = "INSERT INTO gs_kadai_table (name, mail, nenrei, youbou, indate)
VALUES(:a1, :a2, :a3, :a4, sysdate())";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $mail, PDO::PARAM_STR);
$stmt->bindValue(':a3', $nenrei, PDO::PARAM_INT);
$stmt->bindValue(':a4', $youbou, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if($status==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: read.php");
    exit;
}

?>