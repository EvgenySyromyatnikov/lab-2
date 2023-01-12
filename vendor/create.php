<?php
require_once '../config/connect.php';

//print_r($_POST);

$title = $_POST['title'];
$description = $_POST['description'];

mysqli_query($connect, "INSERT INTO `items` (`id`, `title`, `description`) VALUES (NULL, '$title',  '$description')");

header('Location: /');
