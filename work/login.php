<?php

  session_start();//セッション開始

  $db['host'] = "localhost";  // DBサーバのURL
  $db['user'] = "test";  // ユーザー名
  $db['pass'] = "enzyl68x";  // ユーザー名のパスワード
  $db['dbname'] = "g031o082";  // データベース名

  if (isset($_POST["login"])) { //ログインボタンを押されたとき
    if (empty($_POST["name"])) { //nameが空らの時
      echo'alert("ユーザー名が入力されていません");';
    } else if (empty($_POST["password"])) { //passwordが空の時
      echo'alert("パスワードが入力されていません");';
    }

    if (!empty($_POST["name"]) && !empty($_POST["password"])) { //nameとpasswordが入力されている場合
      $name =htmlspecialchars($_POST["name"],ENT_QUOTES); //入力したユーザー名を格納

      try { //データベース接続
        $pdo = new PDO('mysql:host=localhost;dbname=g031o082;charset=utf8','test','enzyl68x',
        array(PDO::ATTR_EMULATE_PREPARES => false));

        $stmt = $pdo->prepare("SELECT * FROM user WHERE name = ?"); //userテーブル内のnameを検索
        $stmt->execute(array($name));
        $password = htmlspecialchars($_POST["password"],ENT_QUOTES); //入力したパスワードを格納

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { //
          if (password_verify($password, $row['password'])) { //パスワードが一致したとき
            session_regenerate_id(true);
            $_SESSION["name"] = $row["name"];
            header("Location:home.php");  // メイン画面へ遷移
            exit();  // 処理終了
          } else {  // 認証失敗
            echo'<script> alert("ユーザー名あるいはパスワードに誤りがあります");</script>';
          }
        }

      } catch (PDOException $e) {
          $errorMessage = 'データベースエラー';
      }
    }
  }
?>

<!DOCTYPE html>
<html lang = "ja">
<html>
    <head>
      <meta charset="UTF-8">
      <link href="css.css" rel="stylesheet" type="text/css">
      <title>ログイン</title>
    </head>
    <body>
      <center><div class = "login"><h1>ログイン画面</h1></div></center>
      <form method="POST" action="" >
        <fieldset>
          <center>ユーザー名<input type="text"  name="name" ></center><br>
          <center>パスワード<input type="password"  name="password" ></center><br><br>
          <center><input type="submit"  name="login" value="ログイン"></center>
        </fieldset>
      </form>
      <br>
      <form action="insert.php">
          <fieldset>
              <center><legend>新規登録フォーム</legend>
              <input type="submit" value="新規登録"></center>
          </fieldset>
      </form>
    </body>
</html>
