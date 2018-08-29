<!DOCTYPE html>
  <html lang = "ja">
  <head>
    <meta charset = "UTF-8">
    <link href="css.css" rel="stylesheet" type="text/css">
    <title>脚筋メニュー一覧</title>
  </head>
         <center><h1> 脚筋 </h1></center>
  <body>
<?php
  try { //PDOを用いてデータベースに接続
      $pdo = new PDO('mysql:host=localhost;dbname=g031o082;charset=utf8','test','enzyl68x',
      array(PDO::ATTR_EMULATE_PREPARES => false));

      //スクワット
      if (isset ($_POST['id_1']) || isset($_POST['conp1'])) { //id_1またはconp1を選択したとき
        $stmt = $pdo->query("SELECT * FROM leg_muscle where leg_id = 1"); //arm_idが１のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo  '<div class = title>' . $row['leg_title'] . '</div>';
          echo '<br><br><br>';
          echo  '<div class = description>' . $row['description'] . '</div><br><br>';?>
          <div style ="position:absolute;top:500px;left:20px;"><img src = "https://toremo.jp/wp/wp-content/uploads/2017/11/b504bdeae13aba30f96e51a2aae4b886.jpeg" width="500px" height="400px" ></div>
<?php   } ?>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h2>コメント一覧</h2>
<?php
        if (isset($_POST['conp1'])) { //投稿ボタンを押した時の処理
          if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
          }
          if (!empty($_POST["comment"])){
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (36,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了！");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 36  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
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

      //シシースクワット
      if (isset ($_POST['id_2']) || isset($_POST['conp2'])) { //id_1またはconp1を選択したとき
        $stmt = $pdo->query("SELECT * FROM leg_muscle where leg_id = 2"); //arm_idが１のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo  '<div class = title>' . $row['leg_title'] . '</div>';
          echo '<br><br><br>';
          echo  '<div class = description>' . $row['description'] . '</div><br><br>';?>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/cCgMDFW6j5w" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php   } ?>

        <br><br><br>
        <h2>コメント一覧</h2>
<?php
        if (isset($_POST['conp2'])) { //投稿ボタンを押した時の処理
          if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
          }
          if (!empty($_POST["comment"])){
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (37,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了！");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 37  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
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

      //ランジ
      if (isset ($_POST['id_3']) || isset($_POST['conp3'])) { //id_1またはconp1を選択したとき
        $stmt = $pdo->query("SELECT * FROM leg_muscle where leg_id = 3"); //arm_idが１のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo  '<div class = title>' . $row['leg_title'] . '</div>';
          echo '<br><br><br>';
          echo  '<div class = description>' . $row['description'] . '</div><br><br>';?>
          <div style ="position:absolute;top:160px;right:20px;"><img src = "http://www.meiji.co.jp/sports/savas/lecture/images/training/e1/img_training_e1_06.gif" width="420px" height="400px" ></div>
<?php   } ?>

        <br><br><br>
        <h2>コメント一覧</h2>
<?php
        if (isset($_POST['conp3'])) { //投稿ボタンを押した時の処理
          if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
          }
          if (!empty($_POST["comment"])){
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (38,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了！");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 38  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
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

      //レッグエクステンション
      if (isset ($_POST['id2_1']) || isset($_POST['conp2_1'])) { //id_1またはconp1を選択したとき
        $stmt = $pdo->query("SELECT * FROM leg_muscle2 where leg_id2 = 1"); //arm_idが１のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo  '<div class = title>' . $row['leg_title2'] . '</div>';
          echo '<br><br><br>';
          echo  '<div class = description>' . $row['description2'] . '</div><br><br>';?>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/1G1W3IbzfAA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php   } ?>

        <br><br><br>
        <h2>コメント一覧</h2>
<?php
        if (isset($_POST['conp2_1'])) { //投稿ボタンを押した時の処理
          if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
          }
          if (!empty($_POST["comment"])){
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (39,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了！");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 39  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
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

      //アダクション
      if (isset ($_POST['id2_2']) || isset($_POST['conp2_2'])) { //id_1またはconp1を選択したとき
        $stmt = $pdo->query("SELECT * FROM leg_muscle2 where leg_id2 = 2"); //arm_idが１のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo  '<div class = title>' . $row['leg_title2'] . '</div>';
          echo '<br><br><br>';
          echo  '<div class = description>' . $row['description2'] . '</div><br><br>';?>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/AkG4c4ISknM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php   } ?>

        <br><br><br>
        <h2>コメント一覧</h2>
<?php
        if (isset($_POST['conp2_2'])) { //投稿ボタンを押した時の処理
          if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
          }
          if (!empty($_POST["comment"])){
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (40,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了！");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 40  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
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

      //レッグプレス
      if (isset ($_POST['id2_3']) || isset($_POST['conp2_3'])) { //id_1またはconp1を選択したとき
        $stmt = $pdo->query("SELECT * FROM leg_muscle2 where leg_id2 = 3"); //arm_idが１のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo  '<div class = title>' . $row['leg_title2'] . '</div>';
          echo '<br><br><br>';
          echo  '<div class = description>' . $row['description2'] . '</div><br><br>';?>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/HioqIwTYVr8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php   } ?>

        <br><br><br>
        <h2>コメント一覧</h2>
<?php
        if (isset($_POST['conp2_3'])) { //投稿ボタンを押した時の処理
          if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
          }
          if (!empty($_POST["comment"])){
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (41,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了！");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 41  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
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

      //レッグカール
      if (isset ($_POST['id2_4']) || isset($_POST['conp2_4'])) { //id_1またはconp1を選択したとき
        $stmt = $pdo->query("SELECT * FROM leg_muscle2 where leg_id2 = 4"); //arm_idが１のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo  '<div class = title>' . $row['leg_title2'] . '</div>';
          echo '<br><br><br>';
          echo  '<div class = description>' . $row['description2'] . '</div><br><br>';?>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/oSPZNE9Jkx8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php   } ?>

        <br><br><br>
        <h2>コメント一覧</h2>
<?php
        if (isset($_POST['conp2_4'])) { //投稿ボタンを押した時の処理
          if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
          }
          if (!empty($_POST["comment"])){
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (42,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了！");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 42  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
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
    <input type="button" onclick="location.href='leg_home.php'" value="戻る" />
  </body>
</html>
