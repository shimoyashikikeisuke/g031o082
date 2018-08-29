<!DOCTYPE html>
  <html lang = "ja">
  <head>
    <meta charset = "UTF-8">
      <link href="css.css" rel="stylesheet" type="text/css">
    <title>背筋メニュー一覧</title>
  </head>
         <center><h1> 背筋 </h1></center>
  <body>
<?php
  try { //PDOを用いてデータベースに接続
    $pdo = new PDO('mysql:host=localhost;dbname=g031o082;charset=utf8','test','enzyl68x',
    array(PDO::ATTR_EMULATE_PREPARES => false));

    //懸垂
    if (isset ($_POST['id_1']) || isset($_POST['conp1'])) { //id_1またはconp1を選択したとき
      $stmt = $pdo->query("SELECT * FROM spine_muscle where spine_id = 1"); //arm_idが１のデータを取り出す
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo  '<div class = title>' . $row['spine_title'] . '</div>';
        echo '<br><br><br>';
        echo  '<div class = description>' . $row['description'] . '</div><br><br>';?>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/xo4Lx_UU-Vw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php } ?>

      <br><br><br>
      <h2>コメント一覧</h2>
<?php
      if (isset($_POST['conp1'])) { //投稿ボタンを押した時の処理
        if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (28,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了！");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 28  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
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

      //バックエクステンション
    if (isset ($_POST['id_2']) || isset($_POST['conp2'])) { //id_1またはconp1を選択したとき
      $stmt = $pdo->query("SELECT * FROM spine_muscle where spine_id = 2"); //arm_idが１のデータを取り出す
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo  '<div class = title>' . $row['spine_title'] . '</div>';
        echo '<br><br><br>';
        echo  '<div class = description>' . $row['description'] . '</div><br><br>';?>
        <div style ="position:absolute;top:200px;right:20px;"><img src = "https://beauty-health-training.com/wp-content/uploads/2015/11/%E3%83%90%E3%83%83%E3%82%AF%E3%82%A8%E3%82%AF%E3%82%B9%E3%83%86%E3%83%B3%E3%82%B7%E3%83%A7%E3%83%B3.jpeg" width="500px" height="315px" ></div>

<?php } ?>

      <br><br><br>
      <h2>コメント一覧</h2>
<?php
      if (isset($_POST['conp2'])) { //投稿ボタンを押した時の処理
        if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (29,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了！");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 29  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
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

      //ヒップリフト
      if (isset ($_POST['id_3']) || isset($_POST['conp3'])) { //id_1またはconp1を選択したとき
        $stmt = $pdo->query("SELECT * FROM spine_muscle where spine_id = 3"); //arm_idが１のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo  '<div class = title>' . $row['spine_title'] . '</div>';
          echo '<br><br><br>';
          echo  '<div class = description>' . $row['description'] . '</div><br><br>';?>
          <div style ="position:absolute;top:500px;left:20px;"><img src = "https://beauty-health-training.com/wp-content/uploads/2015/06/%E3%83%92%E3%83%83%E3%83%97%E3%83%AA%E3%83%95%E3%83%88%EF%BC%91.jpg" width="500px" height="315px" ></div>

<?php   } ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h2>コメント一覧</h2>
<?php
        if (isset($_POST['conp3'])) { //投稿ボタンを押した時の処理
          if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
          }
          if (!empty($_POST["comment"])){
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (30,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了！");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 30  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
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

      //リバーススノーエンジェル
      if (isset ($_POST['id_4']) || isset($_POST['conp4'])) { //id_1またはconp1を選択したとき
        $stmt = $pdo->query("SELECT * FROM spine_muscle where spine_id = 4"); //arm_idが１のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo  '<div class = title>' . $row['spine_title'] . '</div>';
          echo '<br><br><br>';
          echo  '<div class = description>' . $row['description'] . '</div><br><br>';?>
          <div style ="position:absolute;top:200px;right:15px;"><img src = "http://diet-labo.link/wp-content/uploads/2017/08/1-41.jpg" width="520px" height="315px" ></div>

<?php   } ?>

        <br><br><br>
        <h2>コメント一覧</h2>
<?php
        if (isset($_POST['conp4'])) { //投稿ボタンを押した時の処理
          if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
          }
          if (!empty($_POST["comment"])){
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (31,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了！");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 31  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
        while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo '<div class = comment>' . $row['comment'] . "</div>  ";
          echo $row['created']. '<br>';
        }
?>
        <form method = "POST" action = "">
         <b>コメント</b><div><br>
         <textarea name="comment" cols="50" rows="5"></textarea>
         </div>
         <input type = "submit" name = "conp4"value = "投稿"/>
        </form>
           <br><br><br>
<?php
      }

      //ベントオーバーローイング
      if (isset ($_POST['id2_1']) || isset($_POST['conp2_1'])) { //id_1またはconp1を選択したとき
        $stmt = $pdo->query("SELECT * FROM spine_muscle2 where spine_id2 = 1"); //arm_idが１のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo  '<div class = title>' . $row['spine_title2'] . '</div>';
          echo '<br><br><br>';
          echo  '<div class = description>' . $row['description2'] . '</div><br><br>';?>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/6k3Asz7iykI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (32,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了！");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 32  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
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

      //デッドリフト
      if (isset ($_POST['id2_2']) || isset($_POST['conp2_2'])) { //id_1またはconp1を選択したとき
        $stmt = $pdo->query("SELECT * FROM spine_muscle2 where spine_id2 = 2"); //arm_idが１のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo  '<div class = title>' . $row['spine_title2'] . '</div>';
          echo '<br><br><br>';
          echo  '<div class = description>' . $row['description2'] . '</div><br><br>';?>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/YXvcaAAToKo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (33,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了！");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 33  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
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

      //ワンハンドローイング
      if (isset ($_POST['id2_3']) || isset($_POST['conp2_3'])) { //id_1またはconp1を選択したとき
        $stmt = $pdo->query("SELECT * FROM spine_muscle2 where spine_id2 = 3"); //arm_idが１のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo  '<div class = title>' . $row['spine_title2'] . '</div>';
          echo '<br><br><br>';
          echo  '<div class = description>' . $row['description2'] . '</div><br><br>';?>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/GVWHPWB8cN8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (34,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了！");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 34  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
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

      //ダンベルデッドリフト
      if (isset ($_POST['id2_4']) || isset($_POST['conp2_4'])) { //id_1またはconp1を選択したとき
        $stmt = $pdo->query("SELECT * FROM spine_muscle2 where spine_id2 = 4"); //arm_idが１のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo  '<div class = title>' . $row['spine_title2'] . '</div>';
          echo '<br><br><br>';
          echo  '<div class = description>' . $row['description2'] . '</div><br><br>';?>
          <iframe width="560" height="315" src="https://www.youtube.com/embed/g2J1x5UsI1g" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (35,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了！");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 35 ORDER BY created DESC"); //コメントタイプ１のコメントを表示
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
  <input type="button" onclick="location.href='spine_home.php'" value="戻る" />
  </body>
</html>
