 <?php
 try { //PDOを用いてデータベースに接続
  $pdo = new PDO('mysql:host=localhost;dbname=g031o082;charset=utf8','test','enzyl68x',
  array(PDO::ATTR_EMULATE_PREPARES => false));

    $dbh = null;
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
    <h1>筋肉掲示板</h1>
  <form method = "POST" action = "muscle_bbd.php">
  <div>
    ニックネーム:<br />
    <input type="text" name="name" size="20"maxlength="15"><br><br>
  	筋トレレベル:<br />
    <select name="muscle_level" >
      <option value="">選択してください</option>
      <option value="1">初級</option>
      <option value="2">中級</option>
      <option value="3">上級</option>
    </select>
  </div><div>
  	ジャンル:<br />
    <select name="muscle_genre">
      <option value="">選択してください</option>
      <option value="1">自慢</option>
      <option value="2">相談</option>
      <option value="3">その他</option>
    </select>

  </div><div>
  	メッセージ:<br />
  	<textarea name="messages" cols="50" rows="5"></textarea>
  </div><div>
  	<input type = "submit" value = "登録" />
    </form>


 </body>
</html>
