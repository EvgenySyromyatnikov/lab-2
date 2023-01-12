<?php
  require_once 'config/connect.php';
  $item_id = $_GET['id'];
  $item = mysqli_query($connect, "SELECT * FROM `items` WHERE `id`='$item_id'");
  $item = mysqli_fetch_assoc($item);
  //print_r($product);

$kolvo=++$item['likes'];
mysqli_query($connect, "UPDATE `items` SET `likes` = '$kolvo' WHERE `items`.`id` ='$item_id' ");
header('Location: /');
