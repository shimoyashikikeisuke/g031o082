<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>FizzBuzzの課題</title>
</head>
<body>
  <h1>FizzBuzzをPHPで出力する課題</h1>


<?php
//下記は説明文
echo<<<descri
「３」の倍数では「Fizz」,「５」の倍数では「Buzz」,両方の
公倍数では「FizzBuzz」を出力しています。<br>ここでは「Fizz」を青,
「Buzz」を緑,「FizzBuzz」を赤で表しています。</br></br>
descri;

for($i = 1;$i <= 100;$i++){ //1~100まで繰り返す
  if(($i % 3 == 0) && ($i % 5 == 0)) //もし３で割り切った値と５で割り切った値が０の場合
  echo ' <font color="red">FizzBuzz('.$i.'),<br /></font>'; //"FizzBuzz($i)"を出力する
  else if($i % 3 == 0) //３だけで割り切った値が０の場合
  echo ' <font color="blue">Fizz('.$i.')</font>'; //"Fizz($i)"を出力する
  else if($i % 5 ==0) //５だけで割り切った値が０の場合
  echo ' <font color="green">Buzz('.$i.')</font>'; //"Buzz($i)"を出力する
  else
  echo   " " . $i . " "; //数字を出力する
}
 ?>
