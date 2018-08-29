<!DOCTYPE HTML>
<html>
<herd>
<meta http-equiv="Content-Type" content="text/html;charset=UFT-8">
<link href="css.css" rel="stylesheet" type="text/css">
<script>
function imgSize(obj,w,h)
{
   obj.width=w;
   obj.height=h;
}
//--></script>
<title>投稿一覧</title>
</head>

<body>
 <h1 class = "home_title">筋肉掲示板</h1>

<?php
  $db_user = 'test';     // ユーザー名
  $db_pass = 'enzyl68x'; // パスワード
  $db_name = 'g031o082';     // データベース名

  // MySQLに接続
  $mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name);
  $mysqli->set_charset("utf8");

  //データベース接続におけるエラー処理
  if ($mysqli->connect_errno) {
    printf("%s\n", $mysqli->connect_errno);
    exit();
  }
    //messageテーブルとimageテーブルを内部結合し上から順に表示する
  $result = $mysqli->query("SELECT message.bbd_id,message.name,message.muscle_level,message.muscle_genre,
                             message.created,message.messages,image.file,message.password from message INNER JOIN image ON
                             message.bbd_id = image.bbd_id ORDER BY created DESC");

  // SELECT文におけるエラー処理
  if (!$result) {
    printf("%s\n", $mysqli->error);
    exit();
  }

  foreach ($result as $row) { //データベースに格納されている分だけ表示する

    $bbd_id = htmlspecialchars($row['bbd_id'], ENT_QUOTES); //投稿番号
    $name = htmlspecialchars($row['name'], ENT_QUOTES); //ユーザー名
    $muscle_level = htmlspecialchars($row['muscle_level'], ENT_QUOTES); //筋肉レベル
    $muscle_genre = htmlspecialchars($row['muscle_genre'], ENT_QUOTES); //ジャンル
    $created = htmlspecialchars($row['created'], ENT_QUOTES); //投稿時間
    $messages = nl2br(htmlspecialchars($row['messages'], ENT_QUOTES)); //コメント
    $file = $row['file']; //画像ファイル
    $password = htmlspecialchars($row['password'], ENT_QUOTES); //削除・変更するときに使用するパスワード

    echo "<div class = bbd> [No. ". $bbd_id . " ]" . "$name";
    if ($muscle_level == 1) { //muscle_levelの各数字によって表示する文字を変える
      echo ' 初級';
    } else if ($muscle_level == 2) {
      echo ' 中級';
    } else {
      echo ' 上級';
    } " ";

    if ($muscle_genre == 1) { //muscle_genreの各数字によって表示する文字を変える
      echo ' 自慢';
    } else if ($muscle_genre == 2) {
      echo ' 相談';
    } else if ($muscle_genre == 3){
      echo ' お誘い';
    } else {
      echo ' その他';
    } " ";

    echo " " . $created. "<br>";
    echo "<font size= 5><b>".$messages."</b><br></font>";
    if ($row['file'] != NULL) { //画像が添付されてきた場合
      $imgType = "image/png";
      //表示されている画像にマウスを乗せると画像が拡大する処理をJavaScriptによって実行
      $img = '<img id = "file1" src="data:'.$imgType.';base64,'.base64_encode($file).'" onMousemove="imgSize(this,400,400)" onMouseout="imgSize(this,200,200)" width = "200px";height="200px"; /> ';
      echo  $img . "</div><br>"; //画像
    }
  }

  if (isset($_POST['delete'])) { // 削除ボタンが押され他時の処理
    if (empty($_POST["bbd_id2"])) { //投稿番号が入力されていなかった場合
      echo '<script>alert("ID入力してください");</script>';
    } else if (empty($_POST["delete_pass"])) { //削除・変更パスワードが入力されていなかった場合
      echo '<script>alert("パスワードを入力してください");</script>';
    }

    if (!empty($_POST["bbd_id2"]) && !empty($_POST["delete_pass"])) { //bbd_idとpasswordが入力されている場合

      foreach ($result as $row1) { //データベースに格納されている分だけ表示する
        $bbd_id = htmlspecialchars($row1['bbd_id'], ENT_QUOTES); //投稿番号
        $password = htmlspecialchars($row1['password'], ENT_QUOTES); //削除・変更するときに使用するパスワード
        $bbd_id2 = $mysqli->real_escape_string($_POST["bbd_id2"]); //入力したユーザー名を格納
        $delete_pass = $mysqli->real_escape_string($_POST['delete_pass']); //入力した削除・変更パスワードを格納

        if (($bbd_id2 == $bbd_id) && ($delete_pass == $password)) {
          /*データベース内の投稿ID・パスワードが入力した投稿、削除・変更パスワードと一致した場合、
            指定したmessageテーブル、imageテーブルの中身をを削除する*/
            $delete = $mysqli->query("DELETE message,image FROM message INNER JOIN image on message.bbd_id = image.bbd_id
                                      WHERE message.bbd_id = $bbd_id2");
            $delete_count = $mysqli->affected_rows; // sql文によってdeleteされた件数を取得する
        }
        if($delete_count >= 1){ // 1件以上の場合
           print '<script> alert("削除完了！"); location.href = "muscle_bbd.php"; </script>';
        } else if ($delete_count == 0){
           print '<script> alert("パスワードが違います");location.href = "muscle_bbd.php"; </script>';
           // delete文におけるエラー処理
        } else {
           printf("%s\n", $mysqli->error);
           exit();
        }
      }
    }
  }
?>

  <input id ="toukou" type="button" onclick="location.href='form.php'" value="投稿する" />
  <input id ="change_button" type = "button" onclick="location.href='change.php'" value = "編集画面へ" />

  <form method = "POST" enctype="multipart/form-data" action = "muscle_bbd.php">
  <div class = "sakujo">削除したいNo:<input type="text" name="bbd_id2" size="20"maxlength="15"><br>
    削除・変更パスワード:<input type="password" name ="delete_pass"maxlength="4"value="" placeholder="英数字４文字"><br>
    <input id = "sakujo_button" type = "submit" name = "delete"value = "削除" /><br>
  </div>
  </form><br>
   <input id ="home_button" type="button" onclick="location.href='home.php'" value="HOME" />
 </body>
</html>
