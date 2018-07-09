<?php
// セッション開始

session_start();

    $db['host'] = 'localhost';
    $db['user'] = 'test';
    $db['pass'] = 'enzyl68x';
    $db['dbname'] = 'g031o082';

    if (isset($_POST['signUp'])) { // ログインボタンが押されたら
        if (empty($_POST["name"])) { //nameが空らの時
          echo 'ユーザー名が未入力です';
        } else if (empty($_POST["password"])) { //passwordが空の時
          echo 'パスワードが未入力です';
        }

          if (!empty($_POST['name']) && !empty($_POST['password'])) {
              $name = $_POST['name'];
              $password = $_POST['password'];
              $dsn = sprintf('mysql: host=localhost; dbname=g031o082; charset=utf8', $db['host'], $db['dbname']);

              try{
                  $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                  if($name == $password){
                    echo '<script> alert("ユーザー名とパスワードを同じにするのは危険です！再度入力しなおしてください！");location.href="insert.php";</script>';
                  } else if($name != $password){
                  $stmt = $pdo->prepare("INSERT INTO user(name, password) VALUES (?, ?)");
                  $stmt->execute(array($name, password_hash($password, PASSWORD_DEFAULT)));  // パスワードのハッシュ化を行う（今回は文字列のみなのでbindValue(変数の内容が変わらない)を使用せず、直接excuteに渡しても問題ない）
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
    <title>新規登録</title>
  </head>
<body>
  <main>
    <form action="" method="POST">
      <label for="name">ユーザー名<br>
        <input type="text" name="name"  value="">
      </label><br>
      <label for="password">パスワード<br>
        <input type="password" name="password" value="" >
      </label>
      <input type="submit"  name="signUp" value="新規登録" >
    </form>
  </main>
</body>
</html>
