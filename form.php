<!DOCTYPE html>
<html lang = "ja">
<head>
  <meta charset = "UFT-8">
  <title>レコード追加画面</title>
</head>
<body>
    <h1>投稿フォーム</h1>
  <form method = "POST" action = "record.php">
  <p>
    ニックネーム:<br />
    <input type="text" name="name"size="20"maxlength="15"><br><br>
  	筋トレレベル:<br />
    <select name="muscle_level">
      <option value="">選択してください</option>
      <option value="1">初級</option>
      <option value="2">中級</option>
      <option value="3">上級</option>
    </select>
  </p><p>
  	ジャンル:<br />
    <select name="muscle_genre">
      <option value="">選択してください</option>
      <option value="1">自慢</option>
      <option value="2">相談</option>
      <option value="3">その他</option>
    </select>

  </p><p>
  	メッセージ:<br />
  	<textarea name="message" cols="50" rows="5"></textarea>
  </p><p>
  	<input type = "submit" value = "登録" />
    </form>
  </body>
</html>

  <?php
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=g031o082;charset=utf8','test','enzyl68x',
      array(PDO::ATTR_EMULATE_PREPARES => false));
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
  ?>
