<!DOCTYPE html>
  <html lang = "ja">
  <head>
    <meta charset = "UFT-8">
    <title>レコード表示画面</title>
  </head>
  <body>
    <h1>投稿結果</h1>
  </body>

  <table border="1">
    <tr><th>名前</th><th>筋トレレベル</th><th>筋トレジャンル</th><th>メッセージ</th></tr>
    <?php
      $name=$_POST['name']; //POSTでform.phpからのデータを受け取る
      $muscle_level=$_POST['muscle_level'];
      $muscle_genre=$_POST['muscle_genre'];
      $message=$_POST['message'];


      try{ //データベース接続
        $pdo = new PDO('mysql:host=localhost;dbname=g031o082;charset=utf8','test','enzyl68x',
        array(PDO::ATTR_EMULATE_PREPARES => false));

        $stmt = $pdo -> prepare("INSERT INTO muscle_bbd (name,muscle_level,muscle_genre,message)
                                  VALUES (:name,:muscle_level,:muscle_genre,:message)"); //INSERTでデータをデータベースに挿入
        $stmt->bindParam(':name',$name, PDO::PARAM_STR);
        $stmt->bindValue(':muscle_level',$muscle_level, PDO::PARAM_INT);
        $stmt->bindValue(':muscle_genre',$muscle_genre, PDO::PARAM_INT);
        $stmt->bindParam(':message',$message, PDO::PARAM_STR);
        $stmt->execute();
        $dbh = null;

        //データベース内にあるデータを表示。muscle_level_tableとmuscle_genrel_tableを内部結合し出力
        $stmt = $pdo->query("SELECT muscle_bbd.name,muscle_level.level,muscle_genre.genre,muscle_bbd.message from muscle_bbd
                           AS muscle_bbd join muscle_level AS muscle_level on muscle_bbd.muscle_level = muscle_level.muscle_level
                           join muscle_genre AS muscle_genre on muscle_bbd.muscle_genre = muscle_genre.muscle_genre");


          while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
            echo '<tr>';
              foreach($row as $key){ //一行分のデータをを出力
                echo '<td>'.$key.'</td>';
              }
              echo '</tr>';
          }
          } catch (PDOException $e) {
            exit('データベース接続失敗。'.$e->getMessage());
          }

      ?>
