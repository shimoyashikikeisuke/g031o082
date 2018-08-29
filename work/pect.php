<!DOCTYPE html>
  <html lang = "ja">
  <head>
    <meta charset = "UTF-8">
    <link href="css.css" rel="stylesheet" type="text/css">
    <title>胸筋メニュー一覧</title>
  </head>
         <center><h1> 胸筋 </h1></center>
  <body>
<?php

  try { //PDOを用いてデータベースに接続
    $pdo = new PDO('mysql:host=localhost;dbname=g031o082;charset=utf8','test','enzyl68x',
    array(PDO::ATTR_EMULATE_PREPARES => false));

    // インラインプッシュアップ
    if (isset ($_POST['id_1']) || isset($_POST['conp1'])) {
      $stmt = $pdo->query("SELECT * FROM pect_muscle where pect_id = 1");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo  '<div class = title>' . $row['pect_title']. '</div>';
        echo '<br><br><br>';
        echo  '<div class = description>' .$row['description'] . '</div><br><br>';?>
        <div style ="position:absolute;top:450px;left:20px;"><img src = "http://diet-labo.link/wp-content/uploads/2017/09/1-58-e1504660304609.jpg" width="500px" height="400px" ></div>
<?php }  ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h2>コメント一覧</h2>
<?php
      if (isset($_POST['conp1'])) { //投稿ボタンを押した時の処理
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (21,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了！");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 21  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
      while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = comment>' . $row['comment'] . "</div>  ";
        echo $row['created']. '<br>';
      }
?>
      <form method = "POST" action = "">
        <b>コメント</b><div><br>
          <textarea name="comment" cols="50" rows="5"></textarea>
        </div>
        <input type = "submit" name = "conp1"value = "投稿"/>
      </form>
      <br><br><br>
<?php
    }

    //ナロープッシュアップ
    if (isset ($_POST['id_2']) || isset($_POST['conp2'])) {
      $stmt = $pdo->query("SELECT * FROM pect_muscle where pect_id = 2");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo  '<div class = title>' . $row['pect_title']. '</div>';
        echo '<br><br><br>';
        echo  '<div class = description>' .$row['description'] . '</div><br><br>';?>
        <div style ="position:absolute;top:620px;left:20px;"><img src = "https://fashion-basics.com/wp-content/uploads/2016/12/pushup1.jpg" width="500px" height="400px" ></div>
<?php }  ?>

      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <h2>コメント一覧</h2>
<?php
      if (isset($_POST['conp2'])) { //投稿ボタンを押した時の処理
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (22,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了！");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 22  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
      while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = comment>' . $row['comment'] . "</div>  ";
        echo $row['created']. '<br>';
      }
?>
      <form method = "POST" action = "">
        <b>コメント</b><div><br>
          <textarea name="comment" cols="50" rows="5"></textarea>
        </div>
        <input type = "submit" name = "conp2"value = "投稿"/>
      </form>
      <br><br><br>
<?php
    }

    //ヒンズープッシュアップ
    if (isset ($_POST['id_3']) || isset($_POST['conp3'])) {
      $stmt = $pdo->query("SELECT * FROM pect_muscle where pect_id = 3");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo  '<div class = title>' . $row['pect_title']. '</div>';
        echo '<br><br><br>';
        echo  '<div class = description>' .$row['description'] . '</div><br><br>';?>
        <div style ="position:absolute;top:200px;right:20px;"><img src = "http://the-answers.com/wp-content/uploads/2017/12/hindu-pushup-woman.jpg" width="500px" height="400px" ></div>
<?php }  ?>

      <br><br><br>
      <h2>コメント一覧</h2>
<?php
      if (isset($_POST['conp3'])) { //投稿ボタンを押した時の処理
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (23,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了！");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 23  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
      while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = comment>' . $row['comment'] . "</div>  ";
        echo $row['created']. '<br>';
      }
?>
      <form method = "POST" action = "">
        <b>コメント</b><div><br>
          <textarea name="comment" cols="50" rows="5"></textarea>
        </div>
        <input type = "submit" name = "conp3"value = "投稿"/>
      </form>
      <br><br><br>
<?php
    }

    //ベンチプレス
    if (isset ($_POST['id2_1']) || isset($_POST['conp2_1'])) {
      $stmt = $pdo->query("SELECT * FROM pect_muscle2 where pect_id2 = 1");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo  '<div class = title>' . $row['pect_title2']. '</div>';
        echo '<br><br><br>';
        echo  '<div class = description>' .$row['description2'] . '</div><br><br>';?>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/W36C1YcI1MM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php }  ?>

      <br><br><br>
      <h2>コメント一覧</h2>
<?php
      if (isset($_POST['conp2_1'])) { //投稿ボタンを押した時の処理
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (24,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了！");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 24  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
      while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = comment>' . $row['comment'] . "</div>  ";
        echo $row['created']. '<br>';
      }
?>
      <form method = "POST" action = "">
        <b>コメント</b><div><br>
          <textarea name="comment" cols="50" rows="5"></textarea>
        </div>
        <input type = "submit" name = "conp2_1"value = "投稿"/>
      </form>
      <br><br><br>
<?php
    }

    //ダンベルプルオーバー
    if (isset ($_POST['id2_2']) || isset($_POST['conp2_2'])) {
      $stmt = $pdo->query("SELECT * FROM pect_muscle2 where pect_id2 = 2");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo  '<div class = title>' . $row['pect_title2']. '</div>';
        echo '<br><br><br>';
        echo  '<div class = description>' .$row['description2'] . '</div><br><br>';?>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/d0is_eCnbqw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php }  ?>

      <br><br><br>
      <h2>コメント一覧</h2>
<?php
      if (isset($_POST['conp2_2'])) { //投稿ボタンを押した時の処理
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (25,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了！");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 25  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
      while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = comment>' . $row['comment'] . "</div>  ";
        echo $row['created']. '<br>';
      }
?>
      <form method = "POST" action = "">
        <b>コメント</b><div><br>
          <textarea name="comment" cols="50" rows="5"></textarea>
        </div>
        <input type = "submit" name = "conp2_2"value = "投稿"/>
      </form>
      <br><br><br>
<?php
    }

    //デクラインベンチプレス
    if (isset ($_POST['id2_3']) || isset($_POST['conp2_3'])) {
      $stmt = $pdo->query("SELECT * FROM pect_muscle2 where pect_id2 = 3");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo  '<div class = title>' . $row['pect_title2']. '</div>';
        echo '<br><br><br>';
        echo  '<div class = description>' .$row['description2'] . '</div><br><br>';?>
        <div style ="position:absolute;top:450px;left:20px;"><img src = "https://kintore.fun/wp-content/uploads/2018/03/Dekurainbenchipuresu%EF%BC%91%EF%BC%95.png" width="560px" height="315px" ></div>
<?php }  ?>

      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <h2>コメント一覧</h2>
<?php
      if (isset($_POST['conp2_3'])) { //投稿ボタンを押した時の処理
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (26,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了！");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 26  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
      while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = comment>' . $row['comment'] . "</div>  ";
        echo $row['created']. '<br>';
      }
?>
      <form method = "POST" action = "">
        <b>コメント</b><div><br>
          <textarea name="comment" cols="50" rows="5"></textarea>
        </div>
        <input type = "submit" name = "conp2_3"value = "投稿"/>
      </form>
      <br><br><br>
<?php
    }

    //ダンベルフライ
    if (isset ($_POST['id2_4']) || isset($_POST['conp2_4'])) {
      $stmt = $pdo->query("SELECT * FROM pect_muscle2 where pect_id2 = 4");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo  '<div class = title>' . $row['pect_title2']. '</div>';
        echo '<br><br><br>';
        echo  '<div class = description>' .$row['description2'] . '</div><br><br>';?>
        <div style ="position:absolute;top:450px;left:20px;"><img src = "https://santtie.com/wp-content/uploads/2016/09/b5cf20a3f14551a5c235c861acc08d41-1.jpg" width="560px" height="315px" ></div>
<?php }  ?>

      <br><br><br><br><br><br><br><br><br><br><br><br><br>
      <h2>コメント一覧</h2>
<?php
      if (isset($_POST['conp2_4'])) { //投稿ボタンを押した時の処理
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (27,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了！");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 27  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
      while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = comment>' . $row['comment'] . "</div>  ";
        echo $row['created']. '<br>';
      }
?>
      <form method = "POST" action = "">
        <b>コメント</b><div><br>
          <textarea name="comment" cols="50" rows="5"></textarea>
        </div>
        <input type = "submit" name = "conp2_4"value = "投稿"/>
      </form>
      <br><br><br>
<?php
    }
  } catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
  }
?>
    <input type="button" onclick="location.href='pect_home.php'" value="戻る" />
  </body>
</html>
