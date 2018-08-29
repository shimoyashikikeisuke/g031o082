<!DOCTYPE html>
  <html lang = "ja">
  <head>
    <meta charset = "UTF-8">
    <link href="css.css" rel="stylesheet" type="text/css">
    <title>腕筋メニュー一覧</title>
  </head>
   <center><h1> 腕筋 </h1></center>
  <body>
<?php

  try { //PDOを用いてデータベースに接続
    $pdo = new PDO('mysql:host=localhost;dbname=g031o082;charset=utf8','test','enzyl68x',
    array(PDO::ATTR_EMULATE_PREPARES => false));

    //ノーマルプッシュアップ
    if (isset ($_POST['id_1']) || isset($_POST['conp1'])) { //id_1またはconp1を選択したとき
      $stmt = $pdo->query("SELECT * FROM arm_muscle where arm_id = 1"); //arm_idが１のデータを取り出す
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = title>' . $row['arm_title'] . '</div>';
        echo '<br><br><br>';
        echo '<div class = description>' . $row['description'] . '</div><br><br>';?>
        <div style ="position:absolute;top:200px;right:20px;"><img src = "https://tomboy-live-with-fitness.com/wp-content/uploads/2018/03/wide-hand-push-up.png" width="500px" height="400px" ></div>
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
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (1,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了！");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }

      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 1 ORDER BY created DESC"); //コメントタイプ１のコメントを表示
        while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo '<div class = comment>' .  $row['comment'] . '</div>';
          echo  $row['created'] . '<br>';
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
        //リバースプッシュアップ
    if (isset ($_POST['id_2']) || isset($_POST['conp2'])) { //id_2またはconp2を選択した場合
      $stmt = $pdo->query("SELECT * FROM arm_muscle where arm_id = 2"); //arm_idが２のデータを取り出す
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = title>' .$row['arm_title'] .'</div>';
        echo '<br><br><br>';
        echo '<div class = description>' . $row['description'] . '</div><br><br>';?>
        <div style ="position:absolute;top:200px;right:20px;"><img src = "https://kintore-yaseru.site/wp-content/uploads/2018/03/1803311.jpg" width="600px" height="400px" ></div>
<?php } ?>

        <br><br><br>
        <h3>コメント一覧</h3>
<?php
      if (isset($_POST['conp2'])) { //投稿ボタンを押したときの処理
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (2,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 2  ORDER BY created DESC"); //コメントタイプ２のコメントを表示
      while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo '<div class = comment>' .$row['comment'] . "</div>  ";
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

          //Gackt式デクラインプッシュアップ
    if (isset ($_POST['id_3']) || isset($_POST['conp3'])) { //id_3またはconp3を押したときの処理
      $stmt = $pdo->query("SELECT * FROM arm_muscle where arm_id = 3 "); //arm_idが３のデータを取り出す
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データを取り出す
        echo '<div class = title>' . $row['arm_title'] . '</div>';
        echo '<br><br><br>';
        echo '<div class = description>' . $row['description'] . '</div><br><br>';?>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/iwysV8HUePI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php } ?>

        <br><br><br>
        <h4>コメント一覧</h4>
<?php
      if (isset($_POST['conp3'])) {
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (3,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 3 ORDER BY created DESC"); //コメントタイプ３のコメントを表示
      while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = comment>' . $row['comment'] . "</div>  ";
        echo $row['created']. '<br>';
      }
?>
      <form method = "POST" action = "">
         <b>コメント</b><div><br>
         <textarea name="comment" cols="50" rows="5"></textarea>
         </div>
         <input type = "submit" name = "conp3"value = "投稿" />
      </form>
       <br><br><br>
<?php
    }

            //デクラインプッシュアップ
    if (isset ($_POST['id_4']) || isset($_POST['conp4'])) { //id_4またはconp4が押された場合
      $stmt = $pdo->query("SELECT * FROM arm_muscle where arm_id = 4 ");  //arm_idが4のデータを取り出す
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = title>' . $row['arm_title'] . '</div>';
        echo '<br><br><br>';
        echo '<div class = description>' .  $row['description'] . '</div><br><br>';?>
        <div style ="position:absolute;top:480px;left:20px;"><img src = "http://www.z-muscle.net/images/method/push_up/pushup06-05.jpg" width="600px" height="400px" ></div>
<?php } ?>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <h5>コメント一覧</h5>
<?php
      if (isset($_POST['conp4'])) {
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (4,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 4 ORDER BY created DESC"); //コメントタイプ４のコメントを表示
        while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
            echo '<div class = comment>' . $row['comment'] . "</div>  ";
            echo $row['created']. '<br>';
        }
?>
      <form method = "POST" action = "">
       <b>コメント</b><div><br>
       <textarea name="comment" cols="50" rows="5"></textarea>
       </div>
       <input type = "submit" name = "conp4"value = "投稿" />
      </form>
       <br><br><br>
<?php
    }
            //トライセップススタンディング
    if (isset ($_POST['id_5']) || isset($_POST['conp5'])) { //id_5またはconp5を押したときの処理
      $stmt = $pdo->query("SELECT * FROM arm_muscle where arm_id = 5");  //arm_idが5のデータを取り出す
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = title>' .  $row['arm_title'] . '</div>';
        echo '<br><br><br>';
        echo '<div class = description>' . $row['description'] . '</div><br><br>';?>
        <div style ="position:absolute;top:400px;leftt:20px;"><img src = "http://muscle-manager.com/wp-content/uploads/2017/03/p1112-3.jpg" width="600px" height="400px" ></div>
<?php } ?>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <h6>コメント一覧</h6>
<?php
      if (isset($_POST['conp5'])) { //登録ボタンを押したとき
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (5,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 5 ORDER BY created DESC"); //コメントタイプ５のコメントを表示
        while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo '<div class = comment>' .$row['comment'] . "</div>  ";
          echo $row['created']. '<br>';
        }
?>
        <form method = "POST" action = "">
          <b>コメント</b><div><br>
          <textarea name="comment" cols="50" rows="5"></textarea>
          </div>
          <input type = "submit" name = "conp5"value = "投稿" />
        </form>
        <br><br><br>
<?php
    }
          //トライセプスキックバック
    if (isset ($_POST['id2_1']) || isset($_POST['conp2_1'])) { //id2_1またはconp2_1を押したときの処理
      $stmt = $pdo->query("SELECT * FROM arm_muscle2 where arm_id2 = 1");  //arm_id2が1のデータを取り出す
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = title>' . $row['arm_title2'] . '</div>';
        echo '<br><br><br>';
        echo '<div class = description>' . $row['description2'] . '</div><br><br>';?>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/YbVjCb1DogU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php } ?>

      <br><br><br>
      <h7>コメント一覧</h7>
<?php
      if (isset($_POST['conp2_1'])) { //登録ボタンを押したとき
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (6,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }

      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 6 ORDER BY created DESC"); //コメントタイプ6のコメントを表示
        while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo '<div class = comment>'  .$row['comment'] . "</div> ";
          echo $row['created']. '<br>';
        }
?>
        <form method = "POST" action = "">
          <b>コメント</b><div><br>
          <textarea name="comment" cols="50" rows="5"></textarea>
          </div>
          <input type = "submit" name = "conp2_1"value = "投稿" />
        </form>
        <br><br><br>
<?php
    }
          //ダンベルカール
    if (isset ($_POST['id2_2']) || isset($_POST['conp2_2'])) { //id2_2またはconp2_2を押したときの処理
      $stmt = $pdo->query("SELECT * FROM arm_muscle2 where arm_id2 = 2");  //arm_id2が3のデータを取り出す
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = title>' . $row['arm_title2'] . '</div>';
        echo '<br><br><br>';
        echo '<div class = description>' . $row['description2'] . '</div><br><br>';?>
        <div style ="position:absolute;top:200px;right:20px;"><img src = "https://power-hacks.com/wp-content/uploads/2017/03/%E3%83%80%E3%83%B3%E3%83%99%E3%83%AB%E3%82%AB%E3%83%BC%E3%83%AB-1024x901.jpg" width="400px" height="400px" ></div>
<?php } ?>

        <br><br><br>
        <h8>コメント一覧</h8>
<?php
      if (isset($_POST['conp2_2'])) { //登録ボタンを押したとき
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (7,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 7 ORDER BY created DESC"); //コメントタイプ6のコメントを表示
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
          //ウエイトキープ
    if (isset ($_POST['id2_3']) || isset($_POST['conp2_3'])) { //id2_3またはconp2_3を押したときの処理
      $stmt = $pdo->query("SELECT * FROM arm_muscle2 where arm_id2 = 3");  //arm_id2が3のデータを取り出す
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = title>' . $row['arm_title2'] . '</div>';
        echo '<br><br><br>';
        echo '<div class = description>' . $row['description2'] . '</div><br><br>';?>
        <div style ="position:absolute;top:200px;right:20px;"><img src = "https://smartlog-stat2.imgix.net/uploads/content/piece/2017/9/4720e45ae24ce5bf5cf4bd42dd7013eb/shutterstock_674345779.jpg?w=689&h=459&auto=compress&q=35" width="400px" height="400px" ></div>
<?php } ?>

        <br><br><br>
        <h9>コメント一覧</h9>
<?php
      if (isset($_POST['conp2_3'])) { //登録ボタンを押したとき
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (8,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 8 ORDER BY created DESC"); //コメントタイプ6のコメントを表示
        while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo '<div class = comment>' . $row['comment'] . "</div>  ";
          echo $row['created']. '<br>';
        }
?>
        <form method = "POST" action = "">
          <b>コメント</b><div><br>
          <textarea name="comment" cols="50" rows="5"></textarea>
          </div>
          <input type = "submit" name = "conp2_3"value = "投稿" />
        </form>
        <br><br><br>
<?php
    }
          //ダンベルリフトカール
    if (isset ($_POST['id2_4']) || isset($_POST['conp2_4'])) { //id2_3またはconp2_3を押したときの処理
      $stmt = $pdo->query("SELECT * FROM arm_muscle2 where arm_id2 = 4");  //arm_id2が3のデータを取り出す
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = title>' . $row['arm_title2'] . '</div>';
        echo '<br><br><br>';
        echo '<div class = description>' . $row['description2'] . '</div><br><br>';?>
        <div style ="position:absolute;top:450px;left:20px;"><img src = "https://miya72122.c.blog.so-net.ne.jp/_images/blog/_f8a/miya72122/image-62654.jpg" width="400px" height="400px" ></div>
<?php } ?>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <h10>コメント一覧</h10>
<?php
      if (isset($_POST['conp2_4'])) { //登録ボタンを押したとき
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (9,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 9 ORDER BY created DESC"); //コメントタイプ6のコメントを表示
        while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo '<div class = comment>' . $row['comment'] . "</div>  ";
          echo $row['created']. '<br>';
        }
?>
        <form method = "POST" action = "">
          <b>コメント</b><div><br>
          <textarea name="comment" cols="50" rows="5"></textarea>
          </div>
          <input type = "submit" name = "conp2_4"value = "投稿" />
        </form>
        <br><br><br>
<?php
    }
          //シーテッドトライセプスエクステンション
    if (isset ($_POST['id2_5']) || isset($_POST['conp2_5'])) { //id2_5またはconp2_5を押したときの処理
      $stmt = $pdo->query("SELECT * FROM arm_muscle2 where arm_id2 = 5");  //arm_id2が5のデータを取り出す
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = title>' . $row['arm_title2'] . '</div>';
        echo '<br><br><br>';
        echo '<div class = description>' . $row['description2'] . '</div><br><br>';?>
        <div style ="position:absolute;top:500px;left:20px;"><img src = "https://i0.wp.com/maxbody.jp/wp-content/uploads/2017/03/Fotolia_113879226_Subscription_Monthly_M.jpg?resize=400%2C262&ssl=1" width="400px" height="400px" ></div>
<?php } ?>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <h11>コメント一覧</h11>
<?php
      if (isset($_POST['conp2_5'])) { //登録ボタンを押したとき
        if (empty($_POST["comment"])) {
          echo '<script>alert("コメントを入力してください");</script>';
        }
        if (!empty($_POST["comment"])){
          $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
          $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (10,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
          echo '<script>alert("投稿完了");</script>';
          $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
          $insert->execute();
          $dbh = null;
        }
      }
      $select = $pdo->query("SELECT * FROM comment where comment_typeid = 10 ORDER BY created DESC"); //コメントタイプ6のコメントを表示
      while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<div class = comment>' . $row['comment'] . "</div>  ";
        echo $row['created']. '<br>';
      }
?>
      <form method = "POST" action = "">
       <b>コメント</b><div><br>
       <textarea name="comment" cols="50" rows="5"></textarea>
       </div>
       <input type = "submit" name = "conp2_5"value = "投稿"  />
      </form>
      <br><br><br>
<?php
    }

  } catch (PDOException $e) {
        exit('データベース接続失敗。'.$e->getMessage());
  }
?>

<input id ="back_button" type="button" onclick="location.href='arm_home.php'" value="戻る" />
    </body>
  </html>
