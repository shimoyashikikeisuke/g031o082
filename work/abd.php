<!DOCTYPE html>
  <html lang = "ja">
  <head>
    <meta charset = "UTF-8">
    <link href="css.css" rel="stylesheet" type="text/css">
    <title>腹筋メニュー一覧</title>
  </head>
   <center><h1> 腹筋 </h1> </center>
  <body>
<?php

    try { //PDOを用いてデータベースに接続
      $pdo = new PDO('mysql:host=localhost;dbname=g031o082;charset=utf8','test','enzyl68x',
      array(PDO::ATTR_EMULATE_PREPARES => false));

      //フロントブリッジ
      if (isset ($_POST['id_1']) || isset($_POST['conp1'])) { //id_1またはconp1を選択したとき
        $stmt = $pdo->query("SELECT * FROM abd_muscle where abd_id = 1"); //arm_idが１のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo  '<div class = title>' . $row['abd_title'] . '</div>';
          echo '<br><br><br>';
          echo  '<div class = description>' . $row['description'] . '</div><br><br>';?>
          <div style ="position:absolute;top:200px;right:20px;"><img src = "https://lh3.googleusercontent.com/-MbpRo15dqIc/WgHl-NrSKYI/AAAAAAAAEyE/D_EBRxKfP1cfeJTCwujYpD9Vd747XDeJQCE0YBhgL/s1024/IMG_9968.HEIC" width="500px" height="400px" ></div>
<?php   } ?>

        <br><br><br>
        <div class = a><h2>コメント一覧</h2>
<?php
        if (isset($_POST['conp1'])) { //投稿ボタンを押した時の処理
          if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
          }
          if (!empty($_POST["comment"])){
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (11,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了！");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }

        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 11  ORDER BY created DESC"); //コメントタイプ１のコメントを表示
        while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo '<div class = comment>' . $row['comment'] . "</div>  ";
          echo $row['created']. '<br>';
        }
?>
        </div>
        <form method = "POST" action = "">
          <b>コメント</b><br>
            <textarea name="comment" cols="50" rows="5"></textarea>
         <input type = "submit" name = "conp1"value = "投稿"/>
        </form>
        <br><br><br>
<?php
      }

        //クランチ
      if (isset ($_POST['id_2']) || isset($_POST['conp2'])) { //id_2またはconp2を選択した場合
        $stmt = $pdo->query("SELECT * FROM abd_muscle where abd_id = 2"); //arm_idが２のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo '<div class = title>' . $row['abd_title'] . '</div>';
          echo '<br><br><br>';
          echo '<div class = description>' . $row['description'] . '</div><br><br>';?>
          <div style ="position:absolute;top:200px;right:20px;"><img src = "https://kintorecamp-ivitsqn.netdna-ssl.com/wp-content/uploads/2017/06/shutterstock_499551544-e1497687898256.jpg" width="500px" height="400px" ></div>
<?php   } ?>

        <br><br><br>
        <h2>コメント一覧</h2>
<?php
        if (isset($_POST['conp2'])) { //投稿ボタンを押したときの処理
          if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
          }
          if (!empty($_POST["comment"])){
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (12,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 12  ORDER BY created DESC"); //コメントタイプ２のコメントを表示
        while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo '<div class = comment >' .$row['comment'] . "</div>  ";
          echo $row['created']. '<br>';
        }
?>
        <form method = "POST" action = "">
          <b>コメント</b><br>
            <textarea name="comment" cols="50" rows="5"></textarea>
            <input type = "submit" name = "conp2"value = "投稿"/>
        </form>
        <br><br><br>
<?php
      }

          //バイシクルクランチ
      if (isset ($_POST['id_3']) || isset($_POST['conp3'])) { //id_3またはconp3を押したときの処理
        $stmt = $pdo->query("SELECT * FROM abd_muscle where abd_id = 3"); //arm_idが３のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データを取り出す
          echo '<div class = title>' . $row['abd_title'] . '</div>';
          echo '<br><br><br>';
          echo '<div class = description>' . $row['description'] . '</div><br><br>';?>
          <div style ="position:absolute;top:200px;right:20px;"><img src = "https://pt-ban.com/wp/wp-content/uploads/2016/10/081-1.jpg" width="360px" height="500px" ></div>
<?php   } ?>

        <br><br><br>
        <h2>コメント一覧</h2>
<?php
        if (isset($_POST['conp3'])) {
          if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
          }
          if (!empty($_POST["comment"])){
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (13,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }

        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 13  ORDER BY created DESC"); //コメントタイプ３のコメントを表示
        while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo '<div class = comment>' .$row['comment'] . "</div>  ";
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

            //レッグレイズ
      if (isset ($_POST['id_4']) || isset($_POST['conp4'])) { //id_4またはconp4が押された場合
        $stmt = $pdo->query("SELECT * FROM abd_muscle where abd_id = 4");  //arm_idが4のデータを取り出す
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
          echo '<div class = title>' .$row['abd_title'] . '</div>';
          echo '<br><br><br>';
          echo '<div class = description>' .$row['description'] . '</div><br><br>';?>
          <div style ="position:absolute;top:200px;right:20px;"><img src = "http://diet-labo.link/wp-content/uploads/2017/09/s_1-3.jpg" width="500px" height="500px" ></div>
<?php   } ?>

        <br><br><br>
        <h2>コメント一覧</h2>
<?php
        if (isset($_POST['conp4'])) {
          if (empty($_POST["comment"])) {
            echo '<script>alert("コメントを入力してください");</script>';
          }
          if (!empty($_POST["comment"])){
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (14,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
            echo '<script>alert("投稿完了");</script>';
            $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
            $insert->execute();
            $dbh = null;
          }
        }
        $select = $pdo->query("SELECT * FROM comment where comment_typeid = 14 ORDER BY created DESC"); //コメントタイプ４のコメントを表示
          while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
              echo '<div class = comment >' .$row['comment'] . "</div>  ";
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
            //ニートゥチェスト
        if (isset ($_POST['id_5']) || isset($_POST['conp5'])) { //id_5またはconp5を押したときの処理
          $stmt = $pdo->query("SELECT * FROM abd_muscle where abd_id = 5");  //arm_idが5のデータを取り出す
          while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
            echo '<div class = title>' . $row['abd_title'] . '</div>';
            echo '<br><br><br>';
            echo '<div class = description>' . $row['description'] . '</div><br><br>';?>
            <div style ="position:absolute;top:200px;right:20px;"><img src = "https://power-hacks.com/wp-content/uploads/2018/03/%E3%83%8B%E3%83%BC%E3%83%88%E3%82%A5%E3%83%81%E3%82%A7%E3%82%B9%E3%83%88%E3%82%84%E3%82%8A%E6%96%B9.png" width="550px" height="500px" ></div>
<?php     } ?>

            <br><br><br>
            <h2>コメント一覧</h2>
<?php
          if (isset($_POST['conp5'])) { //登録ボタンを押したとき
            if (empty($_POST["comment"])) {
              echo '<script>alert("コメントを入力してください");</script>';
            }
            if (!empty($_POST["comment"])){
              $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
              $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (15,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
              echo '<script>alert("投稿完了");</script>';
              $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
              $insert->execute();
              $dbh = null;
            }
          }
          $select = $pdo->query("SELECT * FROM comment where comment_typeid = 15 ORDER BY created DeSC"); //コメントタイプ５のコメントを表示
            while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
              echo '<div class = comment >' .$row['comment'] . "</div>  ";
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
          //腹筋ローラーロールアウト
        if (isset ($_POST['id2_1']) || isset($_POST['conp2_1'])) { //id2_1またはconp2_1を押したときの処理
          $stmt = $pdo->query("SELECT * FROM abd_muscle2 where abd_id2 = 1");  //arm_id2が1のデータを取り出す
          while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
            echo '<div class = title>' . $row['abd_title2'] . '</div>';
            echo '<br><br><br>';
            echo '<div class = description>' . $row['description2'] . '</div><br><br>';?>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/gC2bq0SaTys" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php     } ?>

          <br><br><br>
          <h2>コメント一覧</h2>
<?php
          if (isset($_POST['conp2_1'])) { //登録ボタンを押したとき
            if (empty($_POST["comment"])) {
              echo '<script>alert("コメントを入力してください");</script>';
            }
            if (!empty($_POST["comment"])){
              $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
              $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (16,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
              echo '<script>alert("投稿完了");</script>';
              $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
              $insert->execute();
              $dbh = null;
            }
          }

          $select = $pdo->query("SELECT * FROM comment where comment_typeid = 16 ORDER BY created DESC"); //コメントタイプ6のコメントを表示
          while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
            echo '<div class = comment >' .$row['comment'] . "</div>  ";
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
          //ダンベルサイドベント
        if (isset ($_POST['id2_2']) || isset($_POST['conp2_2'])) { //id2_2またはconp2_2を押したときの処理
          $stmt = $pdo->query("SELECT * FROM abd_muscle2 where abd_id2 = 2");  //arm_id2が3のデータを取り出す
          while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
            echo '<div class = title>' .$row['abd_title2'] . '</div>';
            echo '<br><br><br>';
            echo '<div class = description>' .$row['description2'] . '</div><br><br>'; ?>
            <div style ="position:absolute;top:200px;right:20px;"><img src = "https://kintorecamp-ivitsqn.netdna-ssl.com/wp-content/uploads/2016/06/dreamstime_s_31864993-e1467083493968.jpg" width="470px" height="400px" ></div>
<?php     } ?>

            <br><br><br>
            <h2>コメント一覧</h2>
<?php
          if (isset($_POST['conp2_2'])) { //登録ボタンを押したとき
            if (empty($_POST["comment"])) {
              echo '<script>alert("コメントを入力してください");</script>';
            }
            if (!empty($_POST["comment"])){
              $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
              $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (17,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
              echo '<script>alert("投稿完了");</script>';
              $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
              $insert->execute();
              $dbh = null;
            }
          }

          $select = $pdo->query("SELECT * FROM comment where comment_typeid = 17 ORDER BY created DESC"); //コメントタイプ6のコメントを表示
            while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
              echo '<div class = comment>' .$row['comment'] . "</div>  ";
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
          //ダンベルクランチ
        if (isset ($_POST['id2_3']) || isset($_POST['conp2_3'])) { //id2_3またはconp2_3を押したときの処理
          $stmt = $pdo->query("SELECT * FROM abd_muscle2 where abd_id2 = 3");  //arm_id2が3のデータを取り出す
          while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
            echo '<div class = title>' . $row['abd_title2'] . '</div>';
            echo '<br><br><br>';
            echo '<div class = description>' .$row['description2'] . '</div><br><br>'; ?>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/kRsXBpf1O68" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php     } ?>

            <br><br><br>
            <h2>コメント一覧</h2>
<?php
          if (isset($_POST['conp2_3'])) { //登録ボタンを押したとき
            if (empty($_POST["comment"])) {
              echo '<script>alert("コメントを入力してください");</script>';
            }
            if (!empty($_POST["comment"])){
              $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
              $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (18,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
              echo '<script>alert("投稿完了");</script>';
              $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
              $insert->execute();
              $dbh = null;
            }
          }

          $select = $pdo->query("SELECT * FROM comment where comment_typeid = 18 ORDER BY created DESC"); //コメントタイプ6のコメントを表示
            while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
              echo '<div class = comment >' .$row['comment'] . "</div>  ";
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
          //ダンベルニーアップ
        if (isset ($_POST['id2_4']) || isset($_POST['conp2_4'])) { //id2_3またはconp2_3を押したときの処理
          $stmt = $pdo->query("SELECT * FROM abd_muscle2 where abd_id2 = 4");  //arm_id2が3のデータを取り出す
          while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
            echo '<div class = title>' . $row['abd_title2'] . '</div>';
            echo '<br><br><br>';
            echo '<div class = description>' .$row['description2'] . '</div><br><br>';?>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/F_ja6r7Dgk4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php     } ?>

            <br><br><br>
            <h2>コメント一覧</h2>
<?php
          if (isset($_POST['conp2_4'])) { //登録ボタンを押したとき
            if (empty($_POST["comment"])) {
              echo '<script>alert("コメントを入力してください");</script>';
            }
            if (!empty($_POST["comment"])){
              $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
              $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (19,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
              echo '<script>alert("投稿完了");</script>';
              $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
              $insert->execute();
              $dbh = null;
            }
          }

          $select = $pdo->query("SELECT * FROM comment where comment_typeid = 19 ORDER BY created DESC"); //コメントタイプ6のコメントを表示
            while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
              echo '<div class = comment >' .$row['comment'] . "</div>  ";
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

          //ダンベルウッドチョッパー
        if (isset ($_POST['id2_5']) || isset($_POST['conp2_5'])) { //id2_5またはconp2_5を押したときの処理
          $stmt = $pdo->query("SELECT * FROM abd_muscle2 where abd_id2 = 5");  //arm_id2が5のデータを取り出す
          while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
            echo '<div class = title>' . $row['abd_title2'] . '</div>';
            echo '<br><br><br>';
            echo '<div class = description>' .$row['description2'] . '</div><br><br>';?>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/l9bah5HOFjA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
<?php     } ?>

            <br><br><br>
            <h2>コメント一覧</h2>
<?php
          if (isset($_POST['conp2_5'])) { //登録ボタンを押したとき
            if (empty($_POST["comment"])) {
              echo '<script>alert("コメントを入力してください");</script>';
            }
            if (!empty($_POST["comment"])){
              $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
              $insert = $pdo->prepare("INSERT INTO comment (comment_typeid,comment,created) VALUES (20,:comment,now())"); //コメントのタイプ、コメント、時刻を挿入
              echo '<script>alert("投稿完了");</script>';
              $insert->bindParam(':comment',$comment, PDO::PARAM_STR);
              $insert->execute();
              $dbh = null;
            }
          }
          $select = $pdo->query("SELECT * FROM comment where comment_typeid = 20 ORDER BY created DESC"); //コメントタイプ6のコメントを表示
          while($row = $select -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
            echo '<div class = comment >' .$row['comment'] . "</div>  ";
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
      <input type="button" onclick="location.href='abd_home.php'" value="戻る" />
    </body>
  </html>
