<?php
function h($val){
    return htmlspecialchars($val,ENT_QUOTES);
}

// ファイルを変数に格納
$filename = 'data.csv';

// fopenでファイルを開く（'r'は読み込みモードで開く）
$fp = fopen($filename, 'r');

//テーブルタグを作成し、テーブルヘッダーで見出しを作る
echo '<table border="1">
    <tr>
    <th>日時</th>
    <th>名前</th>
    <th>メールアドレス</th>
    <th>年齢</th>
    <th>コメント</th>
    </tr>';

// while分でCSVファイルのデータを1つずつ繰り返し読み込む
while($data = fgetcsv($fp)){

    // テーブルセルに配列の値を格納
    echo '<tr>';
    echo '<td>'.$data[0].'</td>';
    echo '<td>'.$data[1].'</td>';
    echo '<td>'.$data[2].'</td>';
    echo '<td>'.$data[3].'</td>';
    echo '<td>'.$data[4].'</td>';


// テーブルの閉じタグ
echo '</table>';

// // whileで行末までループ処理
// while (!feof($fp)) {
 
//     // fgetsでファイルを読み込み、変数に格納
//     $txt = fgets($fp);
   
//     // ファイルを読み込んだ変数を出力
//     echo h($txt).'<br>';
   
}
 
// fcloseでファイルを閉じる
fclose($fp);

?>