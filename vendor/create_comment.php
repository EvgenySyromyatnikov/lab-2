<?php
  require_once '../config/connect.php';

  $id_item = $_POST['id'];
  $comment = $_POST['comment'];

  mysqli_query($connect, "INSERT INTO `comments` (`id`, `items_id`, `comment`) VALUES (NULL, '$id_item', '$comment')");

  header('Location: /item.php?id=' . $id_item);
