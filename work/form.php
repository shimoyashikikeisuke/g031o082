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

 if (isset($_POST["register"])) { //登録ボタンを押されたときの処理
   if (empty($_POST["name"])) {
    echo '<script>alert("名前を入力してください");location.href="form.php";</script>';
   } else if (empty($_POST["muscle_level"]) && empty($_POST["muscle_genre"])) {
      echo '<script>alert("レベルまたはジャンルを入力してください");location.href="form.php";</script>';
   } else if (empty($_POST["messages"])) {
      echo '<script>alert("投稿文を入力してください");location.href="form.php";</script>';
   } else if (empty($_POST["password"])){
      echo '<script>alert("削除・変更用パスワードを入力してください");location.href="form.php";</script>';
   }

    //ファイルがアップロードされていない時の処理
    if (!empty($_POST["name"]) && !empty($_POST["muscle_level"]) && !empty($_POST["muscle_genre"]) && !empty($_POST["messages"]) && !empty($_POST["password"])) {
      if (empty($_FILES["upfile"]["tmp_name"])) {
        $file = NULL; //画像ファイルがアップロードされなかった場合データベースにNULLを代入
        $insert = $mysqli->query("INSERT INTO `image` (`file`) VALUES ('{$file}')"); //imageテーブルのinsert処理
        //XSSの対策
        $name = $mysqli->real_escape_string($_POST['name']); //ニックネーム
        $muscle_level = $mysqli->real_escape_string($_POST['muscle_level']); //筋肉レベル
        $muscle_genre = $mysqli->real_escape_string($_POST['muscle_genre']); //ジャンル
        $messages = $mysqli->real_escape_string($_POST['messages']); //コメント
        $password = $mysqli->real_escape_string ($_POST['password']); //削除・変更するときに使用するパスワード
        //INSERTでデータをmessageテーブルに挿入
        $insert = $mysqli->query("INSERT INTO `message` ( `name`, `muscle_level`, `muscle_genre`, `messages` , `password`,`created`) VALUES
                                 ('{$name}', '{$muscle_level}', '{$muscle_genre}', '{$messages}','{$password}', now())");

        if (!$insert) { // insert文におけるエラー処理
          printf("%s\n", $mysqli->error);
          exit();
        }
        echo '<script> alert("登録が完了しました。"); location.href="muscle_bbd.php"; </script>';
      } else if (!empty($_FILES["upfile"]["tmp_name"])) { //画像ファイルがアップロードされた場合の処理

      $name = $mysqli->real_escape_string($_POST['name']); //ニックネーム
      $muscle_level = $mysqli->real_escape_string($_POST['muscle_level']); //筋肉レベル
      $muscle_genre = $mysqli->real_escape_string($_POST['muscle_genre']); //ジャンル
      $messages = $mysqli->real_escape_string($_POST['messages']); //コメント
      $password = $mysqli->real_escape_string ($_POST['password']); //削除・変更するときに使用するパスワード
      $upfile = $_FILES["upfile"]["tmp_name"];
      $file = file_get_contents($upfile);
      $file = $mysqli->real_escape_string($file); //画像ファイルを受け取る
      //画像をDBに格納．
      $insert = $mysqli->query("INSERT INTO `image` (`file`) VALUES ('{$file}')");

      $insert = $mysqli->query("INSERT INTO `message` ( `name`, `muscle_level`, `muscle_genre`, `messages` , `password`,`created`) VALUES
                               ('{$name}', '{$muscle_level}', '{$muscle_genre}', '{$messages}','{$password}', now())");

      if (!$insert) { // insert文におけるエラー処理
        printf("%s\n", $mysqli->error);
        exit();
      }
       echo '<script> alert("登録が完了しました。"); location.href="muscle_bbd.php"; </script>';
      }
    }
  }
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
 <meta charset = "UFT-8">
 <link href="css.css" rel="stylesheet" type="text/css">
 <title>筋肉掲示板</title>
</head>
<body>
   <h1 class = "home_title">筋肉掲示板</h1>
 <form method = "POST" enctype="multipart/form-data" action = "">
<div class = "box">
 <div class = "moji">ニックネーム:<br />
   <input type="text" name="name" size="20"maxlength="15"></div><br>

   <div class = "moji">筋トレレベル:<br />
     <div class = "level">
   <select name="muscle_level" >
     <option value="">選択してください</option>
     <option value="1">初級</option>
     <option value="2">中級</option>
     <option value="3">上級</option>
   </select></div></div>
   <br><br><br><br>

   <div class = "moji">ジャンル:<br />
     <div class = "genre">
   <select name="muscle_genre">
     <option value="">選択してください</option>
     <option value="1">自慢</option>
     <option value="2">相談</option>
     <option value="3">お誘い</option>
     <option value="4">その他</option>
   </select></div></div>
   <br><br><br><br>

   <div class = "moji">メッセージ:<br />
   <textarea name="messages" cols="50" rows="5"></textarea>
   </div><br>

   <div class = "moji">画像<br>
   <input type="file" name='upfile' >
   </div><br><br>

 <div class = "moji">
    削除・変更用パスワード登録:<br />
     <input type="password"maxlength="4" name="password" value="" placeholder="英数字４文字">
 </div>

   <input id = "register" type = "submit" name = "register"value = "登録"/>
 </div>
     <input id ="hyouji" type="button" onclick="location.href='muscle_bbd.php'" value="一覧表示" />
     <input id ="back_button1" type="button" onclick="location.href='home.php'" value="戻る" />
   </form>
</body>
</html>
