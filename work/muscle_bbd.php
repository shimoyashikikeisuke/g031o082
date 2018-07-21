<!DOCTYPE HTML>
<html>
<herd>
<meta charset=UFT-8>
<title>投稿一覧</title>
</head>
<body>
   <h1>筋肉掲示板</h1>

  <?php
    $db_user = 'test';     // ユーザー名
    $db_pass = 'enzyl68x'; // パスワード
    $db_name = 'g031o082';     // データベース名
    // MySQLに接続
    $mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name);
    //データベース接続におけるエラー処理
    if ($mysqli->connect_errno) {
      printf("%s\n", $mysqli->connect_errno);
      exit();
    }
      //message内の一覧表示
     $result = $mysqli->query("SELECT * from `message`");
      // SELECT文におけるエラー処理
    if (!$result) {
      printf("%s\n", $mysqli->error);
      exit();
    }

      foreach ($result as $row) {
        $bbd_id = htmlspecialchars($row['bbd_id']);
        $name = htmlspecialchars($row['name']);
        $muscle_level = htmlspecialchars($row['muscle_level']);
        $muscle_genre = htmlspecialchars($row['muscle_genre']);
        $created = htmlspecialchars($row['created']);
        $messages = htmlspecialchars($row['messages']);
        
        echo "[No. ". $bbd_id . " ]" . "$name";
        if ($muscle_level == 1) {
            echo ' 初級';
        } else if ($muscle_level == 2) {
            echo ' 中級';
        } else {
            echo ' 上級';
        } " ";

        if ($muscle_genre == 1) {
            echo ' 自慢';
        } else if ($muscle_genre == 2) {
            echo ' 相談';
        } else {
            echo ' その他';
        } " ";
        echo " " . $created. "<br>";
        echo "<font size= 4><b>".$messages."</b><br></font>";
        ?>
        <li><a href="delete.php">削除</a></li>
        <?php
   }
    ?>

   <ul>
     <li><a href="form.php">投稿する</a></li>  <li><a href="home.php">HOME</a></li>
   </ul>
 </body>
</html>
