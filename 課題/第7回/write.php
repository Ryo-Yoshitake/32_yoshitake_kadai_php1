<?php

// Postデータ取得
$name = $_POST["name"];
$mail = $_POST["mail"];
$nenrei = $_POST["nenrei"];
$youbou = $_POST["youbou"];

// 申込時間取得
$date = date("Y/m/d H:i:s");

// ファイルに書き込む配列を定義
$ary = array(
    array("$date", "$name", "$mail", "$nenrei", "$youbou")
);

// // DB接続
// try{
//     $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
// } catch (PDOException $e) {
//     exit('DbConnectError:'.$e->getMessage());
// }

// // データ登録SQL作成
// $sql = "INSERT INTO gs_kadai_table (name, mail, nenrei, youbou, indate)
// VALUES(:a1, :a2, :a3, :a4, sysdate())";

// $stmt = $pdo->prepare($sql);

// $stmt->bindValue(':a1', $name, PDO::PARAM_STR);
// $stmt->bindValue(':a2', $mail, PDO::PARAM_STR);
// $stmt->bindValue(':a3', $nenrei, PDO::PARAM_INT);
// $stmt->bindValue(':a4', $youbou, PDO::PARAM_STR);
// $status = $stmt->execute();

// // データ登録処理後
// if($status==false){
//     $error = $stmt->errorInfo();
//     exit("QueryError:".$error[2]);
// }else{
//     header("Location: read.php");
//     exit;
// }


// ファイルを読み込む
$file = fopen("data.csv","a");
// ファイルに書き込む
// fwrite($file,$date.",".$name.",".$mail.",".$nenrei.",".$youbou."\n");
foreach($ary as $line){
    fputcsv($filw,$line);
};

// ,$date." ".$name." ".$mail." ".$nenrei." ".$youbou."\n");

// ファイルを閉じる
fclose($file);

// read.phpにリダイレクト
header("Location: read.php");
exit();

?>


