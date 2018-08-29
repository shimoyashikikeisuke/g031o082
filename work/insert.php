<?php
// セッション開始
  $db['host'] = 'localhost';
  $db['user'] = 'test';
  $db['pass'] = 'enzyl68x';
  $db['dbname'] = 'g031o082';

  if (isset($_POST['signUp'])) { // ログインボタンが押されたら
    if (empty($_POST["name"])) { //nameが空らの時
      echo '<script> alert("ユーザー名を入力してください");location.href="insert.php";</script>';
    } else if (empty($_POST["password"])) { //passwordが空の時
      echo '<script> alert("パスワードを入力してください");location.href="insert.php";</script>';
    }

    if (!empty($_POST['name']) && !empty($_POST['password'])) { //ユーザー名とパスワードが入力されていた場合
      $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
      $password = htmlspecialchars($_POST['password'],ENT_QUOTES);
      $dsn = sprintf('mysql: host=localhost; dbname=g031o082; charset=utf8', $db['host'], $db['dbname']);

      try{
        $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)); //データベースに接続
        if($name == $password){ //ユーザー名とパスワードが同名になるのを防ぐ処理
          echo '<script> alert("ユーザー名とパスワードを同じにするのは危険です！再度入力しなおしてください！");location.href="insert.php";</script>';
        } else if($name != $password){
          $stmt = $pdo->prepare("INSERT INTO user(name, password) VALUES (?, ?)");
          $stmt->execute(array($name, password_hash($password, PASSWORD_DEFAULT)));  // パスワードのハッシュ化を行う
          $name = $pdo->lastinsertid();
          echo '<script> alert("登録が完了しました。");
                     location.href="login.php";
                </script>';
        }
      } catch(Exception $e){
        $error = $e->getMessage();
      }
    } else if($_POST["password"] ) {
        echo'パスワードに誤りがあります。';
    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <link href="css.css" rel="stylesheet" type="text/css">
    <center><title>新規登録</title></center>
  </head>
<body>
  <main>
    <form action="" method="POST">
      <center><label for="name">ユーザー名<br>
        <input type="text" name="name"  value="">
      </label></center><br>
      <center><label for="password">パスワード<br>
        <center><input type="password" name="password" value="" ></center><br><br>
      </label>
      <center><input type="submit"  name="signUp" value="新規登録" ></center>
    </form>
  </main>
</body>
</html>
