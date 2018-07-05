<!DOCTYPE html>
  <html lang = "ja">
  <head>
    <meta charset = "UTF-8">
    <title>胸筋メニュー一覧</title>
  </head>
         <h1> 胸筋 </h1>
  <body>
    <?php

    try { //PDOを用いてデータベースに接続
      $pdo = new PDO('mysql:host=localhost;dbname=g031o082;charset=utf8','test','enzyl68x',
      array(PDO::ATTR_EMULATE_PREPARES => false));

    if (isset ($_POST['id_1'])) {
    $stmt = $pdo->query("SELECT * FROM pect_muscle where pect_id = 1");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<tr>';
          echo $row['pect_title'];
            echo '<br><br><br>';
            echo $row['description'];'<br><br>';
      }
      exit;
    } else if (isset ($_POST['id2_1'])) {
    $stmt = $pdo->query("SELECT * FROM pect_muscle2 where pect_id2 = 1");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<tr>';
          echo $row['pect_title2'];
            echo '<br><br><br>';
            echo $row['description2'];'<br><br>';
        echo '</tr>';
      }
      exit;
    }  else if (isset ($_POST['id_2'])) {
    $stmt = $pdo->query("SELECT * FROM pect_muscle where pect_id = 2");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<tr>';
          echo $row['pect_title'];
            echo '<br><br><br>';
            echo $row['description'];'<br><br>';
        echo '</tr>';
      }
      exit;
    }  else if (isset ($_POST['id2_2'])) {
    $stmt = $pdo->query("SELECT * FROM pect_muscle2 where pect_id2 = 2");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<tr>';
          echo $row['pect_title2'];
            echo '<br><br><br>';
            echo $row['description2'];'<br><br>';
        echo '</tr>';
      }
      exit;
    }  else if (isset ($_POST['id_3'])) {
    $stmt = $pdo->query("SELECT * FROM pect_muscle where pect_id = 3");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<tr>';
          echo $row['pect_title'];
            echo '<br><br><br>';
            echo $row['description'];'<br><br>';
        echo '</tr>';
      }
      exit;
    }  else if (isset ($_POST['id2_3'])) {
    $stmt = $pdo->query("SELECT * FROM pect_muscle2 where pect_id2 = 3");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<tr>';
          echo $row['pect_title2'];
            echo '<br><br><br>';
            echo $row['description2'];'<br><br>';
        echo '</tr>';
      }
      exit;
    }  else if (isset ($_POST['id_4'])) {
    $stmt = $pdo->query("SELECT * FROM pect_muscle where pect_id = 4");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<tr>';
          echo $row['pect_title'];
            echo '<br><br><br>';
            echo $row['description'];'<br><br>';
        echo '</tr>';
      }
      exit;
    }  else if (isset ($_POST['id2_4'])) {
    $stmt = $pdo->query("SELECT * FROM pect_muscle2 where pect_id2 = 4");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<tr>';
          echo $row['pect_title2'];
            echo '<br><br><br>';
            echo $row['description2'];'<br><br>';
        echo '</tr>';
      }
      exit;
    }  else if (isset ($_POST['id_5'])) {
    $stmt = $pdo->query("SELECT * FROM abd_muscle where id = 5");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<tr>';
          echo $row['abd_title'];
            echo '<br><br><br>';
            echo $row['description'];'<br><br>';
        echo '</tr>';
      }
      exit;
    } else if (isset ($_POST['id2_5'])) {
    $stmt = $pdo->query("SELECT * FROM abd_muscle2 where id2 = 5");
      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { //データ分だけ繰り返す
        echo '<tr>';
          echo $row['abd_title2'];
            echo '<br><br><br>';
            echo $row['description2'];'<br><br>';
        echo '</tr>';
      }
      exit;
    }

  } catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
  }

    ?>



  </body>
</html>
