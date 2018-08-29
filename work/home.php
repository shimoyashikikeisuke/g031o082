<?php
  session_start();
  if (!isset($_SESSION["name"])) {
    header("Location: login.php");
    exit;
    echo $_SESSION["name"];
  }
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
  <meta charset = "UTF-8">
    <link href="css.css" rel="stylesheet" type="text/css">
  <title>ホーム画面</title>
</head>
<body>
    <h1 class = "home_title">筋肉会サイト</h1><br><br>

  <center><input id="eturan" type="button" onclick="location.href='muscle_menu.php'"value="筋トレメニュー">
  <input id = "keijiban" type="button" onclick="location.href='form.php'"value="筋肉掲示板"></center>

  <div style ="position:absolute;top:250px;right:20px;"><img src = "https://4.bp.blogspot.com/-mSjoiDlAgic/WFPC9XIuAqI/AAAAAAABAcQ/etTEd-XvF6YiUw-ZtyD22R3d3qxRFpb6gCLcB/s800/gym_training2.png" width="350px" height="350px" ></div>
  <div style ="position:absolute;top:320px;left:20px;"><img src = "https://ashiyahama-seikotsu.com/wp/wp-content/uploads/2018/03/ff7ba33381a5679cbac61200258aa344.png" width="280px" height="280px" ></div>
  </body>
</html>
