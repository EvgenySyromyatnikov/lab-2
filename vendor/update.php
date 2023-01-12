<?php
require_once '../config/connect.php';

$id = $_POST['id'];
$title = $_POST['title'];

$description = $_POST['description'];

mysqli_query($connect, "UPDATE `items` SET `title` = '$title',  `description` = '$description' WHERE `items`.`id` = '$id'");

header('Location: /');
