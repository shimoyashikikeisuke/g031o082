 <?php

  session_start();//セッション開始

  $db_user = 'test';     // ユーザー名
  $db_pass = 'enzyl68x'; // パスワード
  $db_name = 'g031o082';     // データベース名
  // MySQLに接続
  $mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name);
  //データベース接続におけるエラー処理
  if ($mysqli->connect_errno) {
    printf("%s\n", $mysqli->connect_errno);
    exit();
  }

     if (isset($_POST["register"])) { //登録ボタンを押されたときの処理
       if (empty($_POST["name"])) {
         echo '<script>alert("名前を入力してください");</script>';
       } else if (empty($_POST["muscle_level"]) && empty($_POST["muscle_genre"])) {
         echo '<script>alert("レベルまたはジャンルを入力してください");</script>';
       } else if (empty($_POST["messages"])) {
         echo '<script>alert("投稿文を入力してください");</script>';
       } else if (empty($_POST["password"])){
         '<script>alert("削除・変更用パスワードを入力してください");</script>';
       }

          //各項目が入力されている場合
         if ((!empty($_POST['name']) && !empty($_POST['muscle_level'])) && (!empty($_POST['muscle_genre']) && !empty($_POST['messages']) && !empty($_POST['password']))) {
              //XSSの対策
             $name = $mysqli->real_escape_string($_POST['name']);
             $muscle_level = $mysqli->real_escape_string($_POST['muscle_level']);
             $muscle_genre = $mysqli->real_escape_string($_POST['muscle_genre']);
             $messages = $mysqli->real_escape_string($_POST['messages']);
             $password = $mysqli->real_escape_string ($_POST['password']); //削除・変更するときに使用するパスワード
             //INSERTでデータをデータベースに挿入
             $insert = $mysqli->query("INSERT INTO `message` ( `name`, `muscle_level`, `muscle_genre`, `messages`, `password`,`created`) VALUES ('{$name}', '{$muscle_level}', '{$muscle_genre}', '{$messages}', '{$password}', now())");
             if (!$insert) { // insert文におけるエラー処理
               printf("%s\n", $mysqli->error);
               exit();
             }
             echo '<script> alert("登録が完了しました。"); location.href="muscle_bbd.php"; </script>';
          }
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
  <form method = "POST" action = "">
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
    削除・変更用パスワード:<br />
      <input type="password"maxlength="4" name="password" value="" placeholder="数字４文字">
  </div><div>

  	<input type = "submit" name = "register"value = "登録" />
    <ul>
      <li><a href="muscle_bbd.php">一覧表示</a></li>
    </ul>
    </form>
 </body>
</html>
