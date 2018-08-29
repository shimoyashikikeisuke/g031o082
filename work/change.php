<!DOCTYPE HTML>
<html>
<herd>
<meta charset=UFT-8>
<link href="css.css" rel="stylesheet" type="text/css">
<title>変更フォーム</title>
</head>
<body>

<?php

  try{ //データベース接続
    $pdo = new PDO('mysql:host=localhost;dbname=g031o082;charset=utf8','test','enzyl68x',
    array(PDO::ATTR_EMULATE_PREPARES => false));
    if (!empty($_POST["bbd_id2"]) && !empty($_POST["change_pass"])) { //bbd_idとpasswordが入力されている場合
      $bbd_id2 = htmlspecialchars($_POST["bbd_id2"],ENT_QUOTES); //入力したユーザー名を格納
      $change_pass = htmlspecialchars($_POST['change_pass'],ENT_QUOTES); //入力したパスワードを格納
      $result = $pdo->query("SELECT * FROM message"); //message内を参照
      foreach ($result as $row) {
        $bbd_id = htmlspecialchars($row['bbd_id'],ENT_QUOTES); //データベース内のbbd_idを取り出す
        $password = htmlspecialchars($row['password'],ENT_QUOTES); //データベース内のpasswordを取り出す
        if (($bbd_id2 == $bbd_id) && ($change_pass == $password)){ //一致した場合の処理
          $muscle_level=htmlspecialchars($_POST['muscle_level'],ENT_QUOTES);
          $muscle_genre=htmlspecialchars($_POST['muscle_genre'],ENT_QUOTES);
          $messages=htmlspecialchars($_POST['messages'],ENT_QUOTES);
          $bbd_id2 = htmlspecialchars($_POST['bbd_id2'],ENT_QUOTES);

          //$changeでUPDATE処理
          $change = 'UPDATE message SET muscle_level = :muscle_level,muscle_genre = :muscle_genre,messages = :messages WHERE bbd_id = :bbd_id2';
          $stmt = $pdo -> prepare($change);
          $stmt->bindValue(':muscle_level',$muscle_level,PDO::PARAM_INT);
          $stmt->bindValue(':muscle_genre',$muscle_genre,PDO::PARAM_INT);
          $stmt->bindParam(':messages',$messages,PDO::PARAM_STR);
          $stmt->bindValue(':bbd_id2',$bbd_id2,PDO::PARAM_INT);
          $stmt->execute();
          $dbh = null;
          echo '<script> alert("編集が完了しました。"); location.href="muscle_bbd.php"; </script>';
        }
      }
    }
  } catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
  }
?>
<!DOCTYPE html>
<html lang = "ja">
<head>
  <meta charset = "UFT-8">
  <title>筋肉掲示板</title>
</head>
<body>
    <h1 class = "home_title">編集フォーム</h1>
  <form method = "POST" action = "">
    <div class = "box">
    <div class = "moji">編集したいNo.  <input type="text" name="bbd_id2" size="20"maxlength="15"></div><br>

  <div class = "moji">
  	筋トレレベル:<br />
    <div class = "level">
    <select name="muscle_level" >
      <option value="">選択してください</option>
      <option value="1">初級</option>
      <option value="2">中級</option>
      <option value="3">上級</option>
    </select></div></div>
    <br><br><br><br>

  <div class = moji>
  	ジャンル:<br />
    <div class = "genre">
    <select name="muscle_genre">
      <option value="">選択してください</option>
      <option value="1">自慢</option>
      <option value="2">相談</option>
      <option value="3">お誘い</option>
      <option value="4">その他</option>
    </select></div></div>
    <br><br><br><br>

  <div class = "moji">
  	メッセージ:<br />
  	<textarea name="messages" cols="50" rows="5"></textarea>
  </div><br>

  <div class = "moji">
    削除・変更用パスワード:<br />
      <input type="password"maxlength="4" name="change_pass" value="" placeholder="英数字４文字">
  </div>
  	<input id="register" type = "submit" name = "change"value = "登録" />
  </div>
  </form>
     <input id ="back_button1" type="button" onclick="location.href='muscle_bbd.php'" value="戻る" />
</body>
</html>
